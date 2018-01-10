<?php
class Donor{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function allDonors() {
		$sql = "select * from Donor order by fName;";
	    $stmt = $this->db->prepare($sql);
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function allPPS() {
		$sql = "select PPS from Donor;";
	    $stmt = $this->db->prepare($sql);
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function findDonorsByName($fName) {
	    $sql = 'select * from Donor where fName = :fName';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':fName', $fName, PDO::PARAM_STR);
	    $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function findDonorByPPS($pps) {
	    $sql = 'select * from Donor where PPS = :pps';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':pps', $pps, PDO::PARAM_STR);
	    $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function oneDonor($pps) {
	    $sql = 'select * from Donor where PPS = :pps';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':pps', $pps, PDO::PARAM_STR);
	    $stmt->execute();
        $donor=$stmt->fetch(PDO::FETCH_OBJ);
        return $donor;
	}
	
	
	public function addDonor($PPS, $fName, $lName, $DOB, $gender, $email, $contactNo, $city, $street, $timesOfDonations) {
	        $stmt= $this->db->prepare("INSERT INTO Donor values (:PPS, :fName, :lName, :DOB, :gender, :email, :contactNo, :city, :street, :timesOfDonations)");
	        $stmt->bindParam(':PPS', $PPS, PDO::PARAM_STR);
	        $stmt->bindParam(':fName', $fName, PDO::PARAM_STR);
	        $stmt->bindParam(':lName', $lName, PDO::PARAM_STR);
	        $stmt->bindParam(':DOB', $DOB, PDO::PARAM_STR);
			$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
	        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':contactNo', $contactNo, PDO::PARAM_STR);
			$stmt->bindParam(':city', $city, PDO::PARAM_STR);
		    $stmt->bindParam(':street', $street, PDO::PARAM_STR);
		    $stmt->bindParam(':timesOfDonations', $timesOfDonations, PDO::PARAM_STR);
	        $stmt->execute();
	}

	public function updateDonorRecord($PPS, $fName, $lName, $DOB, $gender, $email, $contactNo, $city, $street, $timesOfDonations) {
	       $sql = 'UPDATE Donor SET fName = :fName,
	               lName = :lName, DOB = :DOB, gender = :gender, 
				   email = :email, contactNo = :contactNo, 
				   city = :city, street = :street, timesOfDonations = :timesOfDonations
	               WHERE PPS = :PPS';
	       $stmt = $this->db->prepare($sql);
	       $stmt->bindParam(':PPS', $PPS, PDO::PARAM_STR);
	       $stmt->bindParam(':fName', $fName, PDO::PARAM_STR);
	       $stmt->bindParam(':lName', $lName, PDO::PARAM_STR);
	       $stmt->bindParam(':DOB', $DOB, PDO::PARAM_STR);
		   $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
	       $stmt->bindParam(':email', $email, PDO::PARAM_STR);
		   $stmt->bindParam(':contactNo', $contactNo, PDO::PARAM_STR);
		   $stmt->bindParam(':city', $city, PDO::PARAM_STR);
		   $stmt->bindParam(':street', $street, PDO::PARAM_STR);
		   $stmt->bindParam(':timesOfDonations', $timesOfDonations, PDO::PARAM_STR);
		   $stmt->execute();
	}

	public function deleteDonorRecord($PPS) {
	       $sql = 'DELETE from Donor WHERE PPS = :PPS';
	       $stmt = $this->db->prepare($sql);
	       $stmt->bindParam(':PPS', $PPS,PDO::PARAM_STR);
		   $stmt->execute();
	}




}
?>
