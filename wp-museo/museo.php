<?php
/**
 * Classe Museo
 */

class Museo{
 
    private $id;
    private $nome;
    private $localita;
    private $indirizzo;
    private $cap;
    private $orarioApertura;
    private $orarioChiusura;
    private $email;
    private $descrizione;
         
    /**
     * costruttore parametrizzato
     * 
     * @param [type] $id
     * @param [type] $nome
     * @param [type] $localita
     * @param [type] $indirizzo
     * @param [type] $cap
     * @param [type] $orarioApertura
     * @param [type] $orarioChiusura
     * @param [type] $descrizione
     * @param [type] $email
     */
    public function __construct($id,$nome, $localita, $indirizzo, $cap, $orarioApertura, $orarioChiusura, $descrizione, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->localita = $localita;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->orarioApertura = $orarioApertura;
        $this->orarioChiusura = $orarioChiusura;
        $this->descrizione = $descrizione;
        $this->email = $email;
    }
         
    /**
     * Restituisce l'id
     * 
     * @return void
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Restituisce il nome
     * 
     * @return void
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * Restituisce la localita
     * 
     * @return void
     */
      public function getLocalita(){
        return $this->localita;
    }
    
    /**
     * Restituisce l'indirizzo
     * 
     * @return void
     */
    public function getIndirizzo(){
        return $this->indirizzo;
    }
    
    /**
     * Restituisce il cap
     * 
     * @return void
     */
    public function getCap(){
        return $this->cap;
    }
    
    /**
     * Restituisce l'orario di apertura
     * 
     * @return void
     */
    public function getOrarioApertura(){
        return $this->orarioApertura;
    }
    
    /**
     * Restituisce l'orario di chiusura
     * 
     * @return void
     */
    public function getOrarioChiusura(){
        return $this->orarioChiusura;
    }
    
    /**
     * Restituisce la mail
     * 
     * @return void
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Restituisce la descrizione
     * 
     * @return void
     */
    public function getDescrizione(){
        return $this->descrizione;
    }
    
    /**
     * Setta l'id
     * 
     * @param [type] $id
     * @return void
     */
    public function setId($id){
        $this->id=$id;
    }
    
    /**
     * Setta il nome
     * 
     * @param [type] $nome
     * @return void
     */
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    /**
     * Setta la localita
     * 
     * @param [type] $localita
     * @return void
     */
    public function setLocalita($localita){
        $this->localita=$localita;
    }
    
    /**
     * Setta il cap
     * 
     * @param [type] $cap
     * @return void
     */
    public function setCap($cap){
        $this->cap=$cap;
    }
    
    /**
     * Setta l'orario di apertura
     * @param [type] $orarioApertura
     * @return void
     */
    public function setOrarioApertura($orarioApertura){
        $this->orarioApertura=$orarioApertura;
    }
    
    /**
     * Setta l'orario di chiusura
     * @param [type] $orarioChiusura
     * @return void
     */
    public function setOrarioChiusura($orarioChiusura){
        $this->orarioChiusura=$orarioChiusura;
    }
    
    /**
     * Setta la mail
     * @param [type] $email
     * @return void
     */
    public function setEmail($email){
        $this->email=$email;
    }
    
    /**
     * Setta la descrizione 
     * @param [type] $descrizione
     * @return void
     */
    public function setDescrizione($descrizione){
        $this->descrizione=$descrizione;
    }
    
    /**
     * Setta l'indirizzo
     * @param [type] $indirizzo
     * @return void
     */
    public function setIndirizzo($indirizzo){
        $this->indirizzo=$indirizzo;
    }
}
?>