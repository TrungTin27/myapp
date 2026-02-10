<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact_messages;
use Illuminate\Http\Request;

class Contact_messagesController extends Controller
{
    // LIST + PAGINATION
    public function index()
    {
        $Contact_messages = Contact_messages::orderBy('created_at', 'desc')
                        ->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $Contact_messages
        ]);
    }

   
    // STORE (User gửi từ FE)
    public function store(Request $request)
    {
        $Contact_messages = Contact_messages::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Messages sent successfully',
            'data' => $Contact_messages
        ]);
    }

    // DELETE (Admin xoá)
    public function destroy($id)
    {
        $Contact_messages = Contact_messages::find($id);

        if (!$Contact_messages) {
            return response()->json([
                'status' => false,
                'message' => 'Messages not found'
            ], 404);
        }

        $Contact_messages->delete();

        return response()->json([
            'status' => true,
            'message' => 'Messages deleted successfully'
        ]);
    }
}
