<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Posts\App\Models\Posts;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with('comments', 'comments.user')
            ->orderBy('created_at', 'desc')
            ->get();
        // return $posts;
        return inertia('Home/Index', compact('posts'));
    }
}
