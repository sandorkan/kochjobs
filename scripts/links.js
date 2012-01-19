window.onload = init;

//eventhandler zuweisen
function init(){
    
    var links = document.getElementById("header").getElementsByTagName("a");
    
    for(var i = 0; i < links.length; i++) {
        
        var currentLink = links[i];
        
        addEventHandler(currentLink, "click", handleMainLinkClick);
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
    }
}

