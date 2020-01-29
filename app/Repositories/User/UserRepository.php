<?php

namespace App\Repositories\User;

use EntityManager;
use EntityRepository;
use App\Entities\User;
use App\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{

    public function find($id)
    {
        return EntityManager::getRepository(User::class)->find( $id );
    }

    public function findAll()
    {
        return EntityManager::getRepository(User::class)->findAll();
    }

    public function findById( $id )
    {
        return $this->find($id);
    }

    public function findByName($name)
    {
        // implement your find by title method
    }

}