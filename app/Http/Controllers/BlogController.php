<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();


        $has_follows = UserRelationship::where('follower_id',$id)->select('user_id')->get();
        $id_has_follows = [$id];
        $blog_has_follows = [];
        $list_name = [];
        $list_avatar = [];
        foreach($has_follows as $value) {
            array_push($id_has_follows,$value->user_id);
        }
        foreach($id_has_follows as $value) {
            array_push($blog_has_follows,Blog::where('user_id',$value)->select('id','user_id','image_title','title','created_at')->get());
            array_push($list_avatar,UserInformation::where('user_id',$value)->select('user_id','avatar')->get());
            array_push($list_name,User::where('id',$value)->select('id','name')->get());
        }
        return json_encode(['blog_has_follows'=>$blog_has_follows,'list_avatar'=>$list_avatar, 'list_name' => $list_name ]);
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
        $image_title_name = 'image_title' . '_' .time() . '_' .auth()->id() . '.'. $request->image_title->extension();
        $request->image_title->move(public_path('images'),$image_title_name);
        $blog = Blog::create([
            'user_id' => auth()->id(),
            'image_title' => $image_title_name,
            'title' => $request->title,
            'content' => $request->element_blog,
            'likes' => 0
        ]);
        $blog->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        $blog = Blog::where('id',$id)->get();
        return view('content-blog',['blog'=>$blog,'name'=> $name, 'avatar'=>$avatar]);
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
