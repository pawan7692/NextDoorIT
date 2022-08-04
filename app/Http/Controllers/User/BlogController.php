<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    //

    public function showBlog() {
    	$posts = Post::where('status', 1)->get();
    	return view('user.blog', compact('posts'));
    }

    public function showSinglePost($postSlug) {

    	$post = Post::where('slug', $postSlug)->firstOrFail();
    	$categories = Category::where('status', 1)->get();
    	return view('user.singlePost', compact('post', 'categories'));

    }
}
