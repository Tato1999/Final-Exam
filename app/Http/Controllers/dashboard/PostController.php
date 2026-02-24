<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'posts' => PostResource::collection(Post::with('category')->with('user')->with('images')->get())
        ]);
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
        
        try{
            DB::beginTransaction();
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->content;
            $post->category_id = $request->category_id;
            $post->user_id = Auth::user()->id;
            $post->status = $request->status;
            $post->save();
            if ($request->hasFile('file')) {
                $files = $request->file('file'); 
                foreach ($files as $file) {

                    $path = $file->store('posts', 'public');

                    $image = new PostImage();
                    $image->post_id = $post->id;
                    $image->path = $path;
                    $image->save();
                }
            }
            DB::commit();
            return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
        }
        catch(Throwable $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'posts' => Post::with('category')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):JsonResponse
    {
        $post = Post::query()->findOrFail(intval($id));
        $post->title = $request->title;
        $post->description = $request->content;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->status = $request->status;
        $post->save();
        return response()->json([

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::query()->findOrFail(intval($id));
        foreach ($post->images as $image) {

            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }

            $image->delete();
        }
        $post->delete();
        return response()->json([

        ],204);
    }
}
