<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use DB;

class PostSController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post1 = Posts::all();

        //to filter and sort
        //$post1 = Posts::where('id', '1')->get();
        //$post1 = Posts::orderby('string','desc')->get();

        //using sql query
        //$post1 = DB::select("SELECT * FROM postss order by string desc");

        //to limit the display 
        //$post1 = Posts::orderby('string','desc')->take(1)->get();

        //create pagination
        $post1 = Posts::orderby('string','desc')->paginate(2);
        
        return view('posts.index')->with('post', $post1);
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
        $this -> validate($request, [
            'title' => 'required',
            'Body' => 'required'
        ]);

        //Create post
        $post = new Posts;
        $post->string = $request->input('title');
        $post->body = $request->input('Body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')  -> with('success', 'Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Posts::find($id);
        $post = Posts::find($id);
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
        $post = Posts::find($id);

        if(Auth()->user()->id !== $post->User_id){
            return redirect('/posts')->with('error', 'unauthorized user');
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
        $this -> validate($request, [
            'title' => 'required',
            'Body' => 'required'
        ]);

        //create
        $post = Posts::find($id);
        $post->string = $request->input('title');
        $post->body = $request->input('Body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);

        if(Auth()->user()->id !== $post->User_id){
            return redirect('/posts')->with('error', 'unauthorized user');
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
