<?php
/**
 * Validacion de certificados
 */

include_once __DIR__ . '/../kernel/autoload.php';

class Verificar_Certificado
{
    protected $con;

    public function __construct($data)
    {
        try {
            $this->con = new ConexionFlisolCert();
            $this->verificar_cert($data);
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    private function __salida($data_salida = array())
    {
        try {
            echo json_encode($data_salida);
        } catch (\Eception $e) {
            die('ERROR_SALIDA: ' . $e->getMessage());
        }
    }

    private function verificar_cert($data)
    {
        try {
            $sql_val  = 'SELECT COUNT(*) AS val FROM pdf_validacion WHERE Codigo= :codigo';
            $resp_val = $this->con->ConectFlisol($sql_val);
            $resp_val[0]->bindValue(':codigo', htmlentities(addslashes($data['cod_busq'])), PDO::PARAM_STR);

            if ($resp_val[0]->execute()) {
                if ($resp_val[0]->fetch(PDO::FETCH_ASSOC)['val'] > 0) {
                    $this->__salida(array(
                        'resp' => 1,
                    ));
                } else {
                    $this->__salida(array(
                        'resp' => 0,
                        'info' => 'No valido',
                    ));
                }
            } else {
                $this->__salida(array(
                    'resp' => 0,
                    'info' => $resp_val[0]->errorInfo()[2],
                ));
            }

        } catch (\Exception $e) {
            die('ERROR_VAL: ' . $e->getMessage());
        }
    }
}
($_SERVER['REQUEST_METHOD'] === 'POST') ? new Verificar_Certificado($_POST) : null;
