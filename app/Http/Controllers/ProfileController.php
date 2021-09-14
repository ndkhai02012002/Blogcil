<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $id = auth()->id();
        $user = User::where('id',$id)->first();
        $information = UserInformation::where('id',$id)->first();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        return view('profile', ['user'=> $user, 'infor' => $information,'name'=>$name, 'avatar' => $avatar]);
    }
    public function profile_users($id)
    {
        $user = User::where('id',$id)->first();
        $information = UserInformation::where('id',$id)->first();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        return view('profile-user', ['user'=> $user, 'infor' => $information,'name'=>$name, 'avatar' => $avatar]);
    }
    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required|image',
            'nick_name' =>'required|max:12|min:4|unique:user_information,nick_name',
            'birth_day' =>'required|integer|max:4|min:4',
        ]);
        $id = auth()->id();
        $avatar_name = 'avatar_' .  auth()->id() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('images'),  $avatar_name);
        $user = User::find($id);
        $information = UserInformation::find($id);
        $information->avatar = $avatar_name;
        $information->nick_name = $request->nick_name;
        $information->birth_day= $request->birth_day;
        $user->name = $request->name;
        $user->save();
        $information->save();
        return redirect(route('show-profile'));
    }
}
