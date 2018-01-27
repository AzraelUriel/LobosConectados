<?php
require_once 'Database.php';
/*
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| matricula | varchar(10) | NO   | PRI | NULL    |       |
| name      | varchar(20) | YES  |     | NULL    |       |
| lastname  | varchar(20) | YES  |     | NULL    |       |
| password  | varchar(45) | YES  |     | NULL    |       |
| email     | varchar(45) | YES  |     | NULL    |       |
| career    | varchar(3)  | YES  |     | NULL    |       |
| grade     | int(11)     | YES  |     | NULL    |       |
| group     | char(1)     | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
*/
class User
{
	public $matricula;
	public $name;
	public $lastname;
	public $password;
	public $email;
	public $career;
	public $grade;
	public $group;
	public function __construct($matricula,$name,$lastname,$password,$email,$career,$grade,$group)
	{
		$this->matricula = $matricula;
		$this->name = $name;
		$this->lastname = $lastname;
		$this->password = $password;
		$this->email = $email;
		$this->career = $career;
		$this->grade = $grade;
		$this->group = $group;
	}
	public static function get()
	{
		$sql = "SELECT
				*
			   FROM
				Users";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}

	public function save()
	{
/*
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| matricula | varchar(10) | NO   | PRI | NULL    |       |
| name      | varchar(20) | YES  |     | NULL    |       |
| lastname  | varchar(20) | YES  |     | NULL    |       |
| password  | varchar(45) | YES  |     | NULL    |       |
| email     | varchar(45) | YES  |     | NULL    |       |
| career    | varchar(3)  | YES  |     | NULL    |       |
| grade     | int(11)     | YES  |     | NULL    |       |
| group     | char(1)     | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
*/
		$sql = "INSERT INTO Users values('$this->matricula','$this->name','$this->lastname',
			'$this->password','$this->email','$this->career',$this->grade,'$this->group')";

		$db = new Database();
		if ($db->query($sql)) {
		$db->close();
		return true;
		}
		$db->close();
		return false;

	}
}
