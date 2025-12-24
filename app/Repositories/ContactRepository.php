<?php
namespace App\Repositories;
use App\Models\Contact_messages;
use App\Repositories\Interface\ContactRepositoryInterface;
class ContactRepository implements ContactRepositoryInterface
{
    public function create(array $data)
    {
        return Contact_messages::create($data);
    }
    public function update($id, $data)
    {
        $contact = Contact_messages::findOrFail($id);
        $contact->update($data);
        return $contact;
    }
    public function delete($id)
    {
        $contact = Contact_messages::findOrFail($id);
        return $contact->delete($id);
    }
    public function search($keyword){
        $query = Contact_messages::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}