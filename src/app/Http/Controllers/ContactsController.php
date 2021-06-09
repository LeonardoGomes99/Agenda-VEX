<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\UserManage;
use Validator;

class ContactsController extends Controller
{
    

    public function store(Request $request){

        //return session()->get('info')['email'];

        $validator = Validator::make($request->get('data'), [ // <---
            'nome' => 'required',
            'email' => 'required',
            'telefone1' => 'required',
            'celular1' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

        $result = filter_var($request->get('data')['email'], FILTER_VALIDATE_EMAIL );
        if($result == TRUE){

            try{
                $model = new Contacts;
                $model1 = new UserManage;

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

                $id_main_user = UserManage::select('id')->where('email', session()->get('info')['data']['email'])->first();

                $model->id_main_user = $id_main_user['id'];

                $model->save();

                return response()->json(['url'=>url('/dashboard')]);

            }catch(\Exception $e){
                return $e->getMessage();

            }

        }else{
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

    }

    public function read(){

         $id_main_user = UserManage::select('id')->where('email', session()->get('info')['data']['email'])->first();

        $posts = Contacts::where('id_main_user',  $id_main_user['id'])
                ->orderBy('id')
                ->get();

        return $posts;

    }

    public function update(Request $request){

        $validator = Validator::make($request->get('data'), [ // <---
            'nome' => 'required',
            'email' => 'required',
            'telefone1' => 'required',
            'celular1' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

        $result = filter_var($request->get('data')['email'], FILTER_VALIDATE_EMAIL );
        if($result == TRUE){

            try{
                $model = new Contacts;
                $model1 = new UserManage;

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


                $model=Contacts::find($request->get('data')['id']);
        
                foreach ($arrayEnd as $key => $node) { 

                    if($key == "tel" || $key == "cel" || $key == "end"){
                        $model->$key = json_encode($node);
                    }else{
                        $model->$key = $node;
                    }
                }

                $model->save();

                return response()->json(['url'=>url('/dashboard')]);

            }catch(\Exception $e){
                return $e->getMessage();

            }

        }else{
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

    }


    public function delete(Request $request){

        $validator = Validator::make($request->get('data'), [ 
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

        Contacts::where('id', $request->get('data')['id'])->delete();

        return response()->json(['url'=>url('/dashboard')]);


    }


}
