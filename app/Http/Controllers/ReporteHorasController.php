<?php

namespace App\Http\Controllers;

use App\Models\ReporteHoras;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteHorasController extends Controller
{
    public function index(Request $request){
        if(!$request->ajax()){return redirect('/platino');}

        $buscar = $request->fecha;
        try {
            if ($buscar == '') {
                $reporteHoras = ReporteHoras::with('getAllUser')->orderBy('fecha_registro', 'asc')->paginate(5);

            } else{
                $reporteHoras = ReporteHoras::with('getAllUser')
                                ->whereDate('fecha_registro', 'like', '%' . $buscar . '%')
                                ->orderBy('fecha_registro', 'asc')->paginate(5);
            }


            //$reporteHoras = ReporteHoras::with('getAllUser')->orderBy('fecha_registro', 'asc')->paginate(5);
            return [
                'pagination' => [
                    'total'        => $reporteHoras->total(),
                    'current_page' => $reporteHoras->currentPage(),
                    'per_page'     => $reporteHoras->perPage(),
                    'last_page'    => $reporteHoras->lastPage(),
                    'from'         => $reporteHoras->firstItem(),
                    'to'           => $reporteHoras->lastItem(),
                ],
                'reporteHoras' => $reporteHoras
            ];
           /*  return  response()->json(['reporteHoras' => $reporteHoras], 200); */

        } catch (Exception $e) {
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }

    public function getEstadosUser(Request $request){
        if(!$request->ajax()){return redirect('/platino');}
        try {
            $get_user_data = ReporteHoras::getAllDataEstadoUser();
            return  response()->json(['get_user_data' => $get_user_data], 200);
        } catch (Exception $e) {
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }


    public function UpdateOrCreateRegistro(Request $request){
        if(!$request->ajax()){return redirect('/platino');}
    
        try {
            if($request->tipo_registro == 'Entrada'){
                ReporteHoras::UpdateOrCreate(
                    [
                        'id_user' => Auth::id(),
                    ],
                    [ 
                        'hora_entrada' => '08:30:00 AM',//date('H:i:s A'),
                        'estado_hora_entrada' => 0,
                        'fecha_registro' => date('Y-m-d H:i:s'),
                    ]
                );
            }

            if($request->tipo_registro == 'Almuerzo Inicio'){
                ReporteHoras::UpdateOrCreate(
                    [
                       'id_user' => Auth::id(),
                    ],
                    [ 
                        'almuerzo_inicio' => '12:00:00 PM',//date('H:i:s A'),
                        'estado_almuerzo_inicio' => 0,                        
                    ]
                );
            }

            if($request->tipo_registro == 'Almuerzo Regreso'){
                ReporteHoras::UpdateOrCreate(
                    [
                       'id_user' => Auth::id(),
                    ],
                    [ 
                        'almuerzo_regreso' => '13:15:00 PM',// date('H:i:s A'),
                        'estado_almuerzo_regreso' => 0,                        
                    ]
                );
            }

            if($request->tipo_registro == 'Salida'){
                $get_id_reporte = ReporteHoras::UpdateOrCreate(
                    [
                       'id_user' => Auth::id(),
                    ],
                    [ 
                        'hora_salida' => '17:15:00 PM', //date('H:i:s A'),
                        'estado_hora_salida' => 0,
                    ]
                );

                if(is_object($get_id_reporte)){
                    $totalCumplido = ReporteHoras::HorasTrabajadas();
                    ReporteHoras::where('id', $get_id_reporte->id)->Update(
                        [
                            'total_cumplimiento' => $totalCumplido,
                        ]
                        );
                    return  response()->json(['msj' => 'OK'], 200);
                }
            }

            return  response()->json(['msj' => 'OK'], 200);
        } catch (Exception $e) {
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }   

}
