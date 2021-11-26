<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of pessoaJ
 *
 * @author wilian
 */
require_once 'pessoa.php';

class pessoaJ extends pessoa {

    //put your code here
    private $cnpj;
    private $nomeFantasia;

    public function pessoaJ() {
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function setCnpj($cnpj): void {
        $this->cnpj = $cnpj;
    }

    public function setNomeFantasia($nomeFantasia): void {
        $this->nomeFantasia = $nomeFantasia;
    }
    public function __toString() {
        return $Pessoa = 
                  "Nome: " . $this->getNome() . '<br>'
                . "Telefone: " . $this->getTelefone() . '<br>'
                . "Email: " . $this->getEmail() . '<br>'
                . "Endereço: " . $this->getEndereco() . '<br>'
                . "CNPJ: " . $this->getCnpj() . '<br>'
                . "Nome Fantasia: " . $this->getNomeFantasia() . '<br><br>';
    }

}
