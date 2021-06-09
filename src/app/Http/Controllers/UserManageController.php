<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManage;
use Validator;
use Illuminate\Support\Facades\DB;



class UserManageController extends Controller
{

    public function registerUser(Request $request){

        $model = new UserManage;

        $validator = Validator::make($request->get('data'), [ 
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'senhav' => 'required'

        ]);

        if ($validator->fails()) {
            return "Error";
        }

        $result = filter_var($request->get('data')['email'], FILTER_VALIDATE_EMAIL );
        if($result == TRUE){



            $checkEmail = UserManage::where('email', $request->get('data')['email'])->first();
            


            if($checkEmail != ""){
                return response()->json(['message' => 'Email Já cadastrado'], 500);
            }else{
                try{
                    $FormData = $request->get('data');
                    $model->nome =  $FormData['nome'];
                    $model->email =  $FormData['email'];
                    $model->senha =  $FormData['senha'];

                    $model->save();

                    $request->session()->put('info', $request->input());

                    $details = [
                        'title'=>'Olá',
                        'body'=>'Muito Obrigado por Escolher Nossa Agenda '. $FormData['nome']
                    ];

                    \Mail::to($FormData['email'])->send(new \App\Mail\SendingEmail($details));

                    return response()->json(['url'=>url('/dashboard')]);

                }catch(\Exception $e){
                    return response()->json(['message' => 'Erro, Não passou pela validação'], 500);

                }
            }
        }else{
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

       

    }

    public function loginUser(Request $request){        
        $model = new UserManage;
        $validator = Validator::make($request->get('data'), [ 
            'email' => 'required',
            'senha' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }

        $result = filter_var($request->get('data')['email'], FILTER_VALIDATE_EMAIL );

        if($result == TRUE){

            $checkLogin = DB::table('users')->where(['email' => $request->get('data')['email'], 'senha' => $request->get('data')['senha'] ])->get();
            if($checkLogin !== ""){
                
                $request->session()->put('info', $request->input());
                return response()->json(['url'=>url('/dashboard')]);

            }else{
                return response()->json(['message' => 'Login Invalido'], 500);
            }

        }else{
            return response()->json(['message' => 'Erro, Não passou pela validação'], 500);
        }
        
        
    }

}



