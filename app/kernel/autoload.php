<?php
/**
 * Inclusion global de archivos requeridos
 */

/**Modelo DB */
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/kernel/modelo.php';

/**Composer */
include_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

/**Generador de estadisticas */
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/kernel/counter.php';
