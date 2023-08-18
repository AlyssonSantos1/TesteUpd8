<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabela de Registro</title>
</head>

<body>
    <form action="/cadastrar-cliente" method="POST">
        @csrf
        <label for="">Nome</label>
        <input type="text" placeholder="Digite seu nome" name="nome_cliente" >
        <br><br>
        <label for="">CPF</label>
        <input type="text" placeholder="Digite seu cpf" name="cpf_cliente">
        <br><br>
        <label for="">Data</label>
        <input type="text" placeholder="Digite a data" name="data_cliente" >
        <br><br>
        <label for="">Sexo</label>
        <input type="text" placeholder="Digite o sexo" name="sexo_cliente">
        <br><br>
        <label for="">Estado</label>
        <input type="text" placeholder="Digite seu estado" name="estado_cliente" >
        <br><br>
        <label for="">Cidade</label>
        <input type="text" placeholder="Digite sua cidade" name="cidade_cliente">
        <br><br>
        <button>Enviar</button>
    </form>

</body>
</html>
