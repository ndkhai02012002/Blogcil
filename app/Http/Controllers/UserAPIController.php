<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAPIController extends Controller
{
    public function getInfomation() {
        $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        $information = ['name'=> $name, 'avatar' => $avatar];
        return json_encode($information);
    }
    public function navInfor() {
        $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        return view('templates.main',['name'=>$name, 'avatar' => $avatar]);
    }
    public function searchInfor() {

        $user = User::select('id','name')->get();
        $avatar = UserInformation::select('avatar','user_id')->get();
        return json_encode(['user'=> $user, 'avatar' => $avatar ]);
    }
    public function suggestions() {
        $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        $user = UserInformation::select('avatar','user_id')->get();

        return view('suggestions',['user'=> $user,'name'=> $name, 'avatar'=>$avatar]);
    }
}
