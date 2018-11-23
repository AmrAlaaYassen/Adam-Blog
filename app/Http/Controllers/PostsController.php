<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
class PostsController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at' , 'des')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check that the request data is valid
        $this->validate($request , [
            'title'=>'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // handle file
        if($request->hasFile('cover_image')){
            // Get File name extension
            $fileNameWithEXT = $request->file('cover_image')->getClientOriginalName();
            // file name
            $fileName = pathinfo($fileNameWithEXT,PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('cover_image')->guessClientExtension();
            // file to store
            $fileToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path  = $request->file('cover_image')->storeAs('public/cover_images' , $fileToStore);
        }else {
            $fileToStore = 'noImage.jpg';
        }

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->user_id = auth()->user()->id ;
        $post->cover_image = $fileToStore ;
        $post->save();
        return redirect('/posts')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // Check if the user own the post
        if(auth()->user()->id !== $post->user_id){
             return redirect('/posts')->with('error' , 'UnAuthorized Page');
        }
        return view('posts.edit')->with('post',$post);
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
        // Check that the request data is valid
        $this->validate($request , [
            'title'=>'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // handle file
        if($request->hasFile('cover_image')){
            // Get File name extension
            $fileNameWithEXT = $request->file('cover_image')->getClientOriginalName();
            // file name
            $fileName = pathinfo($fileNameWithEXT,PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('cover_image')->guessClientExtension();
            // file to store
            $fileToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path  = $request->file('cover_image')->storeAs('public/cover_images' , $fileToStore);
        }else {
            $fileToStore = 'noImage.jpg';
        }

        //Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        if($request->hasFile('cover_image')){
            Storage::delete('public/cover_images/' . $post->cover_image);
            $post->cover_image = $fileToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated Successfully');
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
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error' , ' Page');
       }
       if($post->cover_image !='noImage.jpg'){
           // Delete Image
           Storage::delete('public/cover_images/'.$post->cover_image);
       }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted Successfully');
    }
}
