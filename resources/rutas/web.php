<?php
/**
 * Constructor de Vistas-Rutas
 */
require __DIR__ . '/../../app/kernel/vista.php';
class Rutas
{
    private $vista_kernel;
    private $vistas;

    public function __construct()
    {
        try {
            $this->vistas = new Kernel_Vista();
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function vista($vista)
    {
        try {
            switch ($vista) {
                case null:
                case '/':
                case 'home':
                case 'certificado':
                    $this->vistas::_return_vista('certificado');
                    break;
                case 'dash':
                    $this->vistas::_return_vista('dash');
                    break;
                case 'login':
                    $this->vistas::_return_vista('login');
                    break;
                case 'gen':
                    $this->vistas::_return_vista('gen');
                    break;
                default:
                    $this->vistas::_return_vista('404');
                    break;
            }
        } catch (\Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
