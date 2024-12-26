<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})
->name('welcome');

Route::get('/users', function () {
    
    // Recuperar el usuario con su perfil
    $user = User::find(1);

    // Recuperar el perfil y despues el usuario
    $profile = Profile::find(1);

    return $user->address;
});

// Relaciones de uno a mucho
Route::get('posts', function () {

    // Recuperar todos los post con categoria 1
    $categorias = Category::find(1);
    
    // Recuperar los post
    $post = Post::find(1);

    return $post->category;
});

// Relaciones de uno a mucho a traves de
Route::get('/courses', function () {
    $courses = Course::find(1);

    $sections = Section::find(1);

    return $courses->lessons;
});

// Relacion de muchos a muchos
Route::get('/posts-tags', function(){
    
    $tags = [1, 2, 3];
    $posts = Post::find(1);

    // Con el metodo attach se agrega un registro a la tabla pivote
    // $posts->tags()->attach(2);
    
    // Con el metodo dettach se elimina un registro de la tabla pivote
    // $posts->tags()->detach(2);
    
    // Con el metodo sync se puede actualizar los registros asociados a un post
    $posts->tags()->sync($tags);

    return $posts->tags;
});

// Rutas para gerstionar los posts
Route::resource('/posts', PostController::class)
    ->parameters(['posts' => 'post'])
    ->names('posts');