<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function navFollow()
    {
        $id_user = auth()->id();
        $id_user_follow = UserRelationship::where('follower_id', $id_user)->select('user_id')->get();
        $user = User::select('id', 'name')->where('id', '!=', $id_user)->get();
        $avatar = UserInformation::select('avatar', 'user_id')->where('user_id', '!=', $id_user)->get();

        return json_encode(['user' => $user, 'avatar' => $avatar, 'id_user_follow' => $id_user_follow, 'id_user' => $id_user]);
    }
    public function navSuggest()
    {
        $id_user = auth()->id();
        $id_user_follow = UserRelationship::where('follower_id', $id_user)->select('user_id')->get();
        $user = User::select('id', 'name')->where('id', '!=', $id_user)->get();
        $avatar = UserInformation::select('avatar', 'user_id')->where('user_id', '!=', $id_user)->get();

        return json_encode(['user' => $user, 'avatar' => $avatar, 'id_user_follow' => $id_user_follow, 'id_user' => $id_user]);
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
        json_decode($request);
        $id = auth()->id();
        if ($request->state == "true") {
            $relationship = UserRelationship::create([
                'user_id' => $request->user_id,
                'follower_id' => $request->follower_id,
            ]);
            $relationship->save();
            $followers_count = UserRelationship::where('user_id', $request->user_id)->count();
            UserInformation::where('user_id', $request->user_id)->update(['followers_count' => $followers_count]);
            $follow_to_count = UserRelationship::where('follower_id', $request->follower_id)->count();
            UserInformation::where('user_id', $request->follower_id)->update(['follow_to_count' => $follow_to_count]);
            if($request->user_id != $id) {
                $name = User::where('id', auth()->id())->first();
                $user_id = $request->user_id;
                Notification::create([
                   'user_id' => $user_id,
                   'content' => $name->name . " đã theo dõi bạn."
               ]);
           }

        } else {
            $relationship = UserRelationship::where('user_id', $request->user_id)->delete();
        }
        return response()->json([$request->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
