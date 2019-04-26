<?php
/**
 * Generador de pdfs
 */

include_once __DIR__ . '/../kernel/autoload.php';

class Generar_certificado
{
    private $html2pdf;
    private $info_pdf;

    public function __construct()
    {
        try {
            $this->html2pdf = new Html2Pdf('P', 'letter', 'es');
        } catch (\Exception $e) {
            die('ERROR_CONSTRUCT: ' . $e->getMessage());
        }
    }

    private function __construct_pdf($n_pdf)
    {
        try {
            ob_start();
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
