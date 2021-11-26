<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<html>
    <?php

    function show($a, $l) {
        ?>
        <a href= "./view/<?php echo $a; ?>.php"><?php echo $l ?></a>      
        <?php
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Bingus</title>
        <link rel="icon" href ="imagem/favicon.ico"/>
    </head>
    <body>
        <h2>Ger. de Pessoas com POO</h2>
        <table><!-- Criar tabela -->
            <tr><!-- criar Linha -->
                <td><!-- criar coluna -->
                    <?php show('gerPesFisica', 'Ger. Pessoa Física'); ?> |
                </td>
                <td>
                    <?php show('gerPesJuridica', 'Ger. Pessoa Juridica'); ?>
                </td>
            </tr>  
        </table>
        
    </body>
</html>
