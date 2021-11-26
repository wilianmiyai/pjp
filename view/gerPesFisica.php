<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once '../controler/cPessoaF.php';
$gerPF = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger. de Pessoa Física</title>
    </head>
    <body>
        <h2>Ger. de Pessoa Física</h2>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $gerPF->salvarBD() ?>" method="Post">
            <label>Nome:</label>
            <input placeholder="Nome aqui..." type="text" name="nomeF" id="nomeF"/>
            <br>
            <br>
            <label>Telefone:</label>
            <input placeholder="Seu numero de telefone" type="number" name="telefoneF" id="telefoneF" />
            <br>
            <br>
            <label>Email:</label>
            <input placeholder="Seu email" type="email" name="emailF" id="emailF" />
            <br>
            <br>
            <label>Endereço:</label>
            <input placeholder="Seu endereço" type="text" name="endF" id="endF" />
            <br>
            <br>
            <label>CPF:</label>
            <input placeholder="Seu CPF" type="number" name="cpfF" id="cpfF" />
            <br>
            <br>
            <label>Sexo:</label>
            <input type="radio" name="sexo" value="F"/>Feminino
            <input type="radio" name="sexo" value="M"/>Masculino
            <br>
            <br>
            <input type="submit" value="Salvar" name="salvarBD" />
            <input type="submit" value="Limpar" name="resetar" />
        </form>
        <?php
        $gerPF->getALL();
        ?>
    </body>
</html>
