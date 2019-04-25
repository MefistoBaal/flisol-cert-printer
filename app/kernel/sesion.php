<?php
/**
 * Arranques de session en casi de status 1
 */
class Inicio_Sesion
{
    public function __construct($data_usuario)
    {
        try {
            $this->crear_sesion($data_usuario);
        } catch (\Exception $e) {
            die('ERROR_CONSTRUCT: ' . $e->getMessage());
        }
    }

    private function crear_sesion($data_usuario)
    {
        try {
            session_name('FlisolADM');
            session_start([
                'gc_maxlifetime' => 8600,
            ]);
            $_SESSION['id_adm']    = $data_usuario['idusuarios_adm'];
            $_SESSION['Nombres']   = $data_usuario['Nombres'];
            $_SESSION['Apellidos'] = $data_usuario['Apellidos'];
            $_SESSION['Email']     = $data_usuario['Email'];
            $_SESSION['T_Doc']     = $data_usuario['Tipo_Documento'];
            $_SESSION['Documento'] = $data_usuario['Documento'];
            return true;
        } catch (\Exception $e) {
            die('ERROR_SESION: ' . $e->getMessage());
        }
    }
}
