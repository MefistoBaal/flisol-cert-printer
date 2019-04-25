<?php
/**
 * Estadisticas del dash
 */
include_once __DIR__ . '/../kernel/autoload.php';
class Dash
{
    protected $con;

    public function __construct($data)
    {
        try {
            $this->con = new ConexionFlisolCert();
            switch ($data['pet']) {
                case 'stats':
                    $this->gen_stats();
                    break;
                case 'users':
                    $this->gen_reg_users();
                    break;
                default:
                    # code...
                    break;
            }
        } catch (\Exception $e) {
            die('ERROR_CONSTRUCT: ' . $e->getMessage());
        }
    }

    private function __salida($data_salida = array())
    {
        try {
            echo json_encode($data_salida);
            exit;
        } catch (\Exception $e) {
            die('SALIDA: ' . $e->getMessage());
        }
    }

    private function consulta_asistentes()
    {
        try {
            $sql_asis  = 'SELECT COUNT(*) AS Cantidad FROM usuarios_asist';
            $resp_asis = $this->con->ConectFlisol($sql_asis);

            return ($resp_asis[0]->execute())
            ? $resp_asis[0]->fetch(PDO::FETCH_ASSOC)['Cantidad']
            : $resp_asis[0]->errorInfo()[2];

        } catch (\Exception $e) {
            die('ERROR_ASIST: ' . $e->getMessage());
        }
    }

    private function certs_generados()
    {
        try {
            $sql_gen_certs  = 'SELECT Cantidad FROM certs_gen WHERE idcerts_gen = 1';
            $resp_gen_certs = $this->con->ConectFlisol($sql_gen_certs);

            return ($resp_gen_certs[0]->execute())
            ? $resp_gen_certs[0]->fetch(PDO::FETCH_ASSOC)['Cantidad']
            : $resp_gen_certs[0]->errorInfo()[2];

        } catch (\Exception $e) {
            die('ERROR_GEN_CERT: ' . $e->getMessage());
        }
    }

    private function certs_enviados()
    {
        try {
            $sql_env_certs  = 'SELECT Cantidad FROM certs_env WHERE idcerts_env = 1';
            $resp_env_certs = $this->con->ConectFlisol($sql_env_certs);

            return ($resp_env_certs[0]->execute())
            ? $resp_env_certs[0]->fetch(PDO::FETCH_ASSOC)['Cantidad']
            : $resp_env_certs[0]->errorInfo()[2];

        } catch (\Exception $e) {
            die('ERROR_CERT_ENV: ' . $e->getMessage());
        }
    }

    private function consultas_gen()
    {
        try {
            $sql_gen_consul  = 'SELECT Cantidad FROM consultas_gen WHERE idconsultas_gen = 1';
            $resp_gen_consul = $this->con->ConectFlisol($sql_gen_consul);

            return ($resp_gen_consul[0]->execute())
            ? $resp_gen_consul[0]->fetch(PDO::FETCH_ASSOC)['Cantidad']
            : $resp_gen_consul[0]->errorInfo()[2];

        } catch (\Exception $e) {
            die('ERROR_GEN_CONSUL: ' . $e->getMessage());
        }
    }

    private function gen_stats()
    {
        try {
            $this->__salida(array(
                'resp'       => 1,
                'asistentes' => $this->consulta_asistentes(),
                'certs_gen'  => $this->certs_generados(),
                'certs_env'  => $this->certs_enviados(),
                'consul_gen' => $this->consultas_gen(),
            ));
        } catch (\Exception $e) {
            die('ERROR_GEN_STATS: ' . $e->getMessage());
        }
    }

    private function gen_reg_users()
    {
        try {
            $sql_reg_users  = 'SELECT * FROM usuarios_asist LIMIT 10';
            $resp_reg_users = $this->con->ConectFlisol($sql_reg_users);

            $info_return = ($resp_reg_users[0]->execute())
            ? array(
                'resp'  => 1,
                'users' => $resp_reg_users[0]->fetchAll(),
            )
            : array(
                'resp' => 0,
                'info' => $resp_reg_users[0]->errorInfo()[2],
            );

            $this->__salida($info_return);
        } catch (\Exception $e) {
            die('ERROR_GEN_REG_USERS: ' . $e->getmessage());
        }
    }
}
($_SERVER['REQUEST_METHOD'] === 'POST') ? new Dash($_POST) : null;
