<?php

function getActividades( $mon_id = 0, $activas = false ) {
	$link = db( 'difusion' );
	$mon_id = intval( $mon_id );

	$sql = "
select ACT_ID id, ACT_MON_ID mon_id, ACT_NOMBRE nombre, ACT_HORA_INI ini, ACT_HORA_FIN fin, ACT_FECHA_FIN fecha_fin, ACT_T_ACT_ID tipo, ACT_COMENTARIOS comentarios, ACT_HORAS_EFECT horas, ACT_ESTADO estado
from ACTIVIDADES
where ACT_ESTADO > 0
";
	if( $mon_id ) $sql .= "and ACT_MON_ID = $mon_id ";
	if( $activas ) $sql .= "and ACT_FECHA_FIN > ".time()." ";
	
	$res = $link->query( $sql );
	if( $link->isError() ) {
		halting_error( 'getActividades -> sql: '.$sql, DB );
		exit;
	}

	$r = array(); $mons = array();
	while( $row = $res->fetchAssoc() ) {
		$r[$row['id']] = $row;
		$mons[$row['mon_id']] = 1;
	}

	$mons = getMonitores( array_keys( $mons ), TRUE );
	foreach( $r as $k => $v ) $r[$k]['monitor'] = $mons[$v['mon_id']];	

	return $r;
}

function getMonitores( $mon_ids = array(), $todos = FALSE ) {
	$link = db( 'difusion' );
	$ids = is_array( $mon_ids ) ? array_map( 'intval', $mon_ids ) : array( intval( $mon_ids ) );
	$estado = $todos ? -1 : 0;

	$sql = "
select MON_ID id, MON_NOMBRE nombre, MON_RUT rut, MON_EMAIL email, MON_TELEFONO telefono, MON_COLEGIO_ORIGEN colegio, MON_COLEGIO_TIPO t_colegio, MON_ESTADO estado
from MONITORES
where MON_ESTADO > $estado
";
	if( $ids ) $sql .= "and MON_ID in ( ".implode( ', ', $ids )." )";

	$res = $link->query( $sql );
	if( $link->isError() ) {
		halting_error( 'getMonitores -> sql: '.$sql, DB );
		exit;
	}

	$r = array();
	while( $row = $res->fetchAssoc() ) {
		$r[$row['id']] = $row;
	}

	return is_array( $mon_ids ) ? $r : reset( $r );
}

function getTiposActividad() {
	$link = db( 'difusion' );

	$sql = "
select T_ACT_ID id, T_ACT_NOMBRE nombre, T_ACT_PAGO pago, T_ACT_ESTADO estado
from TIPO_ACTIVIDAD
";
	
	$res = $link->query( $sql );
	$r = $res->fetchAll();

	return $r;
}
