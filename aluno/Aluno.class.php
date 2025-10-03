<?php
class Aluno{
    private $brunoId;
    private $brunoRm;
    private $brunoNome;
    private $brunoEmail;
    private $brunoCpf;
    private $brunoPdo;
    private $brunoSenha;
    

    public function conectar(){
        $brunoDns    = "mysql:dbname=EtimPwiiAluno;host=localhost";
        $brunoDbUser = "root";
        $brunoDbPass = "";

        try {
            $this->brunoPdo = new PDO($brunoDns, $brunoDbUser, $brunoDbPass);
            return true;
        } catch (\Throwable $brunoTh) {
            return false;
        }
    }

    public function getBrunoId(){
        return $this->brunoId;
    }
    public function getBrunoRm(){
        return $this->brunoRm;
    }
    public function getBrunoNome(){
        return $this->brunoNome;
    }
    public function getBrunoEmail(){
        return $this->brunoEmail;
    }
    public function getBrunoCpf(){
        return $this->brunoCpf;
    }

    public function setBrunoRm($brunoRm){
        $this->brunoRm = $brunoRm ;
    }
    public function setBrunoNome($brunoNome){
        $this->brunoNome = $brunoNome ;
    }
    public function setBrunoEmail($brunoEmail){
        $this->brunoEmail = $brunoEmail ;
    }
    public function setBrunoCpf($brunoCpf){
        $this->brunoCpf = $brunoCpf ;
    }

    public function cadastrar($brunoRm, $brunoNome, $brunoEmail, $brunoCpf){
        
        $brunoSql = "INSERT INTO aluno set rm = :r, nome = :n, email = :e, cpf = :c";
        
        $brunoSql = $this->brunoPdo->prepare($brunoSql);

        
        $brunoSql-> bindValue(":r", $brunoRm);
        $brunoSql-> bindValue(":n", $brunoNome);
        $brunoSql-> bindValue(":e", $brunoEmail);
        $brunoSql-> bindValue(":c", $brunoCpf);

        
        return $brunoSql->execute();
    }

    public function consultar($brunoEmail){
        $brunoSql = "SELECT *FROM aluno WHERE email = :e";
        $brunoSql = $this->brunoPdo->prepare($brunoSql);
        $brunoSql-> bindValue(":e", $brunoEmail);
        $brunoSql->execute();

        return $brunoSql->rowCount() > 0;
        
    }


}



