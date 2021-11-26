<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of cPessoaJ
 *
 * @author wilian
 */
require_once '../model/pessoaJ.php';

class cPessoaJ {

    //put your code here
    public $PJ = [];

    public function __construct() {
        $this->mokPJ();
    }

    public function mokPJ() {
        $pj1 = new pessoaJ();
        $pj1->setNome('lulu');
        $pj1->setTelefone(51984343611);
        $pj1->setEmail('wilian@gmail.com');
        $pj1->setEndereco('rua das casas 221');
        $pj1->setCnpj(1122331122676);
        $pj1->setNomeFantasia('Fantasia');
        $this->addPessoaJ($pj1);

        $pj2 = new pessoaJ();
        $pj2->setNome('popo');
        $pj2->setTelefone(51984343211);
        $pj2->setEmail('wilianleal@gmail.com');
        $pj2->setEndereco('rua das casas');
        $pj2->setCnpj(1234567890);
        $pj2->setNomeFantasia('Fantasia2');
        $this->addPessoaJ($pj2);
    }

    public function getALL() {
        $_REQUEST['listaPessoasJ'] = $this->PJ;
        $this->getALLPessoaJBD();
        require_once '../view/listaPessoaJ.php';
    }

    public function addPessoaJ($p) {
        array_push($this->PJ, $p);
    }

    public function toString() {
        foreach ($this->PJ as $pes) {
            echo $pes;
        }
    }

    public function formSalvarJ() {
        if (isset($_POST['salvarJ'])) {
            $pj = new pessoaJ();
            $pj->setNome($_POST['nome']);
            $pj->setTelefone($_POST['telefone']);
            $pj->setEmail($_POST['email']);
            $pj->setEndereco($_POST['end']);
            $pj->setCnpj($_POST['cnpj']);
            $pj->setNomeFantasia($_POST['fantasia']);
            $this->addPessoaJ($pj);
        }
    }

    public function salvarBD() {
        if (isset($_POST['salvarBD'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass);

            if (!$conexao) {
                die('sem conexão:' . mysqli_error());
            }
            $getNome = $_POST['nome'];
            $getTelefone = $_POST['telefone'];
            $getEmail = $_POST['email'];
            $getEndereco = $_POST['end'];
            $getCnpj = $_POST['cnpj'];
            $getNomeFantasia = $_POST['fantasia'];

            $sql = "insert into `pessoa` (`nome`,`telefone`,`email`,`endereco`,"
                    . "`cnpj`,`nomeFantasia`) values ('$getNome','$getTelefone',"
                    . "'$getEmail','$getEndereco','$getCnpj',"
                    . "'$getNomeFantasia')";

            mysqli_select_db($conexao, 'inf4t211');
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao inserir: ' . mysqli_error($conexao));
            }

            mysqli_close($conexao);
        }
    }

    public function getALLPessoaJBD() {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {
            die('sem conexão:' . mysqli_error());
        }
        $sql = "select * from pessoa where cpf is null";
        $result = mysqli_query($conexao, $sql);
        $pJsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                array_push($pJsBD, $row);
            }
            $_REQUEST['pessoasJBD'] = $pJsBD;
        } else {
            $_REQUEST['pessoasJBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function deletarPessoaBD() {
        if (isset($_POST['delete'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

            if (!$conexao) {
                die('sem conexão:' . mysqli_error());
            }
            $id = $_POST['id'];
            $sql = "delete from pessoa where idPessoa = $id ";
            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die('Erro ao deletar:' . mysqli_error($conexao));
            }
            echo 'Registro deletado com sucesso!';
            mysqli_close($conexao);
            header('Refresh: 0');
        }
    }

    public function getPessoaFById($id) {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {
            die('sem conexão:' . mysqli_error());
        }

        $sql = "select * from pessoa where idPessoa = $id";
        $result = mysqli_query($conexao, $sql);
        $pjsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pjsBD, $row);
            }
            return $pjsBD;
        }
        mysqli_close($conexao);
    }

    public function updatePessoaJ() {
        if (isset($_POST['updatePJ'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

            if (!$conexao) {
                die('sem conexão:' . mysqli_error());
            }
            $getIdPessoa = $_POST['idPessoa'];
            $getNome = $_POST['nome'];
            $getTelefone = $_POST['telefone'];
            $getEmail = $_POST['email'];
            $getEndereco = $_POST['end'];
            $getCnpj = $_POST['cnpj'];
            $getNomeFantasia = $_POST['fantasia'];

            $sql = "UPDATE `pessoa` SET `nome`='$getNome',`telefone`='$getTelefone',"
                    . "`email`='$getEmail',`endereco`='$getEndereco',`cnpj`='$getCnpj',"
                    . "`nomeFantasia`='$getNomeFantasia' WHERE `idPessoa`='$getIdPessoa'";

            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die("Erro ao atualizar pessoa! " . mysqli_errno($conexao));
            }
            mysqli_close($conexao);
            header('Location: gerPesJuridica.php');
        }
        if(isset($_POST['cancelarUP'])){
            header('Location: gerPesJuridica.php');
        }
    }
}
