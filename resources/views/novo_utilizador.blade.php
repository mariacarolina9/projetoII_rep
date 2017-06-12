@extends('layouts.app')

@section('content')
@if (count($errors) > 0) <!--há erros se o count der maior que 0-->
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error) <!-- $errors->all() --  dá me o vetor das mensagens de erro-->
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo utilizador</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="/utilizador" method="post" role="form" >
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="campo_name" class="col-md-4 control-label">Nome: </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="campo_password" class="col-md-4 control-label">Password: </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password')}}" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                              <div class="form-group{{ $errors->has('tipo_utilizador') ? ' has-error' : '' }}">
                                <label for="campo_tipo_utilizador" class="col-md-4 control-label">Tipo de utilizador:</label>

                                <div class="col-md-6">
                                    <input id="tipo_utilizador" type="text" class="form-control" name="tipo_utilizador" value="{{ old('tipo_utilizador') }}" >

                                    @if ($errors->has('tipo_utilizador'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tipo_utilizador') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group{{ $errors->has('escola') ? ' has-error' : '' }}">
                              <label for="campo_escola" class="col-md-4 control-label">Escola: </label>

                              <div class="col-md-6">
                                  <input id="escola" type="text" class="form-control" name="escola" value="{{ old('escola') }}" >

                                  @if ($errors->has('escola'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('escola') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="campo_email" class="col-md-4 control-label">Email: </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  <button  class="btn btn-default" type="submit">Submeter</button>

      </form>

@endsection
