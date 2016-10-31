<?php

class Entity {
	public static $db;
	public static function init() {
		self::$db = Connect::getInstance();
	}
	public static function get($id) {
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$className = get_called_class();
		$q = self::$db->query("SELECT * FROM {$tableName} WHERE {$keyColumn} = {$id}");
		$res = $q->fetchObject($className);
		return $res;
	}
	
	public static function getAll() {
		$tableName = static::$tableName;
		$q = self::$db->query("SELECT * FROM {$tableName} ORDER BY date DESC  LIMIT 5");
		$postArr = $q->fetchAll();
		return $postArr;
	}
	public static function remove($id) {
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$q = self::$db->query("DELETE FROM {$tableName} WHERE {$keyColumn} = {$id}");
	}
	public function insert() {
		$tableName = static::$tableName;
		$q = "INSERT INTO {$tableName} (";
		$val = '';
		foreach($this as $k=>$v) {
			$q .= $k . ", ";
			$val .= "'" . $v . "', ";
		}
		$q = trim($q, ", ");
		$q .= ") VALUES (";
		$q .= $val;
		$q = trim($q, ", ");
		$q .= ")";
		$q = self::$db->query($q);
		
	}
	
}

Entity::init();

?>