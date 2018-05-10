<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Invocamos la clase de almacenado, para almacenar imagenes, entre otros
use Illuminate\Support\Facades\Storage;

use Auth;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'DESC')
                ->where('user_id', Auth::user()->id)
                ->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //vamos atraernos las categorias para mostrarlas en un combobox, usando el metodo pluck
        //para que solo nos muestre por nombre e id
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        //, y las etiquetas para mostrarlas todas en checkbox
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        //
        $post = Post::create($request->all());

        //Aqui agregamos la imagen si existe
        if ($request->file('file')) {
            // Le decimos que se almacene en la variable $path el nombre del archivo, y a su vez se guarde en public/image
            $path = Storage::disk('public')->put('image', $request->file('file'));
            //actualizamos y salvamos con la extension necesaria, ejm http://xxxx/imagexxxx.jpg
            $post->fill(['file' => asset($path)])->save();
        }

        //Ahora vamos con la relacion del post y las etiquetas
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.index')
                ->with('info_success', "La entrada $post->name se ha creado satisfactoriamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //vamos atraernos las categorias para mostrarlas en un combobox, usando el metodo pluck
        //para que solo nos muestre por nombre e id
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        //, y las etiquetas para mostrarlas todas en checkbox
        $tags = Tag::orderBy('name', 'ASC')->get();

        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        //
        $post = Post::find($id);
        
        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->body = $request->body;

        //Aqui agregamos la imagen si existe
        if ($request->file('file')) {
        // Le decimos que se almacene en la variable $path el nombre del archivo, y a su vez se guarde en public/image
        $path = Storage::disk('public')->put('image', $request->file('file'));
        //actualizamos y salvamos con la extension necesaria, ejm http://xxxx/imagexxxx.jpg
        $post->fill(['file' => asset($path)])->save();
        }

        //Ahora vamos con la relacion del post y las etiquetas
        $post->tags()->sync($request->get('tags'));

        $post->save();
        //$post->update($request->all());
        
        return redirect()->route('posts.index')
                ->with('info_success', "La entrada $post->name se ha actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        $post->delete();

        return back()->with('info_success', "Se ha eliminado la entrada $post->name satisfactoriamente!");
    }
}