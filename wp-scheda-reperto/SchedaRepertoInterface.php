<?php
    include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/schedaReperto.php';
	
    /**
     * Interfaccia per la comunicazione al database con
     * la tabella museo
     */
    class SchedaRepertoInterface{	
		const SERVER_NAME = "localhost";            //Host del database
        const USER_NAME = "id3511799_angelo";      //Username del database
        const PASSWORD = "ingegneria2017";        //Password del database
        const DB_NAME = "id3511799_wordpress";   //Nome del database
        
        public $conn;   //Connesione al database

        /**
         * Costruttore 
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
         *Metodo che inserisce una scheda reperto nel db
         *@param [type] $scheda 
         */   
		public function create($scheda){
			$sql = 'INSERT INTO wp_scheda_reperto(nome,tipo,materiale,autore,periodo,valore,descrizioneShort,descrizioneEstesa,dataCreazione,operatoreMuseale,museo)'.
                     ' VALUES("'.$scheda->getNome().'","'.$scheda->getTipo().'","'.$scheda->getMateriale().'","'.$scheda->getAutore().'","'.$scheda->getPeriodo().'","'.$scheda->getValore().'","'.$scheda->getDescrizioneShort().'","'.$scheda->getDescrizioneEstesa().'",CURDATE(),"'.$scheda->getOperatoreMuseale().'","'.$scheda->getMuseo().'")';
        
            $this->conn->query($sql);
        }
        /**
         * Metodo che restiruisce le schede reperto dal db
         * @return array
         */
        public function read(){
            $sql = 'SELECT * FROM wp_scheda_reperto';
            $result = $this->conn->query($sql);
            $schede = array();
            $i = 0;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $schedaReperto = new SchedaReperto($row['id_scheda_reperto'],$row['nome'],$row['tipo'],$row['materiale'],$row['autore'],
                    $row['periodo'],$row['valore'], $row['descrizioneShort'],$row['descrizioneEstesa'], 
                    $row['dataCreazione'],$row['operatoreMuseale'],$row['museo'], $row['pubblica'], $row['qr'] );
                    $schede[$i] = $schedaReperto;
                    $i++;

                }
            }
            return $schede;
        }
        
		/**
         * Metodo che restituisce la scheda con id del museo passato come parametro
         * @param [type] $id
         * @return scheda reperto
         */
		public function readByMuseo($id_museo){			
			$sql = 'SELECT * FROM wp_scheda_reperto WHERE museo = '.$id_museo;
            $result = $this->conn->query($sql);
			$schedeReperto = array();
            $i = 0;
			if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $schedaReperto = new SchedaReperto($row['id_scheda_reperto'],$row['nome'],$row['tipo'],$row['materiale'],$row['autore'],
                                     $row['periodo'],$row['valore'], $row['descrizioneShort'],$row['descrizioneEstesa'], 
                                     $row['dataCreazione'],$row['operatoreMuseale'],$row['museo'], $row['pubblica'], $row['qr'] );
                    $schedeReperto[$i] = $schedaReperto;
                    $i++;
                }
            } 
            return $schedeReperto;
        }
		/**
         * Restituisce la scheda reperto con id passato come parametro
         * @param[type] $id
         * @return schedaReperto
         */
		public function readById($id){	
            $sql = 'SELECT * FROM wp_scheda_reperto WHERE id_scheda_reperto='.$id;
            $result = $this->conn->query($sql);
			if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $schedaReperto = new SchedaReperto($row['id_scheda_reperto'],$row['nome'],$row['tipo'],$row['materiale'],$row['autore'],
                                     $row['periodo'],$row['valore'], $row['descrizioneShort'],$row['descrizioneEstesa'], 
                                     $row['dataCreazione'],$row['operatoreMuseale'],$row['museo'], $row['pubblica'], $row['qr'] );
                }
            } 

            return $schedaReperto;
        }
        /**
         * Restituisce la scheda reperto pubblica con id passato come parametro
         * @param[type] $id
         * @return schedaReperto
         */
		public function consultazione($id){	
            $sql = 'SELECT * FROM wp_scheda_reperto WHERE id_scheda_reperto='.$id.'AND pubblica=1';
            $result = $this->conn->query($sql);
			if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $schedaReperto = new SchedaReperto($row['id_scheda_reperto'],$row['nome'],$row['tipo'],$row['materiale'],$row['autore'],
                                     $row['periodo'],$row['valore'], $row['descrizioneShort'],$row['descrizioneEstesa'], 
                                     $row['dataCreazione'],$row['operatoreMuseale'],$row['museo'], $row['pubblica'], $row['qr'] );
                }
            } 

            return $schedaReperto;
        }
		/**
         * Restituisce la scheda reperto col nome passato come parametro
         * @param [type] $name
         * @return scheda reperto
         */
		public function readByName($name) {
            $sql = 'SELECT * FROM wp_scheda_reperto WHERE nome='.'"'.$name.'"';
			$result= $this->conn->query($sql);
			if ($result->num_rows > 0){
                while($row =$result->fetch_assoc()){
                    $schedaReperto = new SchedaReperto($row['id_scheda_reperto'],$row['nome'],$row['tipo'],$row['materiale'],$row['autore'],
                                    $row['periodo'],$row['valore'], $row['descrizioneShort'],$row['descrizioneEstesa'], 
                                    $row['dataCreazione'],$row['operatoreMuseale'],$row['museo'], $row['pubblica'], $row['qr'] );
                }
            } 
            return $schedaReperto;
        }
		
		/**
         * Aggiorna la scheda reperto passata come parametro
         * @param [type] $scheda
         * @return boolean
         */
		 public function update($scheda){
            $sql = 'UPDATE wp_scheda_reperto SET id_scheda_reperto='.$scheda->getId().
                     ', nome="'.$scheda->getNome().
                     '", tipo="'.$scheda->getTipo().
                     '", materiale="'.$scheda->getMateriale().
                     '", autore="'.$scheda->getAutore().
                     '", periodo="'.$scheda->getPeriodo().
                     '", valore="'.$scheda->getValore().
                     '", descrizioneShort="'.$scheda->getDescrizioneShort().
                     '", descrizioneEstesa="'.$scheda->getDescrizioneEstesa().
                     '", operatoreMuseale="'.$scheda->getOperatoreMuseale().
					 '", pubblica="'.$scheda->getPubblica().
					 '", qr="'.$scheda->getQr().
                     '" WHERE id_scheda_reperto ='.$scheda->getId();
                   
            if($this->conn->query($sql) === true)
                return true;
            else
                return false;
        }

        public function updateSenzaQr($scheda){
            $sql = 'UPDATE wp_scheda_reperto SET id_scheda_reperto='.$scheda->getId().
                     ', nome="'.$scheda->getNome().
                     '", tipo="'.$scheda->getTipo().
                     '", materiale="'.$scheda->getMateriale().
                     '", autore="'.$scheda->getAutore().
                     '", periodo="'.$scheda->getPeriodo().
                     '", valore="'.$scheda->getValore().
                     '", descrizioneShort="'.$scheda->getDescrizioneShort().
                     '", descrizioneEstesa="'.$scheda->getDescrizioneEstesa().
                     '", operatoreMuseale="'.$scheda->getOperatoreMuseale().
					 '", pubblica="'.$scheda->getPubblica().
					 '"WHERE id_scheda_reperto ='.$scheda->getId();
                   
            if($this->conn->query($sql) === true)
                return true;
            else
                return false;
        }

        
        /**
         * Inverte il flag al campo di pubblica, della scheda passata come parametro e dell'operatore
         * @param [type] $scheda
         * @param [type] $id_operatore
         */
		public function pubblica($scheda,$id_operatore){
            $sql = 'UPDATE wp_scheda_reperto SET pubblica="'.!($scheda->getPubblica()).
					'", operatoreMuseale="'.$id_operatore.
			        '" WHERE id_scheda_reperto ='.$scheda->getId();
			$this->conn->query($sql);
        }
        
        /**
         * Elimina la scheda reperto con id passato come parametro
         * @param [type] $id
         * @return boolean
         */
		public function delete($id){
            $sql = 'DELETE FROM wp_scheda_reperto WHERE id_scheda_reperto='.$id;
            if($this->conn->query($sql))
                return true;
            else
                return false;
        }
		
		 /**
         * Metodo che restituisce il nome delle colonne della tabella
         * @return array
         */
        public function getColumnName(){
            $sql = 'SELECT * FROM wp_scheda_reperto';
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
         */
		public function visualizzazione($id_museo,$id_operatore_corrente){
			$nameColumn = $this->getColumnName();
            $tuple = $this->readByMuseo($id_museo);
            foreach($nameColumn as $nome){
                $x = ' <td> '. $nome . ' </td> ';
                echo $x;
            }
        $y =  '<td></td><td></td><td></td>';
        echo $y;
            foreach($tuple as $ris){
                $str ='<tr> <td> '.$ris->getId(). ' </td> '.
                    '<td> '.$ris->getNome(). '</td>'.
                    '<td> '.$ris->getTipo(). '</td>'.
                    '<td> '.$ris->getMateriale(). '</td>'.
                    '<td> '.$ris->getAutore(). '</td>'.
                    '<td> '.$ris->getPeriodo(). '</td>'.
                    '<td> '.$ris->getValore(). '</td>'.
                    '<td> '.$ris->getDescrizioneShort(). '</td>'.
                    '<td> '.$ris->getDescrizioneEstesa(). '</td>'.
                    '<td> '.$ris->getDataCreazione(). '</td>'.
                    '<td> '.$ris->getOperatoreMuseale(). '</td>'.
                    '<td> '.$ris->getMuseo(). '</td>'.
                    '<td> '.$ris->getPubblica(). '</td>'.
                    '<td> '.$ris->getQr(). '</td>'.
                    '<td><a href ="' . plugins_url( 'wp-scheda-reperto/elimina_scheda_db.php?id='.htmlspecialchars($ris->getId()), _FILE_ ) .'" 
                    onClick="return confirm(\'Sicuro di voler cancellare?\');">Elimina</a> </td>'.
                    '<td><a href ="' . plugins_url( 'wp-scheda-reperto/modifica_scheda.php?id='.htmlspecialchars($ris->getId()).'&operatore='.$id_operatore_corrente, _FILE_ ) .'">Modifica</a> </td>'.
                    '<td><a href ="' . plugins_url( 'wp-scheda-reperto/pubblica_scheda_db.php?id='.htmlspecialchars($ris->getId()).'&operatore='.$id_operatore_corrente, _FILE_ ) .'">Pubblica</a> </td>
					</td></tr>';
                    echo $str;
            };
        }    
    }
?>