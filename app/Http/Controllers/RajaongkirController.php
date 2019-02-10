<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RajaOngkir;

class RajaongkirController extends Controller
{
    public function getProvince(){
        $data = RajaOngkir::provinsi()->all();
         return response()->json($data);
    }
    
         public function getCity($id){
            $data = RajaOngkir::Kota()->byProvinsi($id)->get();
             return response()->json($data);
            }

            public function getKurir(){
                $data = array(
                ['kurir_id' =>'jne','name'=>'JNE'],
                ['kurir_id' =>'pos','name'=>'POS'],
                ['kurir_id' =>'tiki','name'=>'TIKI'],);
                 return response()->json($data);
                }

            public function getLayanan($id){
                $data = RajaOngkir::Cost([
                    'origin' 		=> 438, 
                    'destination' 	=> 500, // id kota tujuan
                    'weight' 		=> 1700, // berat satuan gram
                    'courier' 		=> $id, // kode kurir pengantar ( jne / tiki / pos )
                ])->get();
            
                return $data[0]['costs'];
                }

                public function getCost($id){
                    $data = RajaOngkir::Cost([
                        'origin' 		=> 438, 
                        'destination' 	=> 500, // id kota tujuan
                        'weight' 		=> 1700, // berat satuan gram
                        'courier' 		=> 'jne', // kode kurir pengantar ( jne / tiki / pos )
                    ])->get();
                    
                return $data[0]['costs'][$id]['cost'];
                }
            

}