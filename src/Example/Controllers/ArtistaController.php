<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Redirect;

use Neo\Pkg\Fecades\FunctionPkg;

use App\Artista;

class ArtistaController extends Controller
{
    public function index($date)
    {
        $artistas = Artista::get();

        return View::make('crud.artista.index',compact('artistas'));
    }

    public function create($date)
    {
        return view("crud.artista.create");
    }

    public function store(Request $request,$date)
    {
        $request->validate([
            'name'          => 'required|regex:/^[A-Z,a-z]/u',
            'lastname'      => 'required|regex:/^[A-Z,a-z]/u',
            'nationality'   => 'required|regex:/^[A-Z,a-z]/u'
        ]);

        $registro = new Artista();
        $registro->nombre = $request->name;
        $registro->apellido = $request->lastname;
        $registro->nacionalidad = $request->nationality;
        $registro->save();

        return Redirect::route('artista', ['date' => FunctionPkg::current_day()]);
    }

    public function edit($date,$id)
    {

        $artista = Artista::find(FunctionPkg::decrypt($id));

        return View::make('crud.artista.edit',compact('artista'));
    }

    public function update(Request $request,$date,$id)
    {
        $request->validate([
            'name'          => 'required|regex:/^[A-Z,a-z]/u',
            'lastname'      => 'required|regex:/^[A-Z,a-z]/u',
            'nationality'   => 'required|regex:/^[A-Z,a-z]/u'
        ]);

        $registro = Artista::find(FunctionPkg::decrypt($id));
        $registro->nombre = $request->name;
        $registro->apellido = $request->lastname;
        $registro->nacionalidad = $request->nationality;
        $registro->save();

        return Redirect::route('artista', ['date' => FunctionPkg::current_day()]);
    }

    public function delete($date,$id)
    {

        $registro = Artista::find(FunctionPkg::decrypt($id));
        $registro->activo = 0;
        $registro->save();

        return Redirect::route('artista', ['date' => FunctionPkg::current_day()]);
    }

    public function active($date,$id)
    {

        $registro = Artista::find(FunctionPkg::decrypt($id));
        $registro->activo = 1;
        $registro->save();

        return Redirect::route('artista', ['date' => FunctionPkg::current_day()]);
    }
}
