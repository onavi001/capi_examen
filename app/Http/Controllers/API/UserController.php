<?php

namespace App\Http\Controllers\API;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosusuario = array();
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $user_domicilio = DB::table('user_domicilio')->where('id', $user->id)->first();
            $fecha_actual = date("d-m-Y");
            $date1 = new DateTime("now");
            $diff = $date1->diff(new DateTime($user->fecha_nacimento));
            $temp = array(
                "Nombre" => $user->name,
                "Fecha" => $user->fecha_nacimento,
                "Edad" => $diff->y,
                "Direccion" => $user_domicilio->domicilio." ".$user_domicilio->numero_exterior." ".$user_domicilio->colionia." ".$user_domicilio->cp." ".$user_domicilio->ciudad
            );
            
            array_push($datosusuario, $temp);
        }
        foreach ($users as $user) {
            $user_domicilio = DB::table('user_domicilio')->where('id', $user->id)->first();
            $fecha_actual = date("d-m-Y");
            $date1 = new DateTime("now");
            $diff = $date1->diff(new DateTime($user->fecha_nacimento));
            $temp = array(
                "Nombre" => $user->name,
                "Fecha" => $user->fecha_nacimento,
                "Edad" => $diff->y,
                "Direccion" => $user_domicilio->domicilio." ".$user_domicilio->numero_exterior." ".$user_domicilio->colionia." ".$user_domicilio->cp." ".$user_domicilio->ciudad
            );
            
            array_push($datosusuario, $temp);
        }

        
        header('Content-type: application/json');
        return response($datosusuario);
        //return json_encode($datosusuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
