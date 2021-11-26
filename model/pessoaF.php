<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of pessoaF
 *
 * @author wilian
 */
require_once 'pessoa.php';

class pessoaF extends pessoa {

    //put your code here
    private $cpf;
    private $sexo;

    public function pessoaF() {
        
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    public function setSexo($sexo): void {
        $this->sexo = $sexo;
    }

    public function __toString() {

        return $Pessoa = 
                  "Nome: " . $this->getNome() . '<br>'
                . "Telefone: " . $this->getTelefone() . '<br>'
                . "Email: " . $this->getEmail() . '<br>'
                . "Endereço: " . $this->getEndereco() . '<br>'
                . "CPF: " . $this->getCpf() . '<br>'
                . "Sexo: " . $this->getSexo() . '<br><br>';
    }

}
