<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;
use Illuminate\Http\Request;


class FillInformationController extends Controller
{
    public function index() {
        return view('fill-information');
    }

    public function setInfor(Request $request) {
        $request->validate([
            'avatar' => 'required|image',
            'nick_name' =>'required|max:20|min:4|unique:user_information,nick_name',
            'birth_day' =>'required|integer',
        ]);
        $avatar_name = 'avatar_' .  auth()->id() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('images'),  $avatar_name);
        $information = UserInformation::create([
            'user_id' => auth()->id(),
            'nick_name' => $request->nick_name,
            'birth_day' => $request->birth_day,
            'avatar' => $avatar_name,
        ]);
        $information->save();
        return redirect('/');
    }
}
