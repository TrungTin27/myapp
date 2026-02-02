<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact_messages;
use Illuminate\Http\Request;

class Contact_messagesController extends Controller
{
          public function index()
{
    $contact_messages = contact_messages::all();

    return response()->json([
        'status' => true,
        'data' => $contact_messages
    ]);
}
}
