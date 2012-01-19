function createRequest() {
  try {
    request = new XMLHttpRequest();
  } catch (tryMS) {
    try {
      request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (otherMS) {
      try {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (failed) {
        request = null;
      }
    }
  }	
  return request;
}

function addEventHandler(obj, eventName, handlerFunction){
    
    // fuer windows
    if(document.attachEvent) {
        obj.attachEvent("on" + eventName, handlerFunction);
        
    } 
    // fuer firefox, chrome, safari, 
    else if(document.addEventListener) {
        obj.addEventListener(eventName, handlerFunction, false);
    }
}

// wird ein event ausgeloest, gibt dieser der handler-funktion ein argument mit
// in diesem argument objekt ist das element ent
function getActivatedObject(e) {
     var obj;
     
     if(!e){
         // early version of IE
         obj = window.event.srcElement;
       // for windows 7
     } else if(e.srcElement) {
         obj = e.srcElement;
       // fuer dom2 browser
     } else if(e.target) {
         obj = e.target;
     }
     
     return obj;
}

/*
function sendRequest(urlStr,argumentsObj,callbackFunc) {
    
    request = createRequest();
    
    if(request == null){
        alert("unable to create request");
    } else {
        var args = "";
        
        for(i in argumentsObj){
            args += (i + "=" + argumentsObj[i] + "&")
        }
        
        var url = urlStr + "?" + args;
        
        request.onload = callbackFunc;
        request.open("GET", url, true);
        request.send(null);
    }
}
*/