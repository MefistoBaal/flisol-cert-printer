<?php
/**
 * Modelo para base de datos
 */
require 'configuracion_local.php';
class ConexionFlisolCert extends Config
{
    protected $con;
    protected $host = self::DB_HOST;
    protected $user = self::DB_USERNAME;
    protected $pass = self::DB_PASS;
    protected $db_  = self::DB_DATABASE;
    protected $opt  = self::DB_OPT;
    protected $char = self::DB_CHAR;

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->db_", $this->user, $this->pass, $this->opt);
            $this->con->exec($this->char);
        } catch (\Excepion $e) {
            die('ERROR_MODELO: ' . $e->getMessage());
        }
    }

    public function ConectFlisol($sql)
    {
        try {
            $resp = $this->con->prepare($sql);

            return array($resp, $this->con);
        } catch (\Exception $e) {
            die('ERROR_CONECT: ' . $e->getMessage());
        }
    }
}
