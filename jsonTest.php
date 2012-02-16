<!DOCTYPE html>
<?php
include_once 'jobs.class.php';

$x = new jobs();

$x->getJobs();

/*
foreach ($x->jobList as $job) {
    //echo $job->titel . "<br>";
    echo "Titel: " . $job->titel . "<br>";
}
*/

$j = json_encode($x->jobList);

echo $j;
class jsonTest {
    //put your code here
}

?>
<html>
    
</html>