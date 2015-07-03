<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zaniyar
 * Date: 03.07.2015
 * Time: 12:52
 */
header('Content-type: application/json');
require 'rb.php';
R::setup( 'pgsql:host=localhost;dbname=postgres',
    'postgres', 'zaniyar2' );

/*
$book = R::dispense( 'book' );
$book->title = 'Learn to Program';
$book->rating = 10;
$book['price'] = 29.99; //you can use array notation as well
$id = R::store( $book );



$book = R::load( 'book', $id ); //reloads our book

    echo $book;

echo "Die ID ist".$id;


$book->title = 'Learn to blooob';
$book->rating = 'goodio';
$book->published = '2015-02-15';
R::store( $book );

$books = R::loadAll( 'book',[1,2,3,4] );

echo "<pre>";
var_dump($books);
echo "</pre>";

*/


/* wer: werName,
                    titel: $("#titel").val(),
                    uhrzeit: $("#uhrzeit").val(),
                    datum: $("#datum").val(),
                    telefon: $("#telefon").val(),
                    arzt: $("#arzt").val(),
                    adresse: $("#adresse").val(),
*/
//$x = $_POST['myPostData'];

//var_dump($x);



if (isset($_POST["myPostData"]) && !empty($_POST["myPostData"])) { //Checks if action value exists
    $action = $_POST["myPostData"]['func'];
    switch($action) { //Switch case for value of action
        case "newTermin": newTermin(); break;
        default: sonst();
    }
}
function newTermin(){
    $daten = $_POST['myPostData'];

    $termin = R::dispense( 'termin' );
    $termin->user = $daten['user'];
    $termin->titel = $daten['titel'];
    $datum = $daten['datum'];
    $uhrzeit = $daten['uhrzeit'];
    $datumUhrzeit = DateTime::createFromFormat('d M, Y H:i', $datum . ' ' . $uhrzeit, new DateTimeZone('Europe/Berlin'));

    //$datumUhrzeit = $daten['datumUhrzeit'];
    //$datumUhrzeit = substr($datumUhrzeit, 0, strpos($datumUhrzeit, '('));
    //$resultDate = date('Y-m-d h:i:s', strtotime($datumUhrzeit));

  //  $date = date( "Y-m-d", strtotime($daten['datumUhrzeit']) );
  ////  $datumUhrzeit = new DateTime($daten['datumUhrzeit']);

    $termin->datumUhrzeit =$datumUhrzeit;
    $termin->telefon = $daten['telefon'];
    $termin->person = $daten['arzt'];
    $termin->adresse = $daten['adresse'];
    $id = R::store( $termin );

    //$datumUhrzeit = new DateTime(R::load( 'termin', $id )->datumUhrzeit,new DateTimeZone('UTC')); //reloads our book
    //$datumUhrzeit = R::load( 'termin', $id )->datumUhrzeit;
   // echo $daten['datum'];
  echo  R::load( 'termin', $id ); //reloads our book
    //echo json_encode($daten);

}

function sonst(){
    echo json_encode("{'hey':'mey'}");
}