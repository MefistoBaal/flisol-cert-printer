<?php
/**
 * Generar certificados desde el dash
 */
include_once __DIR__ . '/../kernel/autoload.php';
class Generar_Certificados
{
    protected $con;

    public function __construct($data)
    {
        try {
            $this->con = new ConexionFlisolCert();
            switch ($data['pet']) {
                case 'roles':
                    $this->consulta_roles();
                    break;
                case 'gen':
                    $this->reg_user($data);
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
        } catch (\Exception $e) {
            die('ERROR_SALIDA: ' . $e->getMessage());
        }
    }

    private function consulta_roles()
    {
        try {
            $sql_roles  = 'SELECT * FROM roles';
            $resp_roles = $this->con->ConectFlisol($sql_roles);
            $roles      = ($resp_roles[0]->execute())
            ? array(
                'resp'  => 1,
                'roles' => $resp_roles[0]->fetchAll(),
            )
            : array(
                'resp'  => 0,
                'error' => $resp_roles[0]->errorInfo()[2],
            );

            /**Impresion de respuesta */
            $this->__salida($roles);
        } catch (\Exception $e) {
            die('ERROR_CONSUL_CERT: ' . $e->getMessage());
        }
    }

    protected function gen_cert($id_user)
    {
        try {
            $this->__salida(array(
                'resp' => 1,
                'cert' => bin2hex(gzencode($id_user)),
            ));
        } catch (\Exception $e) {
            die('ERROR_GEN_CERT: ' . $e->getMessage());
        }
    }

    private function reg_user($info)
    {
        try {
            $sql_reg_user  = 'INSERT INTO usuarios_asist (Nombres, Apellidos, Tipo_Documento, Documento, Correo, Celular, idrol) VALUES (:nombres, :apellidos, :t_doc, :doc, :correo, :cel, :rol)';
            $resp_reg_user = $this->con->ConectFlisol($sql_reg_user);
            $resp_reg_user[0]->bindValue(':nombres', htmlentities(addslashes($info['nombres'])), PDO::PARAM_STR);
            $resp_reg_user[0]->bindValue(':apellidos', htmlentities(addslashes($info['apellidos'])), PDO::PARAM_STR);
            $resp_reg_user[0]->bindValue(':t_doc', htmlentities(addslashes($info['select_t_doc'])), PDO::PARAM_INT);
            $resp_reg_user[0]->bindValue(':doc', htmlentities(addslashes($info['n_doc'])), PDO::PARAM_INT);
            $resp_reg_user[0]->bindValue(':correo', htmlentities(addslashes($info['email'])), PDO::PARAM_STR);
            $resp_reg_user[0]->bindValue(':cel', htmlentities(addslashes($info['cel'])), PDO::PARAM_STR);
            $resp_reg_user[0]->bindValue(':rol', htmlentities(addslashes($info['select_rol'])), PDO::PARAM_INT);

            if ($resp_reg_user[0]->execute()) {
                $this->gen_cert($resp_reg_user[1]->lastInsertId());
            } else {
                $this->__salida(array(
                    'resp' => 0,
                    'info' => $resp_reg_user[0]->errorInfo()[2],
                ));
            }

        } catch (\Exception $e) {
            die('ERROR_REG_USER: ' . $e->getMessage());
        }
    }
}
($_SERVER['REQUEST_METHOD'] === 'POST') ? new Generar_Certificados($_POST) : null;
