<?php


class Usuario{
    

    private $id_usuario;
    private $nome;
    private $login;
    private $senha;
    private $dt_cadastro;



    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($value){
        $this->id_usuario = $value;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($value){
        $this->login = $value;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($value){
        $this->senha = $value;
    }
    public function getDt_cadastro(){
        return $this->dt_cadastro;
    }
    
    public function setDt_cadastro($value){
        $this->dt_cadastro = $value;
    }
    
    public function loadById($id){
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM usuarios WHERE id_usuario = :ID ", array(
            ":ID"=>$id
        ));
        
        
        if(count($results) > 0){
            $row = $results[0];
            
            $this->setId_usuario($row['id_usuario']);
            $this->setNome($row['nome']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDt_cadastro(new DateTime($row['dt_cadastro']));
        }
    }

    public static function getList(){

        $sql = new Sql();

      return  $sql->select("SELECT * FROM usuarios ORDER BY login");
    }


    public static function search($login){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
            ' :SEARCH'=>"%". $login . "%"
        ));
    }

    public function __toString(){

        return json_encode(array(

            "id_usuario"=>$this->getId_usuario(),
            "nome"=>$this->getNome(),
            "login"=>$this-> getLogin(),
            "senha"=>$this->getSenha(),
            "dt_cadastro"=>$this->getDt_cadastro()->format("d/m/Y H:i:s")



        ));

    }
}





?>