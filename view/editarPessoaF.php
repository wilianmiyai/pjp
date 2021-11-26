<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
require_once '../controler/cPessoaF.php';
$idPessoa = 0;
if (isset($_POST['update'])) {
    $idPessoa = $_POST['id'];
}
$cadPfs = new cPessoaF();
$pessoaF = $cadPfs ->getPessoaFById($idPessoa);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Pessoa Física</h1>
        <form action="<?php $cadPfs->updatePessoaF(); ?>" method="Post">
            <input type="hidden" name="idPessoa" value="<?php echo $pessoaF[0]['idPessoa'];?>"
            <label>Nome:</label>
            <input value="<?php echo $pessoaF[0]['nome'];?>" type="text" name="nomeF" id="nomeF"/>
            <br>
            <br>
            <label>Telefone:</label>
            <input value="<?php echo $pessoaF[0]['telefone'];?>" type="number" name="telefoneF" id="telefoneF" />
            <br>
            <br>
            <label>Email:</label>
            <input value="<?php echo $pessoaF[0]['email'];?>" type="email" name="emailF" id="emailF" />
            <br>
            <br>
            <label>Endereço:</label>
            <input value="<?php echo $pessoaF[0]['endereco'];?>" type="text" name="endF" id="endF" />
            <br>
            <br>
            <label>CPF:</label>
            <input value="<?php echo $pessoaF[0]['cpf'];?>" type="number" name="cpfF" id="cpfF" />
            <br>
            <br>
            <label>Sexo:</label>
            <input type="radio" <?php if($pessoaF[0]['sexo']=="F"){echo "checked";} ?> name="sexo" value="F"/>Feminino
            <input type="radio" <?php if($pessoaF[0]['sexo']=="M"){echo "checked";} ?> name="sexo" value="M"/>Masculino
            <br>
            <br>
            <input type="submit" value="Salvar" name="updatePF" />
            <input type="submit" value="Cancelar" name="cancelarUP" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
