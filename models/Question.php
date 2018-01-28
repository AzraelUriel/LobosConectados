<?php
require_once 'Database.php';
/*
+----------------+--------------+------+-----+-------------------+----------------+
| Field          | Type         | Null | Key | Default           | Extra          |
+----------------+--------------+------+-----+-------------------+----------------+
| idQuestions    | int(11)      | NO   | PRI | NULL              | auto_increment |
| question       | varchar(200) | YES  |     | NULL              |                |
| category       | varchar(45)  | YES  |     | NULL              |                |
| user_matricula | varchar(10)  | NO   | MUL | NULL              |                |
| date           | timestamp    | YES  |     | CURRENT_TIMESTAMP |                |
+----------------+--------------+------+-----+-------------------+----------------+
*/
class Question
{
	public $question;
	public $question_description;
	public $user_matricula;

	public function __construct($question,$question_description,$user_matricula)
	{
		$this->question = $question;
		$this->question_description = $question_description;
		$this->user_matricula = $user_matricula;
	}
	public static function get()
	{
		$sql = "SELECT * FROM Questions ORDER BY date";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}
	/*
+----------------+--------------+------+-----+-------------------+----------------+
| Field          | Type         | Null | Key | Default           | Extra          |
+----------------+--------------+------+-----+-------------------+----------------+
| idQuestions    | int(11)      | NO   | PRI | NULL              | auto_increment |
| question       | varchar(200) | YES  |     | NULL              |                |
| category       | varchar(45)  | YES  |     | NULL              |                |
| user_matricula | varchar(10)  | NO   | MUL | NULL              |                |
| date           | timestamp    | YES  |     | CURRENT_TIMESTAMP |                |
+----------------+--------------+------+-----+-------------------+----------------+
	*/
	public function save()
	{
		$sql = "INSERT INTO Questions (question,question_description,user_matricula)
		values('$this->question','$this->question_description','$this->user_matricula')";

		$db = new Database();
		if ($db->query($sql)) {
		$db->close();
		return true;
		}
		$db->close();
		return false;

	}
}
