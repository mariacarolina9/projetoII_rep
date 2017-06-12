@extends('layouts.app')

@section('content')

@if (count($errors) > 0) <!--há erros se o count der maior que 0-->
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error) <!-- $errors->all() --  dá me o vetor das mensagens de erro -->
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> <h2>Lista de Utilizadores </h2> </div>
        <div class="panel-body">
          <table class="table table-hover" >

            <tr>
              <td><b>Nome </b></td>
              <td><b>Email</b></td>
              <td><b>Tipo de profissional</b></td>
              <td><b>Escola</b></td>
            </tr>
            <ul>
              @forelse($users as $user)
            <tr>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td>{{$user->tipo_utilizador}}</td>
                <td>{{$user->escola}}</td>
            </tr>
                  @empty
                  <p>Nenhum utilizador inserido</p>
                  @endforelse
                </ul>
              </table>
            </div>
@endsection
