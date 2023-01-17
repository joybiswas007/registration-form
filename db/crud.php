<?php
class crud
{
	private $db; //private database object

	function __construct($conn)
	{ //Constructor to initialize private variables to the database connection
		$this->db = $conn;
	}
	public function insertDbase($fullname, $email, $password, $phone, $dob, $profession)
	{

		try {
			//define sql to be executed
			$sql = "INSERT INTO dbase (fullname,email,password,phone,dob,profession_id) VALUES (:fullname,:email,:password,:phone,:dob,:profession)";
			//preparing sql to be executed
			$stmt = $this->db->prepare($sql);
			//bind all the placeholder to the actual events
			$stmt->bindparam(':fullname', $fullname);
			$stmt->bindparam(':email', $email);
			$stmt->bindparam(':password', $password);
			$stmt->bindparam(':phone', $phone);
			$stmt->bindparam(':dob', $dob);
			$stmt->bindparam(':profession', $profession);
			$stmt->execute();
			// $stmt->saveData();
			// $stmt->store_result();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function editDbase($id, $fullname, $email, $password, $phone, $dob, $profession)
	{
		try {
			$sql = "UPDATE `dbase` SET `fullname`=:fullname,`email`=:email,`password`=:password,`phone`=:phone,`dob`=:dob,`profession_id`=:profession WHERE dbase_id = :id";
			$stmt = $this->db->prepare($sql);
			//bind all the placeholder to the actual events
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":fullname", $fullname);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":password", $password);
			$stmt->bindparam(":phone", $phone);
			$stmt->bindparam(":dob", $dob);
			$stmt->bindparam(":profession", $profession);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function getDbase()
	{
		//$sql = "SELECT * FROM `dbase`";
		$sql = "SELECT * FROM dbase d INNER JOIN profession p ON d.profession_id = p.profession_id";
		$result = $this->db->query($sql);
		return $result;
	}

	public function getDetails($id)
	{
		$sql = "SELECT * FROM dbase d INNER JOIN profession p ON d.profession_id = p.profession_id WHERE dbase_id = :id";
		// $sql = "SELECT * FROM dbase WHERE dbase_id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindparam(':id', $id);
		$stmt->execute(array(":id" => $id));
		$result = $stmt->fetch();
		return $result;
	}

	public function deleteDbase($id)
	{
		try {
			$sql = "DELETE FROM dbase WHERE dbase_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(':id', $id);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function getProfession()
	{
		$sql = "SELECT * FROM profession";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getProfessionID($id)
	{
		try {
			$sql = "SELECT * FROM profession WHERE profession_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(":id", $id);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

}
?>