<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of cPessoaF
 *
 * @author wilian
 */
require_once '../model/pessoaF.php';

class cPessoaF {

    //put your code here
    public $PF = [];

    public function __construct() {
        $this->mokPF();
    }

    public function mokPF() {
        $pf1 = new pessoaF();
        $pf1->setNome('Wilian');
        $pf1->setTelefone('51984343611');
        $pf1->setEmail('wilian@gmail.com');
        $pf1->setEndereco('rua das casas 221');
        $pf1->setCpf('12221212121212');
        $pf1->setSexo('M');
        $this->addPessoaF($pf1);

        $pf2 = new pessoaF();
        $pf2->setNome('link');
        $pf2->setTelefone('51984343211');
        $pf2->setEmail('wilianleal@gmail.com');
        $pf2->setEndereco('rua das casas');
        $pf2->setCpf('1234567890');
        $pf2->setSexo('F');
        $this->addPessoaF($pf2);
    }

    public function getALL() {
        $_REQUEST['listaPessoasF'] = $this->PF;
        $this->getALLPessoaFBD();
        require_once '../view/listaPessoaF.php';
    }

    public function addPessoaF($p) {
        array_push($this->PF, $p);
    }

    public function toString() {
        foreach ($this->PF as $pes) {
            echo $pes;
        }
    }

    public function formSalvar() {
        if (isset($_POST['salvarPF'])) {
            $pf = new pessoaF();
            $pf->setNome($_POST['nomeF']);
            $pf->setTelefone($_POST['telefoneF']);
            $pf->setEmail($_POST['emailF']);
            $pf->setEndereco($_POST['endF']);
            $pf->setCpf($_POST['cpfF']);
            $pf->setSexo($_POST['sexo']);
            $this->addPessoaF($pf);
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
            $getNome = $_POST['nomeF'];
            $getTelefone = $_POST['telefoneF'];
            $getEmail = $_POST['emailF'];
            $getEndereco = $_POST['endF'];
            $getCpf = $_POST['cpfF'];
            $getSexo = $_POST['sexo'];

            $sql = "insert into `pessoa` (`nome`,`telefone`,`email`,`endereco`,"
                    . "`cpf`,`sexo`) values ('$getNome','$getTelefone',"
                    . "'$getEmail','$getEndereco','$getCpf',"
                    . "'$getSexo')";

            mysqli_select_db($conexao, 'inf4t211');
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao inserir: ' . mysqli_error($conexao));
            }

            mysqli_close($conexao);
        }
    }

    public function getALLPessoaFBD() {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {
            die('sem conexão:' . mysqli_error());
        }
        $sql = "select * from pessoa where cnpj is null";
        $result = mysqli_query($conexao, $sql);
        $pfsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                array_push($pfsBD, $row);
            }
            $_REQUEST['pessoasFBD'] = $pfsBD;
        } else {
            $_REQUEST['pessoasFBD'] = 0;
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
        $pfsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pfsBD, $row);
            }
            return $pfsBD;
        }
        mysqli_close($conexao);
    }

    public function updatePessoaF() {
        if (isset($_POST['updatePF'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

            if (!$conexao) {
                die('sem conexão:' . mysqli_error());
            }
            $getIdPessoa = $_POST['idPessoa'];
            $getNome = $_POST['nomeF'];
            $getTelefone = $_POST['telefoneF'];
            $getEmail = $_POST['emailF'];
            $getEndereco = $_POST['endF'];
            $getCpf = $_POST['cpfF'];
            $getSexo = $_POST['sexo'];

            $sql = "UPDATE `pessoa` SET `nome`='$getNome',`telefone`='$getTelefone',"
                    . "`email`='$getEmail',`endereco`='$getEndereco',`cpf`='$getCpf',"
                    . "`sexo`='$getSexo' WHERE `idPessoa`='$getIdPessoa'";

            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die("Erro ao atualizar pessoa! " . mysqli_errno($conexao));
            }
            mysqli_close($conexao);
            header('Location: gerPesFisica.php');
        }
        if(isset($_POST['cancelarUP'])){
            header('Location: gerPesFisica.php');
        }
    }

}

?>
