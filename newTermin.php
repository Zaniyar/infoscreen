<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zaniyar
 * Date: 03.07.2015
 * Time: 12:52
 */

require 'rb.php';
R::setup( 'pgsql:host=localhost;dbname=postgres',
    'postgres', '' );

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
