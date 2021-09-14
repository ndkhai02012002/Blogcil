<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();
        $post_id = Like::where('user_id',$id)->select('user_id','post_id')->get();

        $has_follows = UserRelationship::where('follower_id',$id)->select('user_id')->get();
        $id_has_follows = [$id];
        $post_has_follows = [];
        $list_name = [];
        $list_avatar = [];
        foreach($has_follows as $value) {
            array_push($id_has_follows,$value->user_id);
        }
        foreach($id_has_follows as $value) {
            array_push($post_has_follows,Post::where('user_id',$value)->get());
            array_push($list_avatar,UserInformation::where('user_id',$value)->select('user_id','avatar')->get());
            array_push($list_name,User::where('id',$value)->select('id','name')->get());
        }
        return json_encode(['post_has_follows'=> $post_has_follows,'list_avatar'=> $list_avatar, 'list_name' => $list_name,'post_id'=> $post_id, 'id'=>$id ]);
    }
    public function set_likes(Request $request) {
        json_decode($request);
        $id =auth()->id();
        if ($request->state == "true") {

            $like = Like::create([
                'user_id' => $request->user_id,
                'post_id' => $request->post_id,
            ]);
            $like->save();
            $like_count = Like::where('post_id', $request->post_id)->count();
            Post::where('id', $request->post_id)->update(['likes' => $like_count]);


                $name = User::where('id', auth()->id())->first();
                $user_id = Post::where('id',$request->post_id)->first();
                if($request->user_id != $id) {
                     Notification::create([
                        'user_id' => $user_id->user_id,
                        'content' => $name->name . " đã thích bài viết của bạn."
                    ]);
                }



        } else {
            $like = Like::where('user_id', $request->user_id)->where('post_id',$request->post_id)->delete();
        }
        return response()->json([$request->all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $image_title_name = 'image_title_' . time() . '_' . auth()->id() . '.' . $request->image_title->extension();
        $request->image_title->move(public_path('images'), $image_title_name);
        $post = Post::create([
            'user_id' => auth()->id(),
            'image_title' => $image_title_name,
            'title' => $request->title,
            'likes' => 0,
        ]);
        $post->save();
        return redirect('/');
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
