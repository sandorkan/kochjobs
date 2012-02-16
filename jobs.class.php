<?php

class jobs {
    private $mysqli;
    private $mysqli_result;
    public $jobList = array();
    
    public function __construct() {
	$this->mysqli = new mysqli("localhost", "root", "root", "kochjobs");
        if(!$this->mysqli) {
            die('Es war keine Verbindung zur Datenbank möglich');
        }
    }
        
    public function __destruct() {
        $this->mysqli->close();
    }
        
    public function getJobs($place = "schweiz", $bereich= "alleJobs"){
        
        if($place == "schweiz" || $place == "wo") {
           $ortQuery = "SELECT * FROM Arbeitgeber"; 

        } else
        {
            $ortQuery = "SELECT * FROM Arbeitgeber WHERE kanton = '".$place."'";
        }
        
        if($bereich == "alleJobs" || $bereich == "was") {
            $jobQuery = "SELECT * FROM Jobs";
        } else {
            $jobQuery = "SELECT * FROM Jobs WHERE bereich = '".$bereich."'";
        }
        
        //$result = $this->mysqli->query("SELECT * FROM Jobs WHERE bereich = '".$bereich."'");
        if(($place == "schweiz" || $place == "wo") && ($bereich == "alleJobs" || $bereich == "was")) {
            //$result = $this->mysqli->query($jobQuery);
            $result = $this->mysqli->query($jobQuery);
            
            if (!$result) {
                throw new Exception("Error getting Jobs: " . $this->mysqli->error);
            } else {
                $this->mysqli_result = $result;
                
                while($row = $this->mysqli_result->fetch_object()){
                    $this->jobList[] = $row;
                }
            }
        } else {
            
            
            //Resultat aller Jobs eines bestimmten Bereichs
            $jobResult = $this->mysqli->query($jobQuery);
            if (!$jobResult) {
                throw new Exception("Error getting Jobs: " . $this->mysqli->error);
            }
            
            //Resultat aller Arbeitgeber eines bestimmten Kantons
            $arbeitgeberResult = $this->mysqli->query($ortQuery);
            if (!$arbeitgeberResult) {
                throw new Exception("Error getting Jobs: " . $this->mysqli->error);
            }
            
            $arbeitgeberArbeitsort = array();
            
            while($arbeitgeber = $arbeitgeberResult->fetch_object()){
                    
                    $arbeitgeberArbeitsort[$arbeitgeber->id] = $arbeitgeber->kanton;        
                }
                
                
            while($job = $jobResult->fetch_object()){
                                
                if($arbeitgeberArbeitsort[$job->arbeitgeber_id] == $place || $place == "schweiz" || $place == "wo"){
                    $this->jobList[] = $job;
                }
                
            }           
        }
        
        
        
    }
}

/*
$x = new jobs();

$x->getJobs("schweiz" ,"commis");

foreach ($x->jobList as $job) {
    //echo $job->titel . "<br>";
    echo "Titel: " . $job->titel . "<br>";
}
*/
?>
