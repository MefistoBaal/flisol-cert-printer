<?php
/**
 * FLISoL
 *
 * Sistema para impresion de certificados de FLISoL 2019
 *
 * @author Santiago Hurtado
 *
 */
require __DIR__ . '/resources/rutas/web.php';
//require __DIR__ . '/app/kernel/autoload.php';
class IndexViews
{
    public function __construct($vista)
    {
        try {
            /**Constructor de vistas */
            $rutas = new Rutas();

            /**Inclusion de vista */
            return (isset($vista['vista'])) ? $rutas->vista($vista['vista']) : $rutas->vista(null);
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
new IndexViews($_GET);
