<?php
/**
 * Generador de estadisticas
 */
require_once 'autoload.php';

final class Generar_Estadistica
{
    public static function contar_consulta()
    {
        try {
            $con           = new ConexionFlisolCert();
            $sql_consulta  = 'SELECT Cantidad FROM consultas_gen WHERE idconsultas_gen = 1';
            $resp_consulta = $con->ConectFlisol($sql_consulta);

            if ($resp_consulta[0]->execute()) {
                $sql_nueva_consulta  = 'UPDATE consultas_gen SET Cantidad= :n_cantidad WHERE idconsultas_gen= 1';
                $resp_nueva_consulta = $con->ConectFlisol($sql_nueva_consulta);
                $resp_nueva_consulta[0]->bindValue(':n_cantidad', $resp_consulta[0]->fetch(PDO::FETCH_ASSOC)['Cantidad'] + 1, PDO::PARAM_INT);

                return ($resp_nueva_consulta[0]->execute()) ? true : false;

            } else {
                exit;
            }
        } catch (\Exception $e) {
            die('ERROR_CONTAR_CONSULTA: ' . $e->getMesage());
        } finally {
            $con = null;
        }
    }

    public static function contar_certificado_gen()
    {
        try {
            $con           = new ConexionFlisolCert();
            $sql_consulta  = 'SELECT Cantidad FROM certs_gen WHERE idcerts_gen= 1';
            $resp_consulta = $con->ConectFlisol($sql_consulta);

            if ($resp_consulta[0]->execute()) {
                $sql_nueva_consulta  = 'UPDATE certs_gen SET Cantidad= :n_cantidad WHERE idcerts_gen= 1';
                $resp_nueva_consulta = $con->ConectFlisol($sql_nueva_consulta);
                $resp_nueva_consulta[0]->bindValue(':n_cantidad', $resp_consulta[0]->fetch(PDO::FETCH_ASSOC)['Cantidad'] + 1, PDO::PARAM_INT);

                return ($resp_nueva_consulta[0]->execute()) ? true : false;

            } else {
                exit;
            }
        } catch (\Exception $e) {
            die('ERROR_CONTAR_CONSULTA: ' . $e->getMesage());
        } finally {
            $con = null;
        }
    }

    public static function contar_certificado_env()
    {
        try {
            $con           = new ConexionFlisolCert();
            $sql_consulta  = 'SELECT Cantidad FROM certs_env WHERE idcerts_env= 1';
            $resp_consulta = $con->ConectFlisol($sql_consulta);

            if ($resp_consulta[0]->execute()) {
                $sql_nueva_consulta  = 'UPDATE certs_env SET Cantidad= :n_cantidad WHERE idcerts_env= 1';
                $resp_nueva_consulta = $con->ConectFlisol($sql_nueva_consulta);
                $resp_nueva_consulta[0]->bindValue(':n_cantidad', $resp_consulta[0]->fetch(PDO::FETCH_ASSOC)['Cantidad'] + 1, PDO::PARAM_INT);

                return ($resp_nueva_consulta[0]->execute()) ? true : false;

            } else {
                exit;
            }
        } catch (\Exception $e) {
            die('ERROR_CONTAR_CONSULTA: ' . $e->getMesage());
        } finally {
            $con = null;
        }
    }
}
