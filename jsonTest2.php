<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                $.ajax({
                    type:"GET",
                    url: "getJobs.php",
                    //data: "jobArea=schweiz&jobSpecification=alleJobs",
                    data: "jobArea=schweiz&jobSpecification=alleJobs",
                    success: displayJobs
                });
                
                
                function displayJobs(data){
                    
                    var jobArray = JSON.parse(data);
                    
                var ulJobList = document.getElementById("jobList");
               
                    for(var i = 0; i < jobArray.length; i++){
                        var li = document.createElement("li");
                        li.innerHTML = jobArray[i].titel + "<br><br>" + jobArray[i].aufgaben;
                        
                        ulJobList.appendChild(li);
                            //document.write(jobArray[i].titel + "<br>");
                        
                        }     
                }
            });
         
        </script>
        <title></title>
    </head>
    <body>
        <ul id="jobList">
                        
        </ul>
    </body>
</html>

