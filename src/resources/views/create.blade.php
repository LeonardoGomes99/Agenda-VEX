@extends('layouts.master')

@section('title', 'Novo Contato')

@section('content')
    
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <h6 class="card-title mb-3"> Cadastro do Contato </h6>
                <div class="row">
                    <div class="col-sm-12">
                    <form id="FormValues">
                        <div class="form-group">
                            <label> Nome </label>
                            <input class="form-control inputCreate" id="nome" type="text" placeholder="Nome" name="nome"> </div>                            
                    </div>
                </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label> Telefones </label>
                        <input type="text" class="form-control inputCreate tel" id="telefone1" placeholder="TELEFONE 1" maxlength="13" name="telefone1">
                        <input type="text" class="form-control inputCreate tel" id="telefone2" placeholder="TELEFONE 2" maxlength="13" name="telefone2">
                        <input type="text" class="form-control inputCreate tel" id="telefone3" placeholder="TELEFONE 3" maxlength="13" name="telefone3">
                        </div>
                        <div class="form-group col-md-6">
                        <label> Celulares </label>
                        <input type="text" class="form-control inputCreate cel" id="celular1" placeholder="CELULAR 1" maxlength="13" name="celular1">
                        <input type="text" class="form-control inputCreate cel" id="celular2" placeholder="CELULAR 2" maxlength="13" name="celular2">
                        <input type="text" class="form-control inputCreate cel" id="celular3" placeholder="CELULAR 3" maxlength="13" name="celular3">                        
                        </div>
                    </div>
                    <div class="form-group">                    
                        <label> Email </label>                        
                        <input type="text" class="form-control inputCreate" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">                    
                        <label> Endereço 1 <span id="1" class="material-icons" data-toggle="modal" data-target="#exampleModal" name="1" style="cursor:pointer">search</span> </label>                        
                        <input type="text" class="form-control inputCreate" id="rua1" placeholder="Rua" name="rua1">
                        <input type="text" class="form-control inputCreate" id="bairro1" placeholder="Bairro" name="bairro1">
                        <input type="text" class="form-control inputCreate" id="cidade1" placeholder="Cidade" name="cidade1">
                        <input type="text" class="form-control inputCreate" id="estado1" placeholder="Estado" name="estado1">
                    </div>
                    <div class="form-group">
                        <label>Endereço 2 <span id="2" class="material-icons" data-toggle="modal" data-target="#exampleModal" name="2" style="cursor:pointer">search</span> </label>            
                        <input type="text" class="form-control inputCreate" id="rua2" placeholder="Rua" name="rua2">
                        <input type="text" class="form-control inputCreate" id="bairro2" placeholder="Bairro" name="bairro2">
                        <input type="text" class="form-control inputCreate" id="cidade2" placeholder="Cidade" name="cidade2">
                        <input type="text" class="form-control inputCreate" id="estado2" placeholder="Estado" name="estado2">
                    </div>
                    <div class="form-group">
                        <label>Endereço 3 <span id="3" class="material-icons" data-toggle="modal" data-target="#exampleModal" name="3" style="cursor:pointer">search</span></label>
                        <input type="text" class="form-control inputCreate" id="rua3" placeholder="Rua" name="rua3">
                        <input type="text" class="form-control inputCreate" id="bairro3" placeholder="Bairro" name="bairro3">
                        <input type="text" class="form-control inputCreate" id="cidade3" placeholder="Cidade" name="cidade3">
                        <input type="text" class="form-control inputCreate" id="estado3" placeholder="Estado" name="estado3">
                    </div>                 
                </form>
                <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"></div> <button class="btn btn-primary btn-block confirm-button" id="ConfirmSave">Salvar Contato</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Entre com o CEP</h5>
        </div>
        <div class="modal-body">
        
            <form method="get" action=".">
            <label>Cep:
            <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                onblur="pesquisacep(this.value);" /></label><br />
            </form>

        </div>
            <p>Clique fora da caixa para adicionar os endereços aos campo</p>
        </div>
    </div>
    </div>

    <script src="/js/create-code.js"></script>


    

@stop
