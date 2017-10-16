<?php
/**
 * Created by PhpStorm.
 * User: staaden
 * Date: 16.10.2017
 * Time: 12:48 */

//Database access
$sqlhost = "localhost";
$sqluser = "david";
$sqlpass = "david";
$dbname  = "museum";

$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("DB-system nicht verfügbar");
