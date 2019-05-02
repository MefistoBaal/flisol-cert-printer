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

    private function consultar_usuario($id_user)
    {
        try {
            $sql_user  = 'SELECT * FROM usuarios_asist WHERE idusuarios_asist= :id_usuario';
            $resp_user = $this->con->ConectFlisol($sql_user);
            $resp_user[0]->bindValue(':id_usuario', $id_user, PDO::PARAM_INT);

            return ($resp_user[0]->execute()) ? $resp_user[0]->fetch(PDO::FETCH_ASSOC) : $resp_user[0]->errorInfo()[2];
        } catch (\Throwable $th) {
            die('ERROR_USUARIO: ' . $th->getMessage());
        }
    }

    private function verificar_cert($data)
    {
        try {
            $sql_val  = 'SELECT COUNT(*) AS val, idusuarios_asist FROM pdf_validacion WHERE Codigo= :codigo';
            $resp_val = $this->con->ConectFlisol($sql_val);
            $resp_val[0]->bindValue(':codigo', htmlentities(addslashes($data['cod_busq'])), PDO::PARAM_STR);

            if ($resp_val[0]->execute()) {
                $val_cod = $resp_val[0]->fetch(PDO::FETCH_ASSOC);
                if ($val_cod['val'] > 0) {
                    $data_user_validado = $this->consultar_usuario($val_cod['idusuarios_asist']);
                    $this->__salida(array(
                        'resp'      => 1,
                        'Nombres'   => $data_user_validado['Nombres'] . ' ' . $data_user_validado['Apellidos'],
                        'Documento' => $data_user_validado['Tipo_Documento'] . ' No. ' . $data_user_validado['Documento'],
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
