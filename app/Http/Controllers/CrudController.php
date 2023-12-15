<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CrudController extends Controller
{
    public function index (){
        $datos=DB::select("select * from tareass");
        $diasFaltantes = 0;
        $diasFaltantes2 = 0;
       
        $fecha= Carbon::now();

            foreach ($datos as $dato) {
                $dato->diasFaltantes = $fecha->diffInDays(Carbon::parse($dato->fecha_inicio));
            }
        
       
            foreach ($datos as $dato) {
                $dato->diasFaltantes2 = $fecha->diffInDays(Carbon::parse($dato->fecha_fin));
            }
      
          

        return view('home', compact('datos'));

        //return view('home')->with(["datos" => $datos, "fecha" => $fecha]);
   

    }

    /*
    public function create (Request $request){
       // dd($request);
        return $request->txttitulo;
    }
*/

    public function create (Request $request){
        
        try {
            $sql=DB::insert("INSERT INTO tareass(titulo,descripcion,estado,fecha_inicio,fecha_fin) VALUES (?,?,?,?,?)",[
                $request->txttitulo,
                $request->txtdescripcion,
                $request->txtmenu,
                $request->txtfechainicio,
                $request->txtfechafin
                     ]);
        } catch (\Throwable $th) {
            $sql =0;
        }
           
       
        if ($sql == true) {
            return back()->with("correcto","Registro insertado correctamente");
      //  break;
        } else {
            return back()->with("Incorrecto","Registro no insertado");
        }
      
    }

    public function update (Request $request){
        
        try {
            $sql=DB::update("update tareass set titulo=?, descripcion=?, estado=?, fecha_inicio=?, fecha_fin=? where ID=?",[
                $request->txttitulo,
                $request->txtdescripcion,
                $request->txtmenu,
                $request->txtfechainicio,
                $request->txtfechafin,
                $request->txtID
                     ]);
                    if ($sql==0) {
                        $sql=1;
                    } 
        } catch (\Throwable $th) {
            $sql =0;
        }
           
        if ($sql == true) {
            return back()->with("correcto","Se actualizo correcto");
      //  break;
        } else {
            return back()->with("Incorrecto","No se pudo actualizar");
        }
      
    }


    public function delete($id){
        try {
            $sql=DB::delete("delete from tareass where ID=$id");
        } catch (\Throwable $th) {
            $sql =0;
        }
        if ($sql == true) {
            return back()->with("correcto","Se elimino correcto");
      //  break;
        } else {
            return back()->with("Incorrecto","No se pudo eliminar");
        }
    }

    

   
}





