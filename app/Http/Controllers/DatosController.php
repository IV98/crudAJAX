<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosController extends Controller
{
    public function index()
    {
        $datos = Datos::all();
        return view('datos.index', compact('datos'));
    }

    public function store(Request $request)
    {
        Datos::create([
            'nombre' => $request->name,
            'direccion' => $request->address,
            'edad' => $request->age,
            'ocupacion' => $request->ocupacion,
            'pasatiempo' => $request->pasatiempo,
        ]);

        return redirect()->back()->with('success', 'Registro grabado con éxito');
    }

    public function getData($id)
    {
        $dataAJAX = DB::table('tblDatos')
            ->select(
                'id',
                'nombre',
                'direccion',
                'edad',
                'ocupacion',
                'pasatiempo'
            )
            ->where('id', '=', $id)
            ->first();
        return $dataAJAX;
    }

    public function update(Request $request)
    {
        $arrayUpdateData = [
            'nombre' => $request->nameData,
            'direccion' => $request->addressData,
            'edad' => $request->ageData,
            'ocupacion' => $request->ocupacionData,
            'pasatiempo' => $request->pasatiempoData
        ];

        $datos = Datos::find($request->idRegistro);
        $datos->update($arrayUpdateData);

        return redirect()->back()->with('success', 'Registro actualizado con éxito');
    }

    public function destroy($id)
    {
        $dato = Datos::find($id);
        $dato->delete();
        return redirect()->back()->with('info', 'Registro eliminado con éxito');
    }
}
