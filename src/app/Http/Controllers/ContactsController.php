<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Validator;

class ContactsController extends Controller
{
    

    public function store(Request $request){


        $validator = Validator::make($request->get('data'), [ // <---
            'nome' => 'required',
            'email' => 'required',
            'tel1' => 'required',
            'cel1' => 'required',

        ]);

        if ($validator->fails()) {
            return "Error";
        }


        try{
            $model = new Contacts;
            $arrayEnd = [];
            //Organizando Array para enviar ao banco
            foreach( $request->get('data') as $key => $node){
                if($key == "rua1" || $key == "bairro1" || $key == "cidade1" || $key == "estado1" ){
                    $arrayEnd['end'][0][$key] = $node;
                }

                else if($key == "rua2" || $key == "bairro2" || $key == "cidade2" || $key == "estado2" ){
                    $arrayEnd['end'][1][$key] = $node;
                }

                else if($key == "rua3" || $key == "bairro3" || $key == "cidade3" || $key == "estado3" ){
                    $arrayEnd['end'][2][$key] = $node;
                }else if(str_contains($key, "telefone") ){

                    $arrayEnd['tel'][$key] = $node;
                
                }else if(str_contains($key, "celular") ){

                    $arrayEnd['cel'][$key] = $node;

                }else{
                    $arrayEnd[$key] = $node;
                }

            }

    
            foreach ($arrayEnd as $key => $node) { 

                if($key == "tel" || $key == "cel" || $key == "end"){
                    $model->$key = json_encode($node);
                }else{
                    $model->$key = $node;
                }
            }

            $model->save();

            return "Contato Cadastrado com Sucesso";

        }catch(\Exception $e){
            return $e->getMessage();

        }

    }

    public function read(){
        
        $posts = Contacts::where('id_main_user', 3)
                ->orderBy('nome')
                ->take(10)
                ->get();

        return $posts;

    }


}
