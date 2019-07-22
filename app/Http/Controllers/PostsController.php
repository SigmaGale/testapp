<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        return view('pages.posts') ->with('posts',$posts);
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
        $this -> validate($request,[
            'body' => 'required',
            'attachedImage' => 'image|nullable|max:1999'
        ]);

        /*
        *
        * Image/File Handling Block
        * 
        */

        if($request->hasFile('attachedImage')){
            $filenameWithExtension = $request-> file('attachedImage')->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension,PATHINFO_FILENAME);

            $extension = $request->file('attachedImage')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().auth()->user()->id.'.'.$extension;

            $path = $request-> file('attachedImage')->storeAs('public/posts_image',$fileNameToStore);
        }
        
        
        $post = new Post;
        $post -> body = $request -> input('body');
        $post -> posted_by = auth()->user()->id; 
        if($request->hasfile('attachedImage'))
        $post -> attachedImage = $fileNameToStore;
        $post -> save();
        
        return redirect('/posts')-> with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Post::find($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit preparation for Update
        $post =  Post::find($id);

        if(auth()->user()->id !== $post->posted_by){
           return redirect('/posts')->with('error',"Unathorized Access");
        }
        
        return view('includes.postEdit')->with('post',$post);

       
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
       
          $this -> validate($request,[
            'body' => 'required'
        ]);

        //Update post
        $post =  Post::find($id);
        $post -> body = $request -> input('body');
        $post -> posted_by = auth()->user()->id;
        $post -> save();
        
        return redirect('/posts')-> with('success','Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post -> delete();

        return redirect('/posts')->with('success','Post Deleted');
    }

}
