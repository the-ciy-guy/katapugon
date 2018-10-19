<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Album; // to use the model Album
use DB;

class AlbumsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function index(){
        $albums = Album::with('Post')->get();
        return view('albums.archive')->with('albums', $albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $album = new Album;
        $album->name = $request->input('name');
        $album->save();

        return redirect('/albums')->with('Success', 'Album Created');
    }

    public function show($id){
        $album = Album::with('Post')->find($id);
        return view('albums.show')->with('album', $album);
    }
}
