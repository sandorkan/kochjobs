<?php
include_once 'jobs.class.php';

$jobArea = $_GET['jobArea'];
$jobSpecification = $_GET['jobSpecification'];

$jobs = new jobs();

//$jobs = $db->getJobs($jobArea, $jobSpecification);

$jobs->getJobs($jobArea, $jobSpecification);

if(!empty($jobs->jobList)){
    $json = json_encode($jobs->jobList);
    
    echo $json;
    
} else {
    echo "Keine Jobs in fuer diese Kriterien";
}

?>