<?php

namespace App\Http\Services\User;

use App\Entities\User;
//use App\Repositories\Contracts\IUserRepository;
//use  App\Repositories\User\UserRepository;
use EntityManager;

class CreateUserService
{
    public function handle( $fields )
    {
        $user = new User( $fields["name"], $fields["gender"] );
        EntityManager::persist($user);

        return $user;
    }

}