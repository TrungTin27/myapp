<?php

namespace App\Repositories\Interface;

interface ContactRepositoryInterface
{

    public function delete($id);

    public function search($keyword);
}
