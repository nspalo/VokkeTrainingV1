<?php

namespace App\Http\Services\User;

use App\Entities\User;
use App\Repositories\Contracts\IUserRepository;
use  App\Repositories\User\UserRepository;
use EntityManager;

class UpdateUserService
{
    public function handle( $userId, $fields )
    {
        $user = (new UserRepository())->findById( $userId );

        if( ! is_null( $fields["name"] ))
        {
            $user->setName( $fields["name"] );
        }

        if( ! is_null( $fields["gender"] ))
        {
            $user->setGender( $fields["gender"] );
        }

        EntityManager::persist($user);

        return $user;
    }

}