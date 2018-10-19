<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    // Linking the pages
    public function home(){
        $title = 'Welcome to Katapugon!';
        return view('pages.home')->with('title', $title);
    }

    public function about(){
        $title = 'About The Comic';
        return view('pages.about')->with('title', $title);
    }

    public function latest(){
        $title = 'Latest Strip';
        // $posts = Post::orderBy('title', 'desc')->take(1)->get(); // If you want to display only one post
        return view('pages.latest')->with('title', $title);
        // return view('posts.index')->with('posts', $posts);
        
    }

    public function archive(){
        $title = 'Browse All Strips';
        return view('pages.archive')->with('title', $title);
    }

    public function faq(){
        $title = 'FAQ';
        return view('pages.faq')->with('title', $title);
    }

    public function contact(){
        $title = 'Contact';
        return view('pages.contact')->with('title', $title);
    }
}
