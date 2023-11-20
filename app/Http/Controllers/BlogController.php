<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Blog Example';
        $posts = Post::with('author', 'comments', 'likes')->latest()->paginate(10)->withQueryString();
        $author = User::all();

        return view('backend.blog.index', compact(
            'title', 'posts', 'author'
        ));
    }

    public function show($id)
    {

        $post = Post::with('author', 'comments', 'likes')->findOrFail($id);

        return view('blog.show', compact('post'));
    }


    public function filter(Request $request)
    {
        // $status = $request->get('status');
        // $author = $request->get('author');
        // $date = $request->get('date');

        // $posts = Post::when($status, function ($query) use ($status) {
        //         return $query->where('status', $status);
        //     })
        //     ->when($author, function ($query) use ($author) {
        //         return $query->where('author_id', $author);
        //     })
        //     ->when($date, function ($query) use ($date) {
        //         return $query->whereDate('created_at', $date);
        //     })
        //     // ->latest()->paginate(10)->withQueryString();
        //     ->get();

        $status = $request->get('status');
        $author = $request->get('author');
        $date = $request->get('date');

        $posts = Post::with('author:id,name') // Eager load the author relationship with only id and name
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($author, function ($query) use ($author) {
                return $query->where('author_id', $author);
            })
            ->when($date, function ($query) use ($date) {
                return $query->whereDate('created_at', $date);
            })
            ->get();

        // Transform the posts data to include author name
        $posts = $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'date' => $post->created_at,
                'author_name' => $post->author->name, // Access the author's name from the relationship
                // Add other fields as needed
            ];
        });


            // dd(response()->json(['posts' => $posts]));
        return response()->json(['posts' => $posts]);

    }

    public function all(Request $request){
        $posts = Post::with('author', 'comments', 'likes')->latest()->paginate(10)->withQueryString();

        return response()->json(['posts' => $posts]);
    }
}
