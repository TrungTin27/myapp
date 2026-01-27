<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author_sections;
use App\Http\Requests\Author_sectionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Author_sectionsController extends Controller
{
    public function index(Request $request)
    {
        $query = Author_sections::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('start_date'), function ($q) use ($request) {
                $q->whereDate('created_at', '>=', $request->start_date);
            })
            ->when($request->filled('end_date'), function ($q) use ($request) {
                $q->whereDate('created_at', '<=', $request->end_date);
            });

        $Author_sections = $query->latest()->paginate(10);

        return view('admin.Author_sections.index', compact('Author_sections'));
    }

    public function create()
    {
        return view('admin.Author_sections.form');
    }

    public function store(Author_sectionsRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('author_sections', 'public');
        }

        Author_sections::create($data);

        flash('Thêm thành công')->success();
        return redirect()->route('author_sections.index');
    }

    public function edit($id)
    {
        $item = Author_sections::findOrFail($id);
        return view('admin.Author_sections.form', compact('item'));
    }

    public function update(Author_sectionsRequest $request, $id)
    {
        $item = Author_sections::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('author_sections', 'public');
        }

        $item->update($data);

        flash('Cập nhật thành công')->success();
        return redirect()->route('author_sections.index');
    }

    public function destroy($id)
{
    try {
        $item = Author_sections::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false], 500);
    }
}

}
