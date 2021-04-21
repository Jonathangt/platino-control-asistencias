<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReporteHoras extends Model
{
    use HasFactory;
    
    protected $table = 'reportes_horas'; //name table
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = [        							
        'id',
        'id_user',
        'hora_entrada',
        'estado_hora_entrada',
        'almuerzo_inicio',
        'estado_almuerzo_inicio',
        'almuerzo_regreso',
        'estado_almuerzo_regreso',
        'hora_salida',
        'estado_hora_salida',
        'total_cumplimiento',
        'fecha_registro',
    ];

    public function getAllUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    } 

    public static function getAllDataEstadoUser()
    {
        $fechaActual =  date('Y-m-d');
        $get_estados_user = ReporteHoras::where('id_user', Auth::id())
                                //->where($estado_control, 1)
                                ->whereDate('fecha_registro', $fechaActual)
                                ->first();

        return $get_estados_user;
    } 


    public static function HorasTrabajadas(){
        $get_estados_user = ReporteHoras::getAllDataEstadoUser();

            $hora_entrada = DateTime::createFromFormat('H:i A', $get_estados_user->hora_entrada);
            $almuerzo_inicio = DateTime::createFromFormat('H:i A', $get_estados_user->almuerzo_inicio);
            $almuerzo_regreso = DateTime::createFromFormat('H:i A', $get_estados_user->almuerzo_regreso);
            $hora_salida = DateTime::createFromFormat('H:i A', $get_estados_user->hora_salida);

            
            $total_h_almuerzo = $almuerzo_inicio->getTimestamp() - $almuerzo_regreso->getTimestamp();
            $total_h_trabajadas = $hora_entrada->getTimestamp() - $hora_salida->getTimestamp();
            $total_trabajo = $total_h_trabajadas-$total_h_almuerzo; 
        
            $total_cumplimiento  = gmdate("H:i", abs($total_trabajo));
            return $total_cumplimiento;           
    }



    
}
