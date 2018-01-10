<?php
class HealthCheck{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function allHealthChecks() {
		$sql = "select * from Health_Check;";
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


	public function oneHealthCheck($hId) {
	    $sql = 'select * from Health_Check WHERE hId = :hId';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':hId', $hId, PDO::PARAM_STR);
	    $stmt->execute();
        $HealthCheck=$stmt->fetch(PDO::FETCH_OBJ);
        return $HealthCheck;
	}
	
	public function findHealthCheckById($hId) {
	    $sql = 'select * from Health_Check WHERE hId = :hId';
	    $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':hId', $hId, PDO::PARAM_STR);
	    $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	
    public function addHealthCheck($bloodPressure, $weight, $height, $heartRate, $temprature, $alcoholicTest, $dateOfCheck, $donorId ) {
        $stmt= $this->db->prepare("INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) 
									values (:bloodPressure, :weight,:height,:heartRate,:temprature,:alcoholicTest,:dateOfCheck,:donorId)");
        $stmt->bindParam(':bloodPressure', $bloodPressure, PDO::PARAM_STR);
        $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
        $stmt->bindParam(':height', $height, PDO::PARAM_STR);
		$stmt->bindParam(':heartRate', $heartRate, PDO::PARAM_STR);
		$stmt->bindParam(':temprature', $temprature, PDO::PARAM_STR);
		$stmt->bindParam(':alcoholicTest', $alcoholicTest, PDO::PARAM_STR);
		$stmt->bindParam(':dateOfCheck', $dateOfCheck, PDO::PARAM_STR);
        $stmt->bindParam(':donorId', $donorId, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateHealthCheckRecord($hId, $bloodPressure, $weight, $height, $heartRate, $temprature, $alcoholicTest, $dateOfCheck, $donorId) {
       $sql = 'UPDATE Health_check SET bloodPressure = :bloodPressure,
               weight = :weight,
			   height = :height,
			   heartRate = :heartRate,
			   temprature = :temprature,
			   alcoholicTest = :alcoholicTest,
			   dateOfCheck = :dateOfCheck,
			   donorId = :donorId
               WHERE hId = :hId';
       $stmt = $this->db->prepare($sql);
	   $stmt->bindParam(':hId', $hId, PDO::PARAM_STR);
       $stmt->bindParam(':bloodPressure', $bloodPressure, PDO::PARAM_STR);
       $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
       $stmt->bindParam(':height', $height, PDO::PARAM_STR);
	   $stmt->bindParam(':heartRate', $heartRate, PDO::PARAM_STR);
	   $stmt->bindParam(':temprature', $temprature, PDO::PARAM_STR);
	   $stmt->bindParam(':alcoholicTest', $alcoholicTest, PDO::PARAM_STR);
	   $stmt->bindParam(':dateOfCheck', $dateOfCheck, PDO::PARAM_STR);
       $stmt->bindParam(':donorId', $donorId, PDO::PARAM_STR);
	   $stmt->execute();
   }

   public function deleteHealthCheckRecord($hId) {
       $sql = 'DELETE from Health_Check WHERE hId = :hId';
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam(':hId', $hId,PDO::PARAM_STR);
	   $stmt->execute();
   }
}
?>
