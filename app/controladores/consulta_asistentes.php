<?php
/**
 * Consulta de asistentes
 */
include_once __DIR__ . '/../kernel/autoload.php';
class Consulta_Asistentes
{
    protected $con;

    public function __construct($data)
    {
        try {
            $this->con = new ConexionFlisolCert();
            switch ($data['pet']) {
                case 'asistentes':
                    $this->consulta_asistentes();
                    break;

                default:
                    # code...
                    break;
            }
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    private function __salida($data_salida = array())
    {
        try {
            echo json_encode($data_salida);
            exit;
        } catch (\Exception $e) {
            die('ERROR_SALIDA: ' . $e->getMessage());
        }
    }

    private function consulta_asistentes()
    {
        try {
            $sql_asistentes  = 'SELECT * FROM usuarios_asist';
            $resp_asistentes = $this->con->ConectFlisol($sql_asistentes);

            $data = ($resp_asistentes[0]->execute())
            ? array(
                'resp'  => 1,
                'asist' => $resp_asistentes[0]->fetchAll(),
            )
            : array(
                'resp' => 0,
                'info' => $resp_asistentes[0]->errorInfo()[2],
            );
            /**Salida de datos */
            $this->__salida($data);

        } catch (\Exception $e) {
            die('ERROR_CONSULTA: ' . $e->getMessage());
        }
    }
}
($_SERVER['REQUEST_METHOD'] === 'POST') ? new Consulta_Asistentes($_POST) : null;
