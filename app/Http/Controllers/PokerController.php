<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class PokerController extends Controller
{
    public function index($data, $secuenciaEscalera)
    {
    $datosSin  = $data;
    $pos = array_search(14, $data);
    if(is_numeric($pos)){
        $data[$pos]= 1;
    }
    sort($data); // Se ordena el Array
    $probe = $data[0];
    $count = 0;
    $response = "no gana";
    $secuencia = [];
        for ($i=1; $i < sizeof($data); $i++) {
            if($count == $secuenciaEscalera - 1) { // si se encuentran cinco numeros concecutivos entre sí, sale del ciclo for
                $secuencia[] = $probe;
                break;
            }

            if($data[$i] == $probe+1) { // Si el elemento actual del array es igual al elemento anterior mas uno, quiere decir que los numeros son concecutivos
                //$probe = $array[$i];
                $count++;
                $secuencia[] = $probe; // Se guardan los numeros ganadores en un array, como la secuencia ganadora
                $probe = $data[$i];
                if(sizeof($data)-1 == $count){
                    $secuencia[] = $probe;
                }

            } else { // En caso contrario se resetea el contador y la secuencia ganadora
                $count = 0;
                $probe = $data[$i];
                $secuencia = [];
            }
        }

        if($count >= $secuenciaEscalera - 1){
            return $secuencia;
        }
        return $datosSin;
    }
}
