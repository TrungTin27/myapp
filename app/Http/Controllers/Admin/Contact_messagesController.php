<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_messages;
use Illuminate\Http\Request;

class Contact_messagesController extends Controller
{
    /**
     * Danh sách + Search + Lọc ngày
     */
    public function index(Request $request)
    {
        $query = Contact_messages::query()

            // SEARCH: name hoặc email
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })

            // FROM DATE
            ->when($request->filled('start_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->start_date);
            })

            // TO DATE
            ->when($request->filled('end_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->end_date);
            });

        $contacts = $query->latest()->paginate(10);

        return view('admin.contact_messages.index', compact('contacts'));
    }

    /**
     * Xoá contact
     */
    public function destroy($id)
    {
        Contact_messages::findOrFail($id)->delete();

        return redirect()
            ->route('contact_messages.index')
            ->with('success', 'Xóa thành công');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Contact_messages::create([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Gửi liên hệ thành công');
    }
}
