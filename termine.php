<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zaniyar
 * Date: 03.07.2015
 * Time: 19:47
 */
header('Content-type: application/json');

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'rb.php';
R::setup( 'pgsql:host=localhost;dbname=postgres',
    'postgres', 'zaniyar2' );

if(isset($_POST)) {
//$book = R::load( 'termin', "1" ); //reloads our book
    $fields = R::getAll('select * from termin');
    echo json_encode($fields);
}