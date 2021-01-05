<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        //with('user')-> loads releationship to avoid (n+1) problem; aka without requesting same post many times, just load it once and reuse it
        //latest()-> order stuff by date descending
        //paginate(5)-> lets laravel auto paginate with given value
        //$posts->links("pagination::bootstrap-4") -> creates paginate links, available after calling function above

        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()-> validate([
            //'another' => '',
            'caption' => 'required',
            'image' => ['required','image'],
        ]);

        $imagePath = \request('image')->store('uploads', 'public');

        $image = Image::make(public_path('storage/'.$imagePath))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create( [
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        //Post::create( $data );
        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
}
