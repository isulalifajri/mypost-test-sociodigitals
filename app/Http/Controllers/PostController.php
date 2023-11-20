<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Page Post";
        $posts = Post::with('author', 'comments', 'likes')->latest()->paginate(10)->withQueryString();
        return view('frontend.post.index', compact(
            'title', 'posts'
        ));
    }
    public function mypost()
    {
        $title = "Page My Post";
        $user = auth()->user();
        $posts = Post::where('author_id', $user->id)->latest()->paginate(10)->withQueryString();
        $author = User::all();
        return view('frontend.post.mypost', compact(
            'title', 'posts', 'author'
        ));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function filters(Request $request)
    {

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

    public function searchs(Request $request)
    {
        $search = $request->query('search');

            $posts = Post::with('author:id,name') // Eager load the author relationship with only id and name
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                });
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

        return response()->json(['posts' => $posts]);
    }

    public function smypost(Request $request)
    {
        $user = auth()->user();
        $search = $request->query('search');

        $posts = Post::where('author_id', $user->id)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                });
            })
            // ->latest()
            // ->paginate(10)
            // ->withQueryString();
            ->get();

            return response()->json(['posts' => $posts]);
    }

   
}
