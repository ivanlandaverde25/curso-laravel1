<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')
                                ->get();

        return view('posts.create', compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if(Post::create($request->all())) {
            return redirect()->route('posts.index')->with([
                'create' => 'El registro se creo con exito',
            ]);
        } else {
            return response()->json([
                'error' => 'No se pudo crear el registro'
            ], 500);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::get();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        // return $request;

        if($post->update($request->all())){
            return redirect()->route('posts.index')->with([
                'edit' => 'El registro se edito exitosamente',
            ], 200);
        } else {
            return response()->json([
                'error' => 'El registro no se pudo editar',
            ], 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            return redirect()->route('posts.index')->with([
                'delete' => 'El registro se elimino con exito',
            ], 200);
        } else {
            return response()->json([
                'error' => 'El registro no se pudo eliminar correctamente',
            ], 500);
        }
    }
}
