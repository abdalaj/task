<?php

namespace Modules\Posts\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\Posts\App\Http\Requests\CommentsRequest;
use Modules\Posts\App\Http\Requests\PostsRequest;
use Modules\Posts\App\Models\Comments;
use Modules\Posts\App\Models\Posts;
use Modules\Posts\Interfaces\PostsInterface;

class PostsController extends Controller
{
    public $repository;
    public function __construct(PostsInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        return view('posts::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $data['image'] = $path;
        }
        $this->repository->create($data);
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('posts::show');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('posts::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
    public function storeComment(CommentsRequest $request, $postId): RedirectResponse
    {
        Posts::find($postId)->comments()->create($request->validated());
        return redirect()->back();
    }
    public function deleteComment(Request $request): RedirectResponse
    {
        Comments::query()->whereIn('id', $request->ids)->delete();
        return redirect()->back();
    }
}
