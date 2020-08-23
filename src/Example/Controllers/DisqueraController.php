<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use beatstar\pkg\Fecades\FunctionPkg;

use App\Disquera;

class DisqueraController extends Controller
{

    public function index($date)
    {
        return view("crud.disquera.index");
    }

    public function store(Request $request,$date)
    {
        if ($request->ajax()) {

            $registro = new Disquera();
            $registro->nombre = $request->nombre;
            $registro->siglas = $request->siglas;
            $registro->save();

            $xdn['success'] = "Inserción correcta";

            return response()->json($xdn);

        }
    }

    public function show(Request $request,$date)
    {
        if ($request->ajax()) {

            $disqueras = Disquera::get();

            $string = "";

            function btnDelete($var)
            {

                $btn =  "<button class='btn btn-danger btn-sm delete mt-1 ml-1' name='$var'>Desactivar</button>";

                return $btn;
            }

            function btnActive($var)
            {

                $btn =  "<button class='btn btn-success btn-sm active mt-1 ml-1' name='$var'>Activar</button>";

                return $btn;
            }

            function btnEdit($var)
            {

                $btn =  "<button class='btn btn-info btn-sm edit mt-1 ml-1' name='$var'>Editar</button>";

                return $btn;
            }

            if (!empty($disqueras)) {

                foreach ($disqueras as $disquera) {

                    $string  .=  "<tr>";
                    $string  .=  "<th>" . $disquera->nombre . "</th>";
                    $string  .=  "<th>" . $disquera->siglas . "</th>";
                    if ($disquera->activo == 0) {
                        $string  .=  "<th>" . btnEdit(FunctionPkg::encrypt($disquera->id_d)) . btnActive(FunctionPkg::encrypt($disquera->id_d))  . "</th>";
                    }else{
                        $string  .=  "<th>" . btnEdit(FunctionPkg::encrypt($disquera->id_d)) . btnDelete(FunctionPkg::encrypt($disquera->id_d)) . "</th>";
                    }
                    $string  .=  "</tr>";

                }

                $xdn['success'] = $string;

            }

            return response()->json($xdn);

        }
    }

    public function edit(Request $request,$date,$id)
    {
        if ($request->ajax()) {

            $disquera = Disquera::find(FunctionPkg::decrypt($id));

            $arreglo = array('xdn' => FunctionPkg::encrypt($disquera->id_d), 
                             'nombre' => $disquera->nombre,
                             'siglas' => $disquera->siglas,
                             'activo' => $disquera->activo);

            return response()->json($arreglo);

        }
    }

    public function update(Request $request,$date)
    {
        if ($request->ajax()) {

            $registro = Disquera::find(FunctionPkg::decrypt($request->xdn));
            $registro->nombre = $request->nombre;
            $registro->siglas = $request->siglas;
            $registro->save();

            $xdn['success'] = "El registor ha sido actualizado.";

            return response()->json($xdn);

        }
    }

    public function delete(Request $request,$date)
    {
        if ($request->ajax()) {

            $registro = Disquera::find(FunctionPkg::decrypt($request->xdn));
            $registro->activo = 0;
            $registro->save();

            $xdn['success'] = "El registor ha sido desactivado.";

            return response()->json($xdn);

        }
    }

    public function active(Request $request,$date)
    {
        if ($request->ajax()) {

            $registro = Disquera::find(FunctionPkg::decrypt($request->xdn));
            $registro->activo = 1;
            $registro->save();

            $xdn['success'] = "El registor ha sido activado.";

            return response()->json($xdn);

        }
    }
}
