<?php
/**
 * Classe Users
 */
 

class Users{
    private $ID;
    private $user_login;
    private $user_pass;
    private $user_nicename;
    private $user_email;
    private $user_url;
    private $user_registered;
	private $user_activation_key;
	private $user_status;
	private $display_name;
	

    /**
     * costruttore parametrizzato
     *
     * @param [type] $id
     * @param [type] $$user_login
     * @param [type] $user_pass
     * @param [type] $user_nicename
     * @param [type] $user_email
     * @param [type] $user_url
     * @param [type] $user_registered
	 * @param [type] $user_activation_key
	 * @param [type] $user_status
	 * @param [type] $display_name
	 * @param [type] $associato
     */
 
  public function __construct($id, $user_login, $user_pass, $user_nicename, $user_email, $user_url, $user_registered, $user_activation_key, $user_status, $display_name){
        $this->ID=$id;
        $this->user_login=$user_login;
        $this->user_pass=$user_pass;
        $this->user_nicename=$user_nicename;
        $this->user_email=$user_email;
        $this->user_url=$user_url;
        $this->user_registered=$user_registered;
		$this->user_activation_key=$user_activation_key;
		$this->user_status=$user_status;
		$this->display_name=$display_name;
		
    }

    /**
     * restituisce l'id
     *
     * @return void
     */
	 
	 
    public function getId(){
        return $this->ID;
    }

    /**
     * restituisce l'user_login
     *
     * @return void
     */
    public function getUserLogin(){
        return $this->user_login;
    }

    /**
     * restituisce l'user_pass 
     *
     * @return void
     */
    public function getUserPass(){
        return $this->user_pass;
    }

    /**
     * restituisce il l'user_nicename
     *
     * @return void
     */
    public function getUserNicename(){
        return $this->user_nicename;
    }

    /**
     * restituisce l'user_email
     */
    public function getUserEmail(){
        return $this->user_email;
    }

    /**
     * restituisce l'user_url
     *
     * @return void
     */
    public function getUserUrl(){
        return $this->user_url;
    }

    /**
     * restituisce l'user_registered 
     *
     * @return void
     */
    public function getUserRegistered(){
        return $this->user_registered;
    }
	
	/**
     * restituisce l'user_activation_key 
     *
     * @return void
     */
    public function getUserActivationKey(){
        return $this->user_activation_key;
    }
	
	/**
     * restituisce l'user_status 
     *
     * @return void
     */
    public function getUserStatus(){
        return $this->user_status;
    }
	
	/**
     * restituisce il display_name
     *
     * @return void
     */
    public function getDisplayName(){
        return $this->display_name;
    }
	


    /**
     * setta l'id 
     *
     * @param [type] $id
     * @return void
     */
    public function setId($id){
        $this->ID=$id;
    }

    /**
     * setta l'user_login
     *
     * @param [type] $user_login
     * @return void
     */
    public function setUserLogin($user_login){
        $this->user_login=$user_login;
    }

    /**
     * setta l'user_pass
     *
     * @param [type] $user_pass
     * @return void
     */
    public function setUserPass($user_pass){
        $this->user_pass=$user_pass;
    }

    /**
     * setta l'user_nicename
     *
     * @param [type] $user_nicename
     * @return void
     */
    public function setUserNicename($user_nicename){
        $this->user_nicename=$user_nicename;
    }

    /**
     * setta l'user_email
     */
    public function setUserEmail($user_email){
        $this->user_email=$user_email;
    }

    /**
     * setta l'user_url
     *
     * @param [type] $user_url
     * @return void
     */
    public function setUserUrl($user_url){
        $this->user_url=$user_url;
    }

    /**
     * setta l'user_registered
     *
     * @param [type] $user_registered
     * @return void
     */
    public function setUserRegistered($user_registered){
        $this->user_registered=$user_registered;
    }
	
	/**
     * setta l'user_activation_key
     *
     * @param [type] $user_activation_key
     * @return void
     */
    public function setUserActiovationKey($user_activation_key){
        $this->user_activation_key=$user_activation_key;
    }
	
	/**
     * setta l'user_status
     *
     * @param [type] $user_status
     * @return void
     */
    public function setUserStatus($user_status){
        $this->user_status=$user_status;
    }
	
	/**
     * setta display_name
     *
     * @param [type] $display_name
     * @return void
     */
    public function setDislayName($display_name){
        $this->display_name=$display_name;
    }
	
	
	
}
?>