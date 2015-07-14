<?php
require( 'config.php' );

$actividades = getActividades( 1 );
$mon_act = getMonitoresAsignados( array_keys( $actividades ) );
$t_actividad = getTiposActividad();

include( template( '../template/head.html' ) );
include( template( '../template/actividades.html' ) );
include( template( '../template/foot.html' ) );
