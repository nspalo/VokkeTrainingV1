<?php

namespace App\Repositories\Contracts;


interface IUserRepository
{
    public function find($id);
    public function findByName($name);
}