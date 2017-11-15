<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/museo.php';
    /**
     * Interfaccia per la comunicazione al database con
     * la tabella museo
     */
    class MuseoInterfaccia
    {	
		const SERVER_NAME = "localhost";            //Host del database
        const USER_NAME = "id3511799_angelo";      //Username del database
        const PASSWORD = "ingegneria2017";        //Password del database
        const DB_NAME = "id3511799_wordpress";   //Nome del database
        
        public $conn;   //Connesione al database
		
		
		
		/**
         * Costruttore per la classe MuseoDbInterface.
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
         * Metodo per inserire un museo nel db
         * @param Museo museo
         */
        public function create($museo){
            $sql = 'INSERT INTO wp_museo(nome,località,indirizzo,cap,orarioApertura,orarioChiusura,descrizione,email)'.  
            'VALUES("'.$museo->getNome().'","'.$museo->getLocalita().'","'.$museo->getIndirizzo().'","'.$museo->getCap().'","'.$museo->getOrarioApertura().'","'.$museo->getOrarioChiusura().'","'.$museo->getDescrizione().'","'.$museo->getEmail().'")';
            $this->conn->query($sql);
        }

        /**
         * Metodo che restituisce i musei
         * @return array Museo
         */
        public function read(){
            $sql = 'SELECT * FROM wp_museo';
            $result = $this->conn->query($sql);
            $musei = array();
            $i = 0;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $museo = new Museo($row['id_museo'], $row['nome'], $row['località'],
                    $row['indirizzo'], $row['cap'], $row['orarioApertura'],
                    $row['orarioChiusura'], $row['descrizione'], $row['email'] );
                    $musei[$i] = $museo;
                    $i++;
                }
            }
            return $musei;
        }

         /**
         * Preleva il museo identificato con l'id passato come parametro
         * @param $id
         * @return museo
         */
        public function readById($id){
            $sql = 'SELECT * FROM wp_museo WHERE id_museo = '.$id;
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $museo = new Museo($row['id_museo'],$row['nome'],$row['località'],$row['indirizzo'],$row['cap'],$row['orarioApertura'],$row['orarioChiusura'],$row['descrizione'],$row['email']);
                }
            }
            return $museo;
        }

        /**
         * Preleva il museo identificato con il name passato come parametro
         * @param $id
         * @return museo
         */
        public function readByName($name){
            $sql = 'SELECT * FROM wp_museo WHERE nome="'.$name.'"';
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $museo = new Museo($row['id_museo'],$row['nome'],$row['località'],$row['indirizzo'],$row['cap'],$row['orarioApertura'],$row['orarioChiusura'],$row['descrizione'],$row['email']);
                }
            }
            return $museo;
        }

        /**
         * Elimina il museo con id passato come parametro
         * @param $id
         * @return boolean
         */
        public function delete($id){
            $sql = 'DELETE FROM wp_museo WHERE id_museo ='.$id;
            if($this->conn->query($sql) === true)
                return true;
            else
                return false;
        }

        /**
        * Modifica il museo passato come parametro 
        * @param $museo
        * @return boolean 
        */
        public function update($museo){
            $sql = 'UPDATE wp_museo SET '.
                    'nome="'.$museo->getNome().
                    '",località="'.$museo->getLocalita().
                    '",indirizzo="'.$museo->getIndirizzo().
                    '",cap="'.$museo->getCap().
                    '",orarioApertura="'.$museo->getOrarioApertura().
                    '",orarioChiusura="'.$museo->getOrarioChiusura().
                    '",descrizione="'.$museo->getDescrizione().
                    '",email="'.$museo->getEmail().
                    '" WHERE id_museo ='.$museo->getId();   
                                 
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
            $sql = 'SELECT * FROM wp_museo';
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
        $y =  '<td></td><td></td>';
        echo $y;
            foreach($tuple as $ris){
                $str ='<tr> <td> '.$ris->getId(). ' </td> '.
                    '<td> '.$ris->getNome(). '</td>'.
                    '<td> '.$ris->getLocalita(). '</td>'.
                    '<td> '.$ris->getIndirizzo(). '</td>'.
                    '<td> '.$ris->getCap(). '</td>'.
                    '<td> '.$ris->getOrarioApertura(). '</td>'.
                    '<td> '.$ris->getOrarioChiusura(). '</td>'.
                    '<td> '.$ris->getDescrizione(). '</td>'.
                    '<td> '.$ris->getEmail(). '</td>'.
                    '<td><a href ="' . plugins_url( 'wp-museo/elimina_museo_db.php?id='.htmlspecialchars($ris->getId()), _FILE_ ) .'" 
                    onClick="return confirm(\'Sicuro di voler cancellare?\');">Elimina</a> </td>'.
                    '<td><a href ="' . plugins_url( 'wp-museo/modifica_museo.php?id='.htmlspecialchars($ris->getId()), _FILE_ ) .'">Modifica</a> </td>
                    </td></tr>';
                    echo $str;
            };
        }
	}
?>