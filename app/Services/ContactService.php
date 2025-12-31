<?php
namespace App\Services;

use App\Models\Contact;
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
 public function search($keyword)
    {
        return $this->contactRepository->search($keyword);

    }
}
