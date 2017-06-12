<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfessorController extends Controller
{
  public function create()
  {
        return view('novo_utilizador');
  }

  //Func para guardar na bd
  public function store(Request $request)
  {


    $regras = [
      //testa -- garante que o campo obrigatorio e tem que ser no minimo de 5 caracteres
      'name', //=> 'required',
      'password',// => 'required',
      'tipo_utilizador',// => 'required',
      'escola',// => 'required',
      'email',// => 'required'
    ];

    $mensagens = [
      'name.required' =>'o nome é obrigatório!',
      'password.required' => 'a password é obrigatoria',
      'tipo_utilizador.required' => 'o tipo de utilizador é obrigatorio',
      'escola.required' => 'a escola é obrigatoria',
      'email.required' => 'O email é obrigatoria'
    ];

    //invocar o metodo , que é herdado da classe controller qu eé a suoerclasse da UtenteController
    //validate vai pegar nas variaveis que estão no request  e aplicar lhe as regras
    $this->validate($request,$regras,$mensagens);
    //parametro a ser passado para a vista, vai ao request buscar ambos os campos
    $name = $request->username;
    $password = $request->pw;
    $tipo_utilizador=$request->tipo_utilizador;
    $escola = $request->escola;
    $email = $request->email;

    $user = new User;
    $user->name = $name;
    $user->password = bcrypt($password);;
    $user->tipo_utilizador = $tipo_utilizador;
    $user->escola = $escola;
    $user->email = $email;
    $user->save();


    $professor = new Professor;
    $professor->save();


    //passar o parametro para a vista
    return view('resposta', compact('user', 'professor'));

  }
}
