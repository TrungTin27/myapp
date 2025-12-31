<?php

namespace App\Repositories;

use App\Models\Contact_messages;
use App\Repositories\Interface\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    public function delete($id)
    {
        $contact = Contact_messages::findOrFail($id);
        return $contact->delete($id);
    }
    public function search($keyword)
    {
        $query = Contact_messages::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
