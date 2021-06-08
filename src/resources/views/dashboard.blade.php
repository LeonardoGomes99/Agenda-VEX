@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<table id="records_table" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Celular</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--
    <tr>
      <td id="nome "scope="row"></td>
      <td scope="row"></td>
      <td scope="row"></td>
      <td scope="row"></td>
      <td scope="row"><Button></Button></td>
    </tr>
    -->
  </tbody>
</table>


<script src="/js/dashboard-code.js"></script>
@stop