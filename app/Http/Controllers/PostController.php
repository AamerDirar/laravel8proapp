<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        return view('add-post');
    }

    public function createPost(Request $request)
    {
        $post        = new Post();
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->save();
        return back()->with('post_created', 'Post has been created successfully!');
    }

    public function getPost()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('posts', compact('posts'));
    }

    public function getPostById($id)
    {
        $post = Post::where('id', $id)->first();
        return view('single-post', compact('post'));
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully!');
    }

    public function edtiPost($id)
    {
        $post = Post::find($id);
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->save();
        return back()->with('post_updated', 'Post has been updated successfully!');
    }

    public function addNewPost()
    {
        $post = new Post();
        $post->title = "Fourth Post Title";
        $post->body  = "Fourth Post Description";
        $post->save();
        return "Post has been created successfully!";
    }

    public function addComment($id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = "This is second comment on post no : [" . $post->id . ']';
        $post->comments()->save($comment);
        return "Comment has been posted";
    }

    public function getCommentByPost($id)
    {
        $comment = Post::find($id)->comments;
        return $comment;
    }
}
