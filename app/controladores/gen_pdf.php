<?php
/**
 * Generador de pdfs
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/app/kernel/autoload.php';

use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

class Generar_PDF
{
    protected $con;
    private $html2pdf;
    private $info_pdf;
    private $error_info;
    private $id_decode;
    private $data_user;

    public function __construct()
    {
        try {
            $this->html2pdf = new Html2Pdf('L', 'letter', 'es');
            $this->con      = new ConexionFlisolCert();
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
            die('ERROR_SALIDA: ' . $e->getMessage());
        }
    }

    public function generar_pdf($hash_get)
    {
        try {
            $this->consulta_data($hash_get);
        } catch (\Exception $e) {
            die('ERROR_GEN_PDF: ' . $e->getMessage());
        }
    }

    private function decode_hash($hash)
    {
        try {
            if ($decode_hash = hex2bin($hash)) {
                if ($id_decode = gzdecode($decode_hash)) {
                    $this->id_decode = $id_decode;
                    return true;
                } else {
                    $this->error_info = 'Hash Invalido';
                    return false;
                }
            } else {
                $this->error_info = 'Hash Invalido';
                return false;
            }

        } catch (\Exception $e) {
            die('ERROR_DECODE: ' . $e->getMessage());
        }
    }

    private function consulta_data($hash)
    {
        try {
            if ($this->decode_hash($hash) === true) {
                $sql_datos_user  = 'SELECT * FROM usuarios_asist AS usuarios INNER JOIN roles AS roles ON usuarios.idrol = roles.idroles WHERE idusuarios_asist= :iduser_decode';
                $resp_datos_user = $this->con->ConectFlisol($sql_datos_user);
                $resp_datos_user[0]->bindValue(':iduser_decode', $this->id_decode, PDO::PARAM_INT);
                if ($resp_datos_user[0]->execute()) {
                    $this->data_user = $resp_datos_user[0]->fetchAll();
                    $this->__construct_pdf('cert_flisol');
                } else {
                    $this->__salida(array(
                        'resp' => 0,
                        'info' => $resp_datos_user[0]->errorInfo()[2],
                    ));
                }
            } else {
                $this->__salida(array(
                    'resp' => 0,
                    'info' => $this->error_info,
                ));
            }
        } catch (\Exception $e) {
            die('ERROR_CONSULTA_DATA: ' . $e->getMessage());
        }
    }

    private function __construct_pdf($n_pdf)
    {
        try {
            ob_start();

            Generar_Estadistica::contar_certificado_gen();

            include dirname(__FILE__) . '/gen_pdf_plantilla.php';

            $content = ob_get_clean();

            $this->html2pdf->pdf->SetDisplayMode('fullpage');
            $this->html2pdf->writeHTML($content);
            $this->html2pdf->output($n_pdf . '.pdf');
        } catch (\Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
    }
}
