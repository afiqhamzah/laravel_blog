<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

use App\Http\Requests;

class PostController extends Controller
{
    //
    public function showAllPosts(){
      $post = Post::all();
      return view('post') -> with('postview', $post);
      // retun view('post')->withPostview($varpost);
    }

    public function createPost(){
      return view('postCreate');
    }

    public function insertPost(Request $request){
      //dd($request -> all());
      $title = $request->input('title');
      $story = $request->input('story');

      $this->validate($request, [
        'title' => 'required|unique:posts|max:255',
        'story' => 'required',
    ]);

      $post = new Post;
      $post -> user_id = Auth::user() -> id;
      $post -> title = $title;
      $post -> story = $story;
      $post -> save();

      return redirect('/post')->withSuccess('Post created successfully');
    }

    public function deletePost($id) {
      $post = Post::find($id);

      //$currentUser = (strcmp($post -> user_id, Auth::user() -> id)) ? true : false;
      //dd($post -> user_id);

      if ($post) {
        $post -> delete();
        return redirect() -> route('post.index') -> withSuccess("Post deleted successfully");
      } else {
        return redirect() -> route('post.index') -> withSuccess("Post deletion failed!");
      }
    }

    public function editPost($id) {
      $post = Post::find($id);

      return view('postEdit', compact('post'));
    }

    public function updatePost($id, Request $request ) {
      $title = $request->input('title');
      $story = $request->input('story');
      $post = Post::find($id);
      //$post -> user_id = Auth::user() -> id;
      $post -> title = $title;
      $post -> story = $story;
      $post -> save();

      return redirect() -> route('post.index') -> withSuccess("Post updates successfully");
    }
}
