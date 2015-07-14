<?php

function getActividadesAsignadas( $monitores ) {
	$link = new db( 'difusion' );
	$ids = is_array( $monitores ) ? array_map( 'intval', $monitores ) : array( intval( $monitores ) );
	if( ! $ids ) return array();

	$sql = "
select ASI_ID id, ASI_MON_ID mon_id, ASI_ACT_ID act_id, ASI_FECHA_M fecha_m, ASI_FECHA_C fecha_c , ASI_ESTADO estado
from ASIGNACIONES
where ASI_MON_ID in ( ".implode( ', ', $ids )." )
and ASI_ESTADO > 0
";

	$res = $link->query( $sql );
	$r = array();
	while( $row = $res->fetch() ) {
		$r[$row['mon_id']][$row['id']] = $row;
	}
	
	return $r;
}

function getMonitoresAsignados( $actividades ) {
	$link = new db( 'difusion' );
	$ids = is_array( $actividades ) ? array_map( 'intval', $actividades ) : array( intval( $actividades ) );
	if( ! $ids ) return array();

	$sql = "
select ASI_ID id, ASI_MON_ID mon_id, ASI_ACT_ID act_id, ASI_FECHA_M fecha_m, ASI_FECHA_C fecha_c , ASI_ESTADO estado
from ASIGNACIONES
where ASI_ACT_ID in ( ".implode( ', ', $ids )." )
and ASI_ESTADO > 0
";

	$res = $link->query( $sql );
	$r = array();
	while( $row = $res->fetch() ) {
		$r[$row['act_id']][$row['id']] = $row;
	}

	return $r;
}

function getActividades( $mon_id = 0, $activas = false ) {
	$link = new db( 'difusion' );
	$mon_id = intval( $mon_id );
	$actividades = getActividadesAsignadas( $mon_id );

	$sql = "
select ACT_ID id, ACT_NOMBRE nombre, ACT_HORA_INI ini, ACT_HORA_FIN fin, ACT_FECHA_FIN fecha_fin, ACT_T_ACT_ID tipo, ACT_COMENTARIOS comentarios, ACT_HORAS_EFECT horas, ACT_FECHA_M fecha_m, ACT_FECHA_C fecha_c, ACT_ESTADO estado
from ACTIVIDADES
where ACT_ESTADO > 0
";

	if( $activas ) $sql .= "and ACT_FECHA_FIN > ".time()." ";
	if( $actividades ) {
		$aux = array();
		foreach( $actividades as $a ) $aux = array_merge( $aux, array_column( $a, 'act_id' ) );
		if( $aux ) $sql .= "and ACT_ID in ( ".implode( ', ', $aux )." )";
	}
	
	$res = $link->query( $sql );

	$r = array();
	while( $row = $res->fetch() ) {
		$r[$row['id']] = $row;
	}

	return $r;
}

function getMonitores( $mon_ids = array(), $todos = FALSE ) {
	$link = new db( 'difusion' );
	$ids = is_array( $mon_ids ) ? array_map( 'intval', $mon_ids ) : array( intval( $mon_ids ) );
	$estado = $todos ? -1 : 0;

	$sql = "
select MON_ID id, MON_NOMBRE nombre, MON_RUT rut, MON_EMAIL email, MON_TELEFONO telefono, MON_COLEGIO_ORIGEN colegio, MON_COLEGIO_TIPO t_colegio, MON_ESTADO estado
from MONITORES
where MON_ESTADO > $estado
";
	if( $ids ) $sql .= "and MON_ID in ( ".implode( ', ', $ids )." )";

	$res = $link->query( $sql );

	$r = array();
	while( $row = $res->fetch() ) {
		$r[$row['id']] = $row;
	}

	return is_array( $mon_ids ) ? $r : reset( $r );
}

function getTiposActividad() {
	$link = new db( 'difusion' );

	$sql = "
select T_ACT_ID id, T_ACT_NOMBRE nombre, T_ACT_PAGO pago, T_ACT_ESTADO estado
from T_ACTIVIDAD
";
	
	$res = $link->query( $sql );
	$r = $res->fetchAll();

	return $r;
}
