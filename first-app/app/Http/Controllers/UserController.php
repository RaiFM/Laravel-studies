<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Http\Requests\User\StoreUser;
// use App\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        var_dump('aqui');exit;
        $this->user = $user;
    }

    public function store(StoreUser $request){
        try{
            $user = $this
            ->user
            ->create([
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'password' => Hash::make($request->get('password')),
            ]);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('users.store',null,$e);
        }
    }
}
