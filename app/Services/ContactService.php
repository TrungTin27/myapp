<?php
namespace App\Services;

use App\Models\Banner;
use App\Repositories\Interface\ContactRepositoryInterface;
class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function create(array $data)
    {
        return $this->contactRepository->create($data);

    }

   
    public function delete($id)
    {
        return $this->contactRepository->delete($id);

    }
    public function store($data)
    {
        return Banner::create($data);
    }
    
}
