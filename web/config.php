<?php
require( '../include/templateLib.php' );
require( '../include/db.class.php' );
require( '../include/functions.php' );

$puede_ver = isset( $_SESSION['user']['id'] );
$puede_editar = isset( $_SESSION['user']['estado'] ) && $_SESSION['user']['estado'] === 2;

/* Configuraciones globales  */
$t_colegio = array( 'Municipal', 'Subvencionado', 'Particular' );
