<?php
mb_internal_encoding( "UTF-8" );
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
require( '../include/templateLib.php' );
require( '../include/db.class.php' );
require( '../include/functions.php' );

$puede_ver = isset( $_SESSION['user']['id'] );
$puede_editar = isset( $_SESSION['user']['estado'] ) && $_SESSION['user']['estado'] === 2;

/* Configuraciones globales  */
$t_colegio = array( 'Municipal', 'Subvencionado', 'Particular' );
