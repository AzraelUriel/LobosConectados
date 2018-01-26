<?php
require_once 'Database.php';

class Product
{
	public $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
	public static function get()
	{
		$sql = "SELECT
				*
			   FROM
				productos";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}
}
