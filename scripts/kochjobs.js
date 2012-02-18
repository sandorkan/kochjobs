window.onload = init;

$(".iframe").fancybox();

//eventhandler zuweisen
function init(){
    
    var links = document.getElementById("header").getElementsByTagName("a");
    
    for(var i = 0; i < links.length; i++) {
        
        var currentLink = links[i];
        
        addEventHandler(currentLink, "click", handleMainLinkClick);
    }

    $("#jobSearchButton").click(getJobsAjax);
    
    $(".iframe").fancybox();
}

function getJobsAjax() {
    var jobArea = $("#jobArea").val();
    var jobSpec = $("#jobSpecification").val();
    //data: "jobArea=schweiz&jobSpecification=alleJobs",
    
    $.ajax({
        type:"GET",
        url: "getJobs.php",
        data: "jobArea=" + jobArea + "&jobSpecification=" + jobSpec,
        success: displayJobs 
    });
}

function displayJobs(data){
    
    $.getScript("scripts/kochjobs.js");              
    
    var jobArray = JSON.parse(data);
         
    $("#searchResults").html(jobArray.length);
    var ulJobList = document.getElementById("jobList");
    
    $("#jobList").empty();
    
    for(var i = 0; i < jobArray.length; i++){
        var li = document.createElement("li");
        li.innerHTML = "<a class='iframe' href='job_bsp.html'>" +jobArray[i].titel + "</a>" + "<br>" + jobArray[i].aufgaben;
        ulJobList.appendChild(li);
    }     
}
                
function handleMainLinkClick(e) {
    
    //element das event ausloeste
    var element = getActivatedObject(e);
    
    var activeLink = element.title;
    
    //setzt klasse des links auf aktive.. alle anderen auf inaktiv
    var links = document.getElementById("header").getElementsByTagName("a");
    
    for(var i = 0; i < links.length; i++) {
        if(links[i].title == activeLink){
            links[i].className = "link active";
        } else {
            links[i].className = "link inactive";
        }
    }
    
    //loest ajax request aus um content des aktuellen links zu holen
    contentRequest = createRequest();
    
    if(contentRequest == null){
        alert("Failed to create request");
        return;
    }
    
    contentRequest.onload = getContent;
    
    contentRequest.open("GET", activeLink + ".html", true);
    contentRequest.send(null);
    
}

function getContent(){
    
    if(contentRequest.status == 200){
        document.getElementById("content").innerHTML = contentRequest.responseText;

        var links = document.getElementById("header").getElementsByTagName("a");
        var searchLink = document.getElementById("searchLink");
        
        if(searchLink.className == "link active") {
           window.location.href=window.location.href; 
        }
        
        $.getScript("scripts/kochjobs.js");
           
    }
}

