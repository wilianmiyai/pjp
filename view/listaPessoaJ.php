<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
$pjs = $_REQUEST['listaPessoasJ'];
$pjsBd = $_REQUEST['pessoasJBD'];
$pjbd = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <table>
        <tr>
            <th>Nome</th><th>E-mail</th><th>CNPJ</th>
        </tr>
        <?php foreach ($pjs as $pj): ?>
                            </tr>
        <?php endforeach; ?>
        <?php
        if ($pjsBd == null) {
            echo "Tabela vazia!";
        } else {
            foreach ($pjsBd as $pj):
                ?>
                <tr>
                    <td><?php echo $pj["nome"]; ?> </td>
                    <td><?php echo $pj["email"]; ?> </td>
                    <td><?php echo $pj["cnpj"]; ?> </td>
                    <td>
                        <form action=" editarPessoaJ.php " method="POST">
                            <input type="hidden" name="id" value="<?php echo $pj["idPessoa"]; ?>"/>
                            <input type="submit" name="update" value="Editar"/>
                        </form>
                        <form action="<?php $pjbd->deletarPessoaBD(); ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $pj["idPessoa"]; ?>"/>
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
