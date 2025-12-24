<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact_messages;
use Illuminate\Http\Request;
use App\Services\ContactService;

class contact_messagesController extends Controller
{
     private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $contacts = Contact_messages::latest()->paginate(10);
        return view('admin.contact_messages.index', compact('contacts'));
    }


    // Lưu vào DB
    public function store(ContactRequest $request)
    {
        contact_messages::create($request->all());
        return redirect()->route('home');
    }

    // Xoá sản phẩm
   public function destroy($id)
    {
        try {
        $delete = $this->contactService->delete($id);

        if ($delete) {
            return redirect()->route('contact_messages.index');
        }

        return back()->with('error', 'Xóa thất bại');

    } catch (\Throwable $e) {
        return back()->with('error', $e->getMessage());
    }
    }
}
