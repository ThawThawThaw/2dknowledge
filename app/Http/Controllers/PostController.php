<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $path = 'storage/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (object)['type' => 'post'];

        $posts = Post::orderBy('created_at','desc')->paginate(6);

        return view('posts.index',compact('data','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)['type' => 'post'];
        return view('posts.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'photo'=>'required|image',
        ]);

        $fileName = date('YmdHi').$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('photos',$fileName,'public'); 

        $post = new Post();

        $post->photo = $path;
        $post->type = 'post';
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = (object)['type' => 'post'];
        $post = Post::find($id);
        return view('posts.edit',compact('data','post'));
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
        request()->validate([
            'photo'=>'required|image',
        ]);

        $post = Post::findOrFail($id);

        unlink(public_path($this->path.$post->photo));  // delete old photo

        $fileName = date('YmdHi').$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('photos',$fileName,'public'); 

        $post->photo = $path;
        $post->type = 'post';
        $post->save();

        return redirect()->route('posts.index')->with('info','Photo Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if(file_exists(public_path($this->path.$post->photo))) {
            unlink(public_path($this->path.$post->photo));
        }

        $post->delete();
        
        return redirect()->back()->with('info','Photo deleted successfully.');
    }
}
