<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contact_messages;
use Illuminate\Http\Request;

class contact_messagesController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $contact_messages = contact_messages::all();
        return view('admin.contact_messages.index', compact('contact_messages'));
    }

    // Form tạo mới
    public function create()
    {
        return view('contact_messages.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        contact_messages::create($request->all());
        return redirect()->route('contact_messages.index');
    }

    // Hiển thị chi tiết
    public function show(contact_messages $contact_messages)
    {
        return view('contact_messages.show', compact('contact_messages'));
    }

    // Form chỉnh sửa
    public function edit(contact_messages $contact_messages)
    {
        return view('contact_messages.edit', compact('contact_messages'));
    }

    // Update sản phẩm
    public function update(Request $request, contact_messages $contact_messages)
    {
        $contact_messages->update($request->all());
        return redirect()->route('contact_messages.index');
    }

    // Xoá sản phẩm
    public function destroy(contact_messages $contact_messages)
    {
        $contact_messages->delete();
        return redirect()->route('contact_messages.index');
    }
}
