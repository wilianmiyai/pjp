<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once '../controler/cPessoaJ.php';
$gerPJ = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger. de Pessoa Juridica</title>
    </head>
    <body>
        <h2>Ger. de Pessoa Juridica</h2>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $gerPJ->salvarBD() ?>" method="Post">
            <label>Nome:</label>
            <input placeholder="Nome aqui..." type="text" name="nome" id="nome"/>
            <br>
            <br>
            <label>Telefone:</label>
            <input placeholder="Seu numero de telefone" type="number" name="telefone" id="telefone" />
            <br>
            <br>
            <label>Email:</label>
            <input placeholder="Seu email" type="email" name="email" id="email" />
            <br>
            <br>
            <label>Endereço:</label>
            <input placeholder="Seu endereço" type="text" name="end" id="end" />
            <br>
            <br>
            <label>CNPJ:</label>
            <input placeholder="Seu CNPJ" type="number" name="cnpj" id="cnpj" />
            <br>
            <br>
            <label>Nome Fantasia:</label>
            <input placeholder="Nome fantasia" type="text" name="fantasia" id="fantasia" />
            <br>
            <br>
            <input type="submit" value="Salvar" name="salvarBD" />
            <input type="submit" value="Limpar" name="resetar" />
        </form>
        <?php
        $gerPJ->getALL();
        ?>
    </body>
</html>
