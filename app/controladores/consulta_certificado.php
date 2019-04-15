<?php
/**
 * Consulta de certificados en vista principal
 */
include_once __DIR__ . '/../kernel/autoload.php';
class Consulta_Certificados
{
    protected $con;

    public function __construct($data)
    {
        try {
            $this->con = new ConexionFlisolCert();
            $this->consultar_certificado($data);
        } catch (\Exception $e) {
            die('ERROR_CONSTRUCT: ' . $e->getMessage());
        }
    }

    /**Funcion salida solo recive com argumentosm arreglos */
    private function __salida($texto_respuesta)
    {
        try {
            echo json_encode($texto_respuesta);
        } catch (\Exception $e) {
            die('ERROR_SALIDA: ' . $e->getMessage());
        }
    }

    private function consulta_rol($id_rol)
    {
        try {
            $sql_rol  = 'SELECT Nombre_Rol FROM roles WHERE idroles = :idrol';
            $resp_rol = $this->con->ConectFlisol($sql_rol);
            $resp_rol[0]->bindValue(':idrol', $id_rol, PDO::PARAM_INT);

            return ($resp_rol[0]->execute()) ? $resp_rol[0]->fetch(PDO::FETCH_OBJ)->Nombre_Rol : $resp_rol[0]->errorInfo()[2];
        } catch (\Exception $e) {
            die('ERROR_ROL: ' . $e->getMessage());
        }
    }

    private function consultar_certificado($data_busqueda)
    {
        try {
            /**Consulta por documento */
            $sql_consulta_doc = 'SELECT * FROM usuarios_asist WHERE Documento = :documento';
            /**Consulta por correo electronico */
            $sql_consulta_mail = 'SELECT * FROM usuarios_asist WHERE Correo = :email';

            $resp_consulta_doc   = $this->con->ConectFlisol($sql_consulta_doc);
            $resp_consulta_email = $this->con->ConectFlisol($sql_consulta_mail);

            $resp_consulta_doc[0]->bindValue(':documento', $data_busqueda['doc_busq'], PDO::PARAM_STR);
            $resp_consulta_email[0]->bindValue(':email', $data_busqueda['doc_busq'], PDO::PARAM_STR);
            if ($resp_consulta_doc[0]->execute()) {
                $consulta_doc = $resp_consulta_doc[0]->fetchAll();
                if (count($consulta_doc) > 0) {
                    $this->__salida(array(
                        'resp'      => 1,
                        'nombres'   => $consulta_doc[0]['Nombres'],
                        'apellidos' => $consulta_doc[0]['Apellidos'],
                        'correo'    => $consulta_doc[0]['Correo'],
                        'documento' => $consulta_doc[0]['Documento'],
                        'rol'       => $this->consulta_rol($consulta_doc[0]['idrol']),
                    ));
                } elseif ($resp_consulta_email[0]->execute()) {
                    $consulta_email = $resp_consulta_email[0]->fetchAll();
                    if (count($consulta_email) > 0) {
                        $this->__salida(array(
                            'resp'      => 1,
                            'nombres'   => $consulta_email[0]['Nombres'],
                            'apellidos' => $consulta_email[0]['Apellidos'],
                            'correo'    => $consulta_email[0]['Correo'],
                            'documento' => $consulta_email[0]['Documento'],
                            'rol'       => $this->consulta_rol($consulta_email[0]['idrol']),
                        ));
                    } else {
                        $this->__salida(array(
                            'resp' => 2,
                            'info' => 'No se encontró ningun certificado',
                        ));
                    }
                } else {
                    $this->__salida(array(
                        'resp' => 0,
                        'info' => $resp_consulta_email[0]->errorInfo()[2],
                    ));
                }
            } else {
                $this->__salida(array(
                    'resp' => 0,
                    'info' => $resp_consulta_doc[0]->errorInfo()[2],
                ));
            }
        } catch (\Exception $e) {
            die('ERROR_CONSULTA: ' . $e->getMessage());
        }
    }
}
($_SERVER['REQUEST_METHOD'] === 'POST') ? new Consulta_Certificados($_POST) : null;
