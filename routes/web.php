<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/cadastrarpessoa', function (Request) {
//     dd($informacao->all());
// });

Route::post('/cadastrar-cliente', function (Request $informacao){
    Cliente::create([
        'nome' => $informacao->nome_cliente,
        'cpf' => $informacao->cpf_cliente,
        'data' => $informacao->data_cliente,
        'sexo' => $informacao->sexo_cliente,
        'estado' => $informacao->estado_cliente,
        'cidade' => $informacao->cidade_cliente

    ]);
    echo "Cliente criado com sucesso!";
    // dd($informacao->all());
});

Route::get('/mostrar-cliente/{id_do_cliente}', function ($id_cliente){
    $Cliente = Cliente::findorfail($id_cliente);
    echo $Cliente->nome;
    echo "<br />";
    echo $Cliente->sexo;
    echo "<br />";
    echo $Cliente->estado;
    echo "<br />";
    // echo $Cliente->cpf;
    // echo "<br />";
    // echo $Cliente->data;
    // echo "<br />";
    // echo $Cliente->cidade;
    // echo "<br />";
    //rota apenas se eu nao quiser mostrar alguns atributos ou se eu quiser posso mostrar todos
    //dd($id_cliente);
});

Route::get('/editar-cliente/{id_do_cliente}', function ($id_cliente){
    $Cliente = Cliente::findorfail($id_cliente);
    return view('editarcliente', ['cliente' => $Cliente]);
});

Route::put('/atualizar-cliente/{id_do_cliente}', function (Request $informacao, $id_cliente){
    $Cliente = Cliente::findorfail($id_cliente);
    $Cliente->nome = $informacao->nome_cliente;
    $Cliente->cpf = $informacao->cpf_cliente;
    $Cliente->data = $informacao->data_cliente;
    $Cliente->sexo = $informacao->sexo_cliente;
    $Cliente->cidade = $informacao->cidade_cliente;
    $Cliente->estado = $informacao->estado_cliente;
    $Cliente->save();
    echo "Cliente atualizado com sucesso!";

});

Route::get('/exibir-cliente', function (Request $informacao) {
    $Cliente = Cliente::select('nome', 'cpf','data', 'sexo', 'cidade','estado')->get();

    foreach ($Cliente as $Cliente) {
        echo "Nome: " . $Cliente->nome . "<br>";
        echo "cpf: " . $Cliente->cpf . "<br>";
        echo "data: " . $Cliente->data . "<br>";
        echo "sexo: " . $Cliente->sexo . "<br>";
        echo "cidade: " . $Cliente->cidade . "<br>";
        echo "estado: " . $Cliente->estado . "<br>";
        echo "<br>";
    }
    echo "Listagem completa de Cadastro dos Clientes";
});

Route::get('/excluir-cliente/{id_do_cliente}', function ($id_cliente){
    $Cliente = Cliente::findorfail($id_cliente);
    $Cliente->delete();

    echo "Cliente excluido do Sistema!";
});

//Observaçoes: No campo Sexo estava dando o erro 1148 porque nao aceitava um valor nulo ai tive que
//mudar manualmente no banco de dados no campo sexo para que aceitasse receber valour NUll

// sempre que o usuario for enviar algo a banco de dados usa se o post nao get
//put serve para enviar e atualizar um registro no banco de dados no caso dessa aplicaçao uso
//a primary key ID
