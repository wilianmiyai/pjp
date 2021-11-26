<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <?php

    function show($a) {
        ?>
        <a href= "https://www.<?php echo $a ?>.com" target="blank"><?php echo $a ?></a>      
        <?php
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Bingus</title>
        <link rel="icon" href ="imagem/favicon.ico"/>
    </head>
    <body>
        <table><!-- Criar tabela -->
            <tr><!-- criar Linha -->
                <td><!-- criar coluna -->
                    <h1>Bingus</h1>
                    <?php
                    // put your code here
                    echo '<h3>Hello World!</h3>';
                    echo '<p>Hello World!</p>';
                    $valor1 = 5;
                    $valor2 = 2;
                    $resultado = $valor1 % $valor2;
                    if ($resultado == 0) {
                        echo 'Num. ' . $valor1 . ' Par!';
                    } else {
                        echo 'Num. ' . $valor1 . ' Impar!';
                    }
                    echo '<p>';
                    show('Google');
                    echo'<p>';
                    show('Terra');
                    echo '<p>';
                    show('Youtube');
                    ?>
                    <p>
                </td>
                <td>
                    <p><h3>Registro de pessoa física</h3></p>
                    <form name="PessoaF" method="POST">
                        <label>Nome:</label>
                        <input placeholder="Nome aqui..." type="text" name="nomeF" id="nomeF"/>
                        <br>
                        <label>Telefone:</label>
                        <input placeholder="Seu numero de telefone" type="number" name="telefoneF" id="telefoneF" />
                        <br>
                        <label>Email:</label>
                        <input placeholder="Seu email" type="email" name="emailF" id="emailF" />
                        <br>
                        <label>Endereço:</label>
                        <input placeholder="Seu endereço" type="text" name="endF" id="endF" />
                        <br>
                        <label>CPF:</label>
                        <input placeholder="Seu CPF" type="number" name="cpfF" id="cpfF" />
                        <br>
                        <label>Sexo:</label>
                        <input placeholder="Seu sexo" type="text" name="sexoF" id="sexoF" />
                        <br>
                        <input type="submit" value="Salvar" name="salvarGet" />
                        <input type="submit" value="Limpar" name="resetar" />

                    </form>
                </td>
                <td>
                    <p><h3>Registro de pessoa juridica</h3></p>
                    <form name="PessoaJ" method="POST">
                        <label>Nome:</label>
                        <input placeholder="Nome aqui..." type="text" name="nome" id="nome"/>
                        <br>
                        <label>Telefone:</label>
                        <input placeholder="Seu numero de telefone" type="number" name="telefone" id="telefone" />
                        <br>
                        <label>Email:</label>
                        <input placeholder="Seu email" type="email" name="email" id="email" />
                        <br>
                        <label>Endereço:</label>
                        <input placeholder="Seu endereço" type="text" name="end" id="end" />
                        <br>
                        <label>CNPJ:</label>
                        <input placeholder="Seu CNPJ" type="number" name="cnpj" id="cnpj" />
                        <br>
                        <label>Nome Fantasia:</label>
                        <input placeholder="Nome fantasia" type="text" name="fantasia" id="fantasia" />
                        <br>
                        <input type="submit" value="Salvar" name="salvarPost" />
                        <input type="submit" value="Limpar" name="resetar" />
                    </form>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p><h2>Pessoa juridica:</h2></p>
                    <?php
                    require_once './controler/cPessoaJ.php';
                    $cadPjs = new cPessoaJ();
                    $cadPJ = new pessoaJ();
                    $cadPJ->setNome('luana');
                    $cadPJ->setTelefone(11212);
                    $cadPJ->setEmail('wilian@gmailaa.com');
                    $cadPJ->setEndereco('russa das casas 221');
                    $cadPJ->setCnpj(123);
                    $cadPJ->setNomeFantasia('Fantasias');
                    ?>
                    <?php
                    if (isset($_POST['salvarPost'])) {
                        $cadPJ->setNome($_POST['nome']);
                        $cadPJ->setTelefone($_POST['telefone']);
                        $cadPJ->setEmail($_POST['email']);
                        $cadPJ->setEndereco($_POST['end']);
                        $cadPJ->setCnpj($_POST['cnpj']);
                        $cadPJ->setNomeFantasia($_POST['fantasia']);
                        $cadPjs->addPessoaJ($cadPJ);
                    }
                    ?>
                    <?php
                    $cadPjs->toString();
                    ?>
                </td>        
                <td>
                    <p><h2>Pessoa Física:</h2></p>                   
                    <?php
                    require_once './controler/cPessoaF.php';
                    $cadPF = new pessoaF();
                    $cadPfs = new cPessoaF();
                    $cadPF->setNome('sla');
                    $cadPF->setTelefone('11111');
                    $cadPF->setEmail('wilianaass@gmail.com');
                    $cadPF->setEndereco('rua 12das casas 221');
                    $cadPF->setCpf('111');
                    $cadPF->setSexo('F');
                    ?>
                    <?php
                    if (isset($_POST['salvarGet'])) {
                        $cadPF->setNome($_POST['nomeF']);
                        $cadPF->setTelefone($_POST['telefoneF']);
                        $cadPF->setEmail($_POST['emailF']);
                        $cadPF->setEndereco($_POST['endF']);
                        $cadPF->setCpf($_POST['cpfF']);
                        $cadPF->setSexo($_POST['sexoF']);
                        $cadPfs->addPessoaF($cadPF);
                    }
                    ?>
                    <?php
                    $cadPfs->toString();
                    ?>
                </td>
            </tr>  
        </table>
    </body>
</html>
