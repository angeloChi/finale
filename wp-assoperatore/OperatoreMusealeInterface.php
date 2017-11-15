<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-assoperatore/operatore_museale.php';

class OperatoreMusealeInterface{

    const SERVER_NAME = "localhost";            //Host del database
    const USER_NAME = "id3511799_angelo";      //Username del database
    const PASSWORD = "ingegneria2017";        //Password del database
    const DB_NAME = "id3511799_wordpress";   //Nome del database
    
    public $conn;   //Connesione al database
    
    
    
    /**
     * Costruttore per la classe OperatoreMusealeInterface.
     */
    public function __construct() {}
    
    /**
     * Crea la connessione al db
     * @return boolean
     */    
    public function createConn(){
        $this->conn = new mysqli(self::SERVER_NAME, self::USER_NAME,self::PASSWORD, self::DB_NAME);			
        if(mysqli_connect_error())
            return false;
        else
            return true;
    }

    /**
     * Restituisce la connessione al db
     * @return conn
     */
    public function getConn(){
        return $this->conn;
    }

    /**
     * Chiude la connessione al db
     */
    public function closeConn(){
        $this->conn->close();
    }


    /**
     * Inserimento di un nuovo operatore
     */
    public function create($operatore){
        $op=new OperatoreMuseale($operatore->getId(),$operatore->getNome(),$operatore->getUsername(),$operatore->getPassword(),$operatore->getEmail(),$operatore->getMuseo());
        $op=$this->readById($operatore->getId());
        if(!isset($op)){
			echo'Inserimento Avvenuto con Successo!!!!!!!!';
            $sql = 'INSERT INTO wp_operatore_museale(id_operatore_museale,nome,username,password,email,museo)'.
                     ' VALUES('.$operatore->getId().',"'.$operatore->getNome().'","'.$operatore->getUsername().'","'.$operatore->getPassword().'","'.$operatore->getEmail().'","'.$operatore->getMuseo().'")';

			$this->conn->query($sql);
			
			}
			
			else{
				if($this->update($operatore)==true)
					echo'Aggiornamento';
				else
					echo 'Impossibile aggiornare';
			}

    }


    /**
    * Preleva l'operatore museale identificato con l'id passato come parametro
    * @param $id
    * @return operatore
    */
    public function readById($id){
        $sql = 'SELECT * FROM wp_operatore_museale WHERE id_operatore_museale='.$id;
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $operatore = new OperatoreMuseale($row['id_operatore_museale'], $row['nome'], $row['username'], $row['password'], $row['email'], $row['museo']);
            }
        }
        return $operatore;
    }

    /**
    * Metodo che restituisce i vari operatori
    * @return array operatore
    */
    public function read(){
        $sql = 'SELECT * FROM wp_operatore_museale';
        $result = $this->conn->query($sql);
        $operatori = array();
        $i = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $operatore = new OperatoreMuseale($row['id_operatore_museale'], $row['nome'], $row['username'], $row['password'], $row['email'], $row['museo']);
                $operatori[$i] = $operatore;
                $i++;
            }
        }
        return $operatori;
    }

    /**
    * Elimina l'operatore con id passato come parametro
    * @param $id
    * @return boolean
    */
    public function delete($id){
        $sql = 'DELETE FROM wp_operatore_museale WHERE id_operatore_museale ='.$id;
        if($this->conn->query($sql) === true)
            return true;
        else
            return false;
    }


    /**
    * Modifica l'operatore passato come parametro 
    * @param operatore
    * @return boolean 
    */
    public function update($operatore){
        $sql = 'UPDATE wp_operatore_museale SET '.
                'museo="'.$operatore->getMuseo().
                '" WHERE id_operatore_museale ='.$operatore->getId();   
                                 
        if($this->conn->query($sql) === true)
            return true;
        else
            return false;
    }


    /**
    * Metodo che restituisce il nome delle colonne della tabella
    * @return array
    */
    public function getColumnName(){
        $sql = 'SELECT * FROM wp_operatore_museale';
        $result = $this->conn->query($sql);
        $column = array();
        $i = 0;
        while($nameColumn = $result->fetch_field()){
            $column[$i] = $nameColumn->name;
            $i++;
        }
        return $column;
    }

    /**
    * Stampa le tuple della tabella
    * @return void
    */
    public function visualizzazione(){
        $nameColumn = $this->getColumnName();
        $tuple = $this->read();
        foreach($nameColumn as $nome){
            $x = ' <td> '. $nome . ' </td> ';
            echo $x;
        }
        
        foreach($tuple as $ris){
            $str ='<tr> <td> '.$ris->getId(). ' </td> '.
                    '<td> '.$ris->getNome(). '</td>'.
                    '<td> '.$ris->getUsername(). '</td>'.
                    '<td> '.$ris->getPassword(). '</td>'.
                    '<td> '.$ris->getEmail(). '</td>'.
                    '<td> '.$ris->getMuseo(). '</td>'.
                    '</tr>';
            echo $str;
            };
        }
}
?>