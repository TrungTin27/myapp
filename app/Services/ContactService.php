<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Contact_messages;
use App\Repositories\Interface\ContactRepositoryInterface;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function delete($id)
    {
        return $this->contactRepository->delete($id);
    }
    public function store($data)
    {
        return Contact_messages::create($data);
    }
    public function search($keyword)
    {
        return $this->contactRepository->search($keyword);
    }
}
