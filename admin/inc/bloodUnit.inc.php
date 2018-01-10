<?php
class BloodUnit{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function allBloodUnits() {
		$sql = "select * from Blood_Unit;";
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

	public function findBloodUnitById($bId) {
	    $sql = 'select * from Blood_Unit WHERE bId = :bId';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':bId', $bId, PDO::PARAM_STR);
	    $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function oneBloodUnit($bId) {
	    $sql = 'select * from Blood_Unit WHERE bId = :bId';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':bId', $bId, PDO::PARAM_STR);
	    $stmt->execute();
        $bloodUnit=$stmt->fetch(PDO::FETCH_OBJ);
        return $bloodUnit;
	}

	public function findBloodUnitByGroup($bloodGroup) {
		$sql = "select bId, bloodGroup, amount, dateOfDonation, expiryDate, donorId from Blood_Unit
								WHERE bloodGroup = :bloodGroup";
	    $stmt = $this->db->prepare($sql);
	  	$stmt->bindParam(':bloodGroup', $bloodGroup, PDO::PARAM_STR);
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


    public function addBloodUnit($bloodGroup, $amount, $dateOfDonation, $donorId ) {
        $stmt= $this->db->prepare("Call newBloodUnit 
				(:bloodGroup, :amount, :dateOfDonation, :donorId)");
        $stmt->bindParam(':bloodGroup', $bloodGroup, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
        $stmt->bindParam(':dateOfDonation', $dateOfDonation, PDO::PARAM_STR);
        $stmt->bindParam(':donorId', $donorId, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateBloodUnitRecord($bId, $bloodGroup, $amount, $dateOfDonation, $donorId) {
       $sql = 'UPDATE Blood_Unit SET bloodGroup = :bloodGroup,
               amount = :amount,
			   dateOfDonation = :dateOfDonation,
			   expiryDate = DATE_ADD(:dateOfDonation,INTERVAL 42 DAY),
			   donorId = :donorId
               WHERE bId = :bId';
       $stmt = $this->db->prepare($sql);
	    $stmt->bindParam(':bId', $bId, PDO::PARAM_STR);
       $stmt->bindParam(':bloodGroup', $bloodGroup, PDO::PARAM_STR);
       $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
       $stmt->bindParam(':dateOfDonation', $dateOfDonation, PDO::PARAM_STR);
	    $stmt->bindParam(':expiryDate', $expiryDate, PDO::PARAM_STR);
       $stmt->bindParam(':donorId', $donorId, PDO::PARAM_STR);
	   $stmt->execute();
   }

   public function deleteBloodUnitRecord($bId) {
       $sql = 'DELETE from Blood_Unit WHERE bId = :bId';
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam(':bId', $bId,PDO::PARAM_STR);
	   $stmt->execute();
   }
}
?>
