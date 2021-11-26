<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
$pfs = $_REQUEST['listaPessoasF'];
$pfsBd = $_REQUEST['pessoasFBD'];
$pfbd = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <table>
        <tr>
            <th>Nome</th><th>E-mail</th><th>CPF</th><th>Funções</th>
        </tr><!--
        <tr>
        <?php foreach ($pfs as $pf): ?>
                            </tr>
        <?php endforeach; ?>-->
        <?php
        if ($pfsBd == null) {
            echo "Tabela vazia!";
        } else {
            foreach ($pfsBd as $pf):
                ?>
                <tr>
                    <td><?php echo $pf["nome"]; ?> </td>
                    <td><?php echo $pf["email"]; ?> </td>
                    <td><?php echo $pf["cpf"]; ?> </td>
                    <td>
                        <form action=" editarPessoaF.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $pf["idPessoa"]; ?>"/>
                            <input type="submit" name="update" value="Editar"/>
                        </form>
                        <form action="<?php $pfbd->deletarPessoaBD(); ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $pf["idPessoa"]; ?>"/>
                            <input type="submit" name="delete" value="Deletar"/>
                        </form>
                    </td>
                </tr>
                <?php
            endforeach;
        }
        ?>
    </table>
</body>
</html>
