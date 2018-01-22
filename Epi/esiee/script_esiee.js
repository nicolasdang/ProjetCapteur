var retour="";
var timer;
var rebours=5;
var currentMode=1;
var periodSql = 5000;
var period = 1000;
var idCapteur1=1;
var idCapteur2=2;
var compteur=0;

var url_req="http://hamouchr.free.fr/sensenv/esiee/requestDB2.php";
    /**
     * Modifie une balise HTML
     * @param  {[type]} sName le nom de la balise (name)
     * @param  {[type]} sTxt  la valeur à insérer dans la page web (dans la balise)
     * @return 
     */
     
    function getCapteursValues(idCapteur)
    {
        //static i=2;
        //i++;  
        //retour = connectURL("http://hamouchr.free.fr/sensenv/requestDB.php?id="+numeroCapteur);
        //retour = 
       if (currentMode==1)
        { //if(rebours==0)

            if (rebours-- <= 0)                
            {
              connectURL(url_req+"?idCap="+idCapteur1, "capteur"+idCapteur1, updateDocument);
              connectURL(url_req+"?idCap="+idCapteur2, "capteur"+idCapteur2, updateDocument);              
              rebours = periodSql/1000;
            }
            else updateDocument(0,null);
            
        }
        else if (currentMode==2)
                updateListValues();
        
        
        //document.getElementById("sensorInfo").innerHTML = "<p>"+retour+" i="+i+"<br/></p>";
    }

  function rtSensorInfo(){
                
            rebours=periodSql/1000;
            timer = setInterval("getCapteursValues()", period);
             //timer = setInterval("getCapteurValue(idCapteur2)", interval);
      }
      

     // callback function    
     function updateDocument(idCapteur, xhttp){
       
        if (xhttp!=null)  document.getElementById(idCapteur).innerHTML = "<p>"+xhttp.responseText+"<br/></p>";
        document.getElementById("divCompteur").innerHTML="<p>"+"refresh in "+rebours+" seconds <br/></p>"; 
     }

 
    function connectURL(url, idCapteur, cfunction)
    {
          if(window.XMLHttpRequest) // Firefox
                xhttp = new XMLHttpRequest();
            else if(window.ActiveXObject) // Internet Explorer
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            else
            { // XMLHttpRequest non supporté par le navigateur
                alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                return;
            }

                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                        //return this.responseText;
                        cfunction(idCapteur, this);
                    }
                };
                
            xhttp.open("GET", url, true); // false = appel synchrone
            xhttp.send();
/*           if(xhttp.readyState == 4)
                 return xhttp.responseText;
            else return false;*/ 

     }

              
        function setMode(mode)
        {
           currentMode=mode;
            if (mode==1) //RT Values
            {
              rtSensorInfo();
            }
            else if (mode==2){
                                        clearInterval(timer);
                                        getHistoriqueValues();
                                  }
        }
        
        function    getHistoriqueValues(){
            
            //document.getElementById('ML-'+value).checked='true';
       document.getElementById('chkTemp').disabled=false;
           document.getElementById('chkHum').disabled=false;
           document.getElementById('chkLum').disabled=false;
           document.getElementById('chkBatt').disabled=false;
           
           //connectURL("http://hamouchr.free.fr/sensenv/requestDB.php?historique=true", updateDocument);
           updateListValues();
        }
        
        function updateListValues(){
            
            chkTemp = document.getElementById('chkTemp').checked;
           chkHum  = document.getElementById('chkHum').checked;
           chkLum  = document.getElementById('chkLum').checked;
           chkBatt = document.getElementById('chkBatt').checked;
           
            connectURL(url_req+"?historique=true&idCap="+idCapteur+"&temp="+chkTemp+"&hum="+chkHum+"&lum="+chkLum+"&batt="+chkBatt, updateDocument);                   
        }
