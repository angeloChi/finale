<?php
    include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-assoperatore/users.php';
    
    /**
     * Interfaccia per la comunicazione al database con
     * la tabella users
     */
    class UserDbInterface{
        const SERVER_NAME = "localhost";            //Host del database
        const USER_NAME = "id3511799_angelo";      //Username del database
        const PASSWORD = "ingegneria2017";        //Password del database
        const DB_NAME = "id3511799_wordpress";   //Nome del database
        
        public $conn;   //Connesione al database                                                         

        /**
        * Costruttore per la classe UserDbInterface.
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
        * Metodo che restituisce un user che corrisponde all'id passato come parametro
        * @param $id
        * @return $user
        */
        public function readById($id){
            $sql = 'SELECT * FROM wp_users WHERE ID='.$id;
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){ 
                while($row =$result->fetch_assoc()) {
                    $user = new Users($row['ID'], $row['user_login'], $row['user_pass'],
                                        $row['user_nicename'], $row['user_email'], $row['user_url'],
                                        $row['user_registered'],$row['user_activation_key'],$row['user_status'],$row['display_name']);
                }
            } 
            return $user;
        }
	 
    }
?>