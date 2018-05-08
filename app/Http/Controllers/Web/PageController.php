<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;

class PageController extends Controller
{
    //
    public function blog()
    {

        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));

    }

    public function post($slug)
    {
        //aplicamos el valor slug buscado que sea igual al slug y lo pasamos a la variable post
        $post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post'));
    }

    public function category($slug)
    {
        // Con pluck recuperamos todos los valores para la clave slug
        $category = Category::where('slug', $slug)->pluck('id')->first();

        $posts = Post::where('category_id', $category)->orderBy('id', 'DESC')
                    ->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function tag($slug)
    {
        //Aqui la consulta es diferente porque estamos hablando de una relacion de muchos a muchos
        $posts = Post::whereHas('tags', function($query) use ($slug){
            $query->where('slug', $slug);
        })
            ->orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')->paginate(3);
        
        return view('web.posts', compact('posts'));   
    }
    

}
