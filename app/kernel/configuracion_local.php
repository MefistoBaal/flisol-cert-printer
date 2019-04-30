<?php
/**
 * Configuracion del sitio para DB
 * Configuracion para pruebas locales
 */
class Config
{
    const DB_USERNAME = 'root';
    const DB_PASS     = 'Z2004k-2018';
    const DB_HOST     = 'localhost';
    const DB_DATABASE = 'flisol_cert';
    const DB_CHAR     = 'SET CHARSET utf8';
    const DB_OPT      = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
}
