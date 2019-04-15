<?php
/**
 * Controlador para inicios de sesion
 */
include_once __DIR__ . '/../kernel/autoload.php';
include_once __DIR__ . '/../kernel/sesion.php';
class Login
{
    protected $con;

    public function __construct($data_sesion)
    {
        try {
            $this->con = new ConexionFlisolCert();
            $this->login_validate($_POST);
        } catch (\Exception $e) {
            die('ERROR_CONSTRUCT: ' . $e->getMessage());
        }
    }

    private function __salida($text_salida)
    {
        try {
            echo json_encode($text_salida);
        } catch (\Exception $e) {
            die('ERROR_SALIDA: ' . $e->getMessage());
        }
    }

    private function login_validate($data_log)
    {
        try {
            $sql_data  = 'SELECT * FROM usuarios_adm WHERE Email= :correo';
            $resp_data = $this->con->ConectFlisol($sql_data);
            $resp_data[0]->bindValue(':correo', htmlentities(addslashes($data_log['email'])), PDO::PARAM_STR);
            if ($resp_data[0]->execute()) {
                if ($resp_data[0]->rowCount() > 0) {
                    $data_usuario = $resp_data[0]->fetch(PDO::FETCH_ASSOC);
                    if (password_verify($data_log['password'], $data_usuario['Contrasena'])) {
                        (new Inicio_Sesion($data_usuario)) ? $this->__salida(array('resp' => 1)) : $this->__salida(array('resp' => 0, 'info' => 'No se ha podido crear la sesion.'));
                    } else {
                        $this->__salida(array(
                            'resp' => 2,
                            'info' => 'Contraseña incorrecta.',
                        ));
                    }
                } else {
                    //Usuario inexistente
                    $this->__salida(array(
                        'resp' => 2,
                        'info' => 'Usuario o contrseña incorrecta.',
                    ));
                }
            } else {
                $this->__salida(array(
                    'resp' => 0,
                    'info' => $resp_data[0]->errorInfo()[2],
                ));
            }

        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
($_SERVER['REQUEST_METHOD'] === 'POST') ? new Login($_POST) : null;
