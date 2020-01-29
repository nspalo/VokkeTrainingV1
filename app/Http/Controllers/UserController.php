<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EntityManager;

use  App\Repositories\User\UserRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Http\Services\User\CreateUserService;
use App\Http\Services\User\UpdateUserService;

class UserController extends Controller
{
    private $users;

    /**
     * @var CreateUserService
     */
    private $createUserService;
    /**
     * @var UpdateUserService
     */
    private $updateUserService;

    /**
     * UserController constructor.
     * @param IUserRepository $users
     * @param CreateUserService $createUserService
     * @param UpdateUserService $updateUserService
     */
    public function __construct(
        IUserRepository $users,
        CreateUserService $createUserService,
        UpdateUserService $updateUserService
    )
    {
        $this->users = $users;
        $this->createUserService = $createUserService;
        $this->updateUserService = $updateUserService;
    }

    private function checkInput($request )
    {
        return array(
            "name"   => ( 0 != count( $request->query() ) && array_key_exists( 'name', $request->query()) ) ? $request->query( 'name' ) : null,
            "gender" => ( 0 != count( $request->query() ) && array_key_exists( 'gender', $request->query()) ) ? $request->query( 'gender' ) : null,
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->findAll();

        /** @var User $user */
        foreach( $users as $key => $user )
        {
            $users[ $key ] = array(
                "name"   => $user->getName(),
                "gender" => $user->getGender()
            );
        }

        return view( "test", compact( 'users' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $this->checkInput( $request );
        $user   = $this->createUserService->handle($fields);
        EntityManager::flush($user);
    }

    /**
     * Display the specified resource.
     *
     * @param $userId
     * @return void
     */
    public function show( $userId )
    {
        $user = array(
            "name"   => $this->users->findById( $userId )->getName(),
            "gender" => $this->users->findById( $userId )->getGender()
        );

        return view( "test", compact( 'user' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dump("here");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = $this->checkInput( $request );
        $user = $this->updateUserService->handle( $id, $fields );
        EntityManager::flush($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
