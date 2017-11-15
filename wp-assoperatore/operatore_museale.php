<?php
/**
 * Classe operatore museale
 */

class OperatoreMuseale{
 
    private $id_operatore_museale;
    private $nome;
    private $username;
    private $password;
    private $email;
    private $museo;
         
    /**
     * Costruttore 
     * @param $id_operatore_museale
     * @param $nome
     * @param $username
     * @param $password
     * @param $email
     * @parma $museo
     */
    public function __construct($id_operatore_museale,$nome, $username, $password, $email, $museo){
        $this->id_operatore_museale = $id_operatore_museale;
        $this->nome = $nome;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->museo = $museo;
       
    }
	
         
     /**
      * Metodo che restituisce l'id
      *@return $id_operatore_museale
      */
    public function getId(){
        return $this->id_operatore_museale;
    }

    /**
     * Metodo che restituisce il nome
     * @return $nome
     */
    public function getNome(){
        return $this->nome;
    }
     
    /**
     * Metodo che restituisce l'username
     * @return $username
     */
    public function getUsername(){
        return $this->username;
    }
    
    /**
     * Metodo che restituisce la password
     * @return $password
     */
    public function getPassword(){
        return $this->password;
    }
    
    /**
     * Metodo che restituisce il museo
     * @return $museo
     */
    public function getMuseo(){
        return $this->museo;
    }
    
   
    /**
     * Metodo che restituisce la mail
     * @return $mail
     */
    public function getEmail(){
        return $this->email;
    }
    
   
    /**
     * Metodo che assegna l'id
     */
    public function setId($id){
        $this->id_operatore_museale=$id;
    }
    
    /**
     * Metodo che assegna il nome
     */
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    /**
     * Metodo che assegna lo username
     */
    public function setUsername($username){
        $this->username=$username;
    }
    
    /**
     * Metodo che assegna la mail
     */
    public function setEmail($email){
        $this->email=$email;
    }
    
    /**
     * Metodo che assegna la password
     */
    public function setPassword($password){
        $this->password=$password;
    }
    
    /**
     * Metodo che assegna il museo
     */
    public function setMuseo($museo){
        $this->museo=$museo;
    }
}
?>