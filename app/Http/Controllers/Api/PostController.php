<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', 3) // Hanya yang Published
                    ->latest('published_at')
                    ->paginate(10);
        // PostResource::collection($posts);
        return view('posts.index', compact('posts'));
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->where('status', 3)->firstOrFail();
        $post->increment('views_count'); // Tambah viewer setiap klik
        // return new PostResource($post);
        return view('posts.show', compact('post'));

    }
}
