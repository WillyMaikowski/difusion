<?php

class db {
	
	private $link;
	private $sql;

	public function __construct( $db ) {
		$d = getParametros( $db );
		$this->error = "";
		try {
			$this->link = new PDO( $d['type'].':host='.$d['host'].';dbname='.$d['name'], $d['user'], $d['pass'] );
			$this->link->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
			$this->link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch( PDOException $e ) {
			halting_error( 'error: '.$e->getMessage() );
			exit;
		}
	}

	public function query( $sql ) {
		$this->sql = $sql;
		try {
			if( preg_match( "/^(select|describe|pragma) /i", $this->sql ) ) {
				$res = $link->query( $this->sql );
			}
			else if( preg_match( "/^(delete|insert|update) /i", $this->sql ) ) {
				$res = $link->exec( $this->sql );
			}
		} catch( PDOException $e ) {
			halting_error( 'sql: '.$this->sql.'; error: '.$e->getMessage() );
			exit;
		}
		return $res;	
	}

}
