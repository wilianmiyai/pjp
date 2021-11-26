<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once '../controler/cPessoaJ.php';
$idPessoa = 0;
if (isset($_POST['update'])) {
    $idPessoa = $_POST['id'];
}
$cadPjs = new cPessoaJ();
$pessoaJ = $cadPjs ->getPessoaFById($idPessoa);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Pessoa Juridica</h1>
        <form action="<?php $cadPjs->updatePessoaJ(); ?>" method="Post">
            <input type="hidden" name="idPessoa" value="<?php echo $pessoaJ[0]['idPessoa'];?>"
            <label>Nome:</label>
            <input value="<?php echo $pessoaJ[0]['nome'];?>" type="text" name="nome" id="nome"/>
            <br>
            <br>
            <label>Telefone:</label>
            <input value="<?php echo $pessoaJ[0]['telefone'];?>" type="number" name="telefone" id="telefone" />
            <br>
            <br>
            <label>Email:</label>
            <input value="<?php echo $pessoaJ[0]['email'];?>" type="email" name="email" id="email" />
            <br>
            <br>
            <label>Endereço:</label>
            <input value="<?php echo $pessoaJ[0]['endereco'];?>" type="text" name="end" id="end" />
            <br>
            <br>
            <label>CNPJ:</label>
            <input value="<?php echo $pessoaJ[0]['cnpj'];?>" type="number" name="cnpj" id="cnpj" />
            <br>
            <br>
            <label>Nome Fantasia:</label>
            <input value="<?php echo $pessoaJ[0]['nomeFantasia'];?>" type="text" name="fantasia" id="fantasia" />
            <br>
            <br>
            <input type="submit" value="Salvar" name="updatePJ" />
            <input type="submit" value="Cancelar" name="cancelarUP" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
