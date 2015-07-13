<?php
require( 'config.php' );

$actividades = getActividades();
$t_actividad = getTiposActividad();

include( template( '../template/head.html' ) );
include( template( '../template/actividades.html' ) );
include( template( '../template/foot.html' ) );
