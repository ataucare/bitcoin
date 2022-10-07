<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bitcoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitcoinController extends Controller
{
    //
    public function getValor(){
        $apiUrl = "https://api.libreapi.cl/economy/crypto?name=bitcoin";

        if ( ini_get('allow_url_fopen') ) {
            $json = file_get_contents($apiUrl);
        } else {
            //De otra forma utilizamos cURL
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);
        }
         
        $response = json_decode($json);
        $bitcoin = "";
        foreach ($response->data as $r) {
            # code...
            //dd($r);
            if($r->symbol == "BTC"){
                $bitcoin = $r;

                $objBitcoin = new Bitcoin();
                $objBitcoin->valorUsd = $r->price_usd;
                $objBitcoin->valorClp = $r->price_clp;
                
                $objBitcoin-> save();
                break;
            }
        }
        
        return response()->json([
            "bitcoin" => $bitcoin
        ]);
    }

    public function getHistorial() {
        $historial = Bitcoin::select([
            'valorUsd',
            'valorClp',
            'created_at',
            DB::raw("'' as formatted_created_at")
        ])->orderby('created_at', 'DESC')->get();

        foreach ($historial as $h) {
            # code...
            $h->formatted_created_at = $h->created_at->format('Y-m-d H:i:s');
        }

        return response()->json([
            "data" => $historial
        ]);
    }
}
