<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Utilizador;
use App\Adolescente;
use App\Profissional_saude;
use App\Professor;
use App\Administrador;

class UtilizadorController extends Controller
{
  //Func para criar um utilizador
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
        'nickname',
        'altura',
        'peso',
        'obj_pessoais',
        'historial',
        'tipo_profissional',
        'instituicao_trabalho',
        'n_ordem',
      ];

      $mensagens = [
        'name.required' =>'o nome é obrigatório!',
        'password.required' => 'a password é obrigatoria',
        'tipo_utilizador.required' => 'o tipo de utilizador é obrigatorio',
        'escola.required' => 'a escola é obrigatoria',
        'email.required' => 'O email é obrigatoria',
        'nickname.required' => 'O nickname é obrigatorio',
        'altura.required' => 'O nickname é obrigatorio',
        'peso.required' => 'O nickname é obrigatorio',
        'obj_pessoais.required' => 'O nickname é obrigatorio',
        'historial.required' => 'O nickname é obrigatorio',
      ];

      //invocar o metodo , que é herdado da classe controller qu eé a suoerclasse da UtenteController
      //validate vai pegar nas variaveis que estão no request  e aplicar lhe as regras
      $this->validate($request,$regras,$mensagens);
      //parametro a ser passado para a vista, vai ao request buscar ambos os campos
      $name = $request->name;
      $password = $request->password;
      $tipo_utilizador=$request->tipo_utilizador;
      $escola = $request->escola;
      $email = $request->email;
      $nickname = $request->nickname;
      $altura = $request->altura;
      $peso = $request->peso;
      $obj_pessoais = $request->obj_pessoais;
      $historial = $request->historial;
      $tipo_profissional = $request->tipo_profissional;
      $instituicao_trabalho = $request->instituicao_trabalho;
      $n_ordem = $request->n_ordem;

      $user = new User;
      $user->name = $name;
      $user->password = bcrypt($password);;
      $user->tipo_utilizador = $tipo_utilizador;
      $user->escola = $escola;
      $user->email = $email;
      $user->save();

if($tipo_utilizador == 'Adolescente'){
      $adolescente = new Adolescente;
      $adolescente->nickname = $nickname;
      $adolescente->altura = $altura;
      $adolescente->peso = $peso;
      $adolescente->obj_pessoais = $obj_pessoais;
      $adolescente->historial = $historial;
      $adolescente->idUser=$user->id;
      $adolescente->save();

    }elseif ($tipo_utilizador == 'Profissional de saúde') {
      $profissional = new Profissional_saude;
      $profissional->tipo_profissional = $tipo_profissional;
      $profissional->instituicao_trabalho = $instituicao_trabalho;
      $profissional->n_ordem = $n_ordem;
      $profissional->idUser=$user->id;
      $profissional->save();

    }elseif ($tipo_utilizador == 'Professor') {
      $profissional = new Professor;
      $profissional->idUser=$user->id;
      $profissional->save();
    }

      //passar o parametro para a vista
      //return view('resposta', compact('user'));
      return redirect()->route('users.listar');

    }

    public function index()
    {
      //pedir ao modelo utente um vetor com tudo o que está na tabela utente e
      //vai resultar num vetor de instâncias
      $users = User::all();
      return view('lista_utilizadores', compact('users'));
    }

    public function view($id) // este é o id que vai ser passado na rota
    {

      //pedir ao modelo utente um vetor com todos os dados do utente
      $user = User::find($id);
      return view('detalhe', compact('user'));//aqui seria uma vista
    }

    /*public function edit($id)
    {
      $utente = Utilizador::find($id);

      return view('editar_utente', compact('utente'));

    }

    public function update($id, Request $request)
    //Request -> type hint -- é uma pista - o laravel tem de passar aquela infromação para o metodo
    {
      //ir procurar o utentente na bd
      $utente = Utente::find($id);

      $regras = [
        //testa -- garante que o campo obrigatorio e tem que ser no minimo de 5 caracteres
        'nome' => 'required|min:5',
        'idade' => 'required|integer|min:18'
      ];

      $mensagens = [
        'nome.required' =>'o nome é obrigatório!',
        'nome.min' =>'o nome tem que ter no minimo 5 caracteres',
        'idade.required' => 'a idade é obrigatoria',
        'idade.integer' => 'a idade tem que ser um numero inteiro',
        'idade.min' => 'a idade tem que ser no minimo 18 anos'
      ];

      //invocar o metodo , que é herdado da classe controller qu eé a suoerclasse da UtenteController
      //validate vai pegar nas variaveis que estão no request  e aplicar lhe as regras
      $this->validate($request,$regras,$mensagens);
      //parametro a ser passado para a vista, vai ao request buscar ambos os campos
      $nome = $request->nome;
      $idade = $request->idade;


      $utente->nome = $nome;
      $utente->idade = $idade;
      //efetivisa o guardar na bd
      $utente->save();


      //passar o parametro para a vista
      return view('resposta', compact('nome','idade'));

}*/
}
