<?php
/**
 * Classe SchedaRepero
 */
class SchedaReperto {
 
    private $id_scheda_reperto;
    private $nome;
    private $tipo;
    private $materiale;
    private $autore;
    private $periodo;
    private $valore;
    private $descrizioneShort;
    private $descrizioneEstesa;
    private $datacreazione;
    private $operatoreMuseale;
    private $museo;
    private $pubblica;
    private $qr;
         
    /**
     * Costruttore parametrizzato
     * 
     * @param [type] $id_scheda_reperto
     * @param [type] $nome
     * @param [type] $tipo
     * @param [type] $materiale
     * @param [type] $autore
     * @param [type] $periodo
     * @param [type] $valore
     * @param [type] $descrizioneShort
     * @param [type] $descrizioneEstesa
     * @param [type] datacreazione
     * @param [type] $operatoreMuseale
     * @param [type] $museo
     * @param [type] $pubblica
     * @param [type] qr
     */
    public function __construct($id_scheda_reperto,$nome,$tipo,$materiale,$autore,$periodo,$valore, $descrizioneShort, $descrizioneEstesa, $datacreazione, $operatoreMuseale, $museo, $pubblica, $qr) {
		$this->id_scheda_reperto = $id_scheda_reperto;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->materiale = $materiale;
        $this->autore = $autore;
        $this->periodo = $periodo;
        $this->valore = $valore;
        $this->descrizioneShort = $descrizioneShort;
        $this->descrizioneEstesa = $descrizioneEstesa;
        $this->datacreazione = $datacreazione;
        $this->operatoreMuseale = $operatoreMuseale;
        $this->museo = $museo;
        $this->pubblica = $pubblica;
        $this->qr = $qr;
    }
         
    /**
     * Restituisce l'id
     * @return id
     */
    public function getId(){
        return $this->id_scheda_reperto;
    }
    /**
     * Restituisce il nome
     * @return nome
     */
    public function getNome(){
        return $this->nome;
    }
    /**
     * Restituisce il tipo
     * @return tipo
     */
    public function getTipo(){
        return $this->tipo;
    }
    /**
     * Restituisce il materiale
     * @return materiale
     */
    public function getMateriale(){
        return $this->materiale;
    }
    /**
     * Restituisce l'autore
     * @return autore
     */
    public function getAutore(){
        return $this->autore;
    }
    /**
     * Restituisce il periodo
     * @return periodo
     */
    public function getPeriodo(){
        return $this->periodo;
    }
    /**
     * Restituisce il valore
     * @return valore
     */
    public function getValore(){
        return $this->valore;
    }
    /**
     * Restituisce la descrizione short
     * @return descrizioneShort
     */
    public function getDescrizioneShort(){
        return $this->descrizioneShort;
    }
    /**
     * Restituisce la descrizione estesa
     * @return descrizioneEstesa
     */
    public function getDescrizioneEstesa(){
        return $this->descrizioneEstesa;
    }
    /**
     * Restituisce la data di creazione
     * @return dataCreazione
     */
    public function getDataCreazione(){
        return $this->datacreazione;
    }
    /**
     * Restituisce l'operatore museale
     * @return operatoreMuseale
     */
    public function getOperatoreMuseale(){
        return $this->operatoreMuseale;
    }
    /**
     * Restituisce il museo
     * @return museo
     */
    public function getMuseo(){
        return $this->museo;
    }
    /**
     * Restituisce il flag per sapere se pubblica o no
     * @return bool
     */
    public function getPubblica(){
        return $this->pubblica;
    }
    /**
     * Restituisce il link del qr 
     * @return qr
     */
    public function getQr(){
        return $this->qr;
    }
    /**
     * Setta l'id
     * @param [type] $id
     */
    public function setId($id){
        $this->id_scheda_reperto=$id;
    }
    /**
     * Setta il  nome
     * @param [type] $nome
     */
    public function setNome($nome){
        $this->nome=$nome;
    }
    /**
     * Setta il tipo
     * @param [type] $tipo
     */
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    /**
     * Setta il materiale
     * @param [type] $materiale
     */
    public function setMateriale($materiale){
        $this->materiale = $materiale;
    }
    /**
     * Setta l'autore
     * @param [type] $autore
     */
    public function setAutore($autore){
        $this->autore = $autore;
    }
    /**
     * Setta il periodo
     * @param [type] $periodo
     */
    public function setValore($valore){
        $this->valore = $valore;
    }
    /**
     * Setta la descrizione short
     * @param [type] $descrizioneShort
     */
    public function setDescrizioneShort($descrizioneShort){
        $this->descrizioneShort=$descrizioneShort;
    }
    /**
     * Setta la descrizione estesa
     * @param [type] $descrizioneEstesa
     */
    public function setDescrizioneEstesa($descrizioneEstesa){
        $this->descrizioneEstesa = $descrizioneEstesa;
    }
    /**
     * Setta la data di creazione
     * @param [type] $dataCreazione
     */
    public function setDataCreazione($datacreazione){
        $this->datacreazione=$datacreazione;
    }
    /**
     * Setta l'operatore museale
     * @param [type] $operatoreMuseale
     */
    public function setOperatoreMuseale($operatoreMuseale){
        $this->operatoreMuseale=$operatoreMuseale;
    }
    /**
     * setta il museo
     * @param [type] $msueo
     */
    public function setMuseo($museo){
        $this->museo=$museo;
    }
    /**
     * Setta il flag
     * @param [type] $pubblica
     */
    public function setPubblica($pubblica){
        $this->pubblica=$pubblica;
    }
    /**
     * Setta il qr
     * @param [type] $qr
     */
    public function setQR($qr){
        $this->qr=$qr;
    }
}
?>