<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'latest']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = POST::orderBy('title', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->take(1)->get();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    }

    // public function latest(){
    //     // $posts = Post::orderBy('created_at', 'desc')->take(1)->get();
    //     // return view('posts.latest')->with('posts', $posts);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        return view('posts.create')->with('album_id', $album_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'comic_strip' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('comic_strip')){
            // Get filename with the extension
            $filenameWithExt = $request->file('comic_strip')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('comic_strip')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('comic_strip')->storeAs('public/comic_strips/'.$request->input('album_id'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->album_id = $request->input('album_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id; 
        $post->comic_strip = $fileNameToStore;
        $post->save();
        // Redirect
        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Comic Uploaded');
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
        return view('posts.show')->with('post', $post);
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
        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
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
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'comic_strip' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('comic_strip')){
            // Get filename with the extension
            $filenameWithExt = $request->file('comic_strip')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('comic_strip')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('comic_strip')->storeAs('public/comic_strips', $fileNameToStore);
        }
        // Find Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('comic_strip')){
            $post->comic_strip = $fileNameToStore;
        }    
        $post->save();
        // Redirect
        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Comic Updated');
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
         // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unathorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/comic_strips/'.$post->album_id.'/'.$post->comic_strip);
        }

        $post->delete();
        return redirect('/albums')->with('success', 'Comic Removed');
    }
}
