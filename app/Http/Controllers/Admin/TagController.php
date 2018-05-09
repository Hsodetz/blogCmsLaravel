<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\tag;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtenemos todos los registros y los ordenamos descendentes y paginamos de 3 en 3
        $tags = Tag::orderBy('id', 'ASC')->paginate(7);

        //Retornamos a la vista index de la carpeta tags de la carpeta admin, y le pasamos la variable tags
        return view ('admin.tags.index', compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //En esta funcion nos dirijimos a la vista donde se encontrara el formulario de creacion de etiquetas
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        //Se crea y se ingresa todo lo que viene por request y lo asignamos a la variable $tag
        $tag = Tag::create($request->all());

        return redirect()->route('tags.edit', $tag->id)
                ->with('info_success', "La etiqueta $tag->name se ha ingresado satisfactoriamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //Como ya le pasamos la entidad tag en la funcion, entonces retornamos 
        //a la vista show y le pasamos la variable tag
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //De esta manera podriamos hacerlo tambien, aunque de la manera de la funcion show es mas sencillo y rapido
        $tag = Tag::findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        //
        dd($id);
        
        $tag = Tag::find($id);
        
        $tag->fill($request->all())->save();

        return redirect()->route('tags.edit', $tag->id)
                ->with('info_success', "La etiqueta $tag->name se ha actualizado satisfactoriamente!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //Eliminamos la etiqueta que viene por la entidad tag, osea ese id.
        $tag->delete();

        return back()->with('info_success', "La etiqueta $tag->name se ha eliminado satisfactoriamente!");

    }
}
