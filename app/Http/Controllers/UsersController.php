<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Post;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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

        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $posts = Post::where('posted_by','=',$id)->orderBy('created_at','desc')->paginate(10);
        $user = User::find($id);
        $data = array(
            'posts' => $posts,
            'user' => $user
        );
     
        return view('pages.profile')->with('data',$data);
        


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $this->validate($request,[

            'image' => 'image|required|max:1999'

        ]);
        if($request->hasFile('image')){
            $filenameWithExtension = $request-> file('image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension,PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().auth()->user()->id.'.'.$extension;

            $path = $request-> file('image')->storeAs('public/profile_image',$fileNameToStore);
        }

        $user = User::find($id);
        if($request->hasFile('image')){
            $user->image = $fileNameToStore;
        }
        $user->save();

        
        return redirect('users/'.auth()->user()->id)->with('success','Profile picture updated!');
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
