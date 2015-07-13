<?php

class db {
	
	private $link;
	private $sql;

	public function __construct( $db ) {
		$d = getParametros( $db );
		$this->error = "";
		try {
			$this->link = new PDO( $d['type'].':host='.$d['host'].';dbname='.$d['name'].';charset='.$d['charset'], $d['user'], $d['pass'] );
			$this->link->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
			$this->link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->link->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'" );
		} catch( PDOException $e ) {
			halting_error( 'error: '.$e->getMessage() );
			exit;
		}
	}

	public function query( $sql ) {
		$this->sql = $sql;
		try {
			if( preg_match( "/^\n(select|describe|pragma) /i", $this->sql ) ) {
				$res = $this->link->query( $this->sql );
			}
			else if( preg_match( "/^\n(delete|insert|update) /i", $this->sql ) ) {
				$res = $this->link->exec( $this->sql );
			}
		} catch( PDOException $e ) {
			halting_error( 'sql: '.$this->sql.'; error: '.$e->getMessage() );
			exit;
		}
		return $res;	
	}

}
