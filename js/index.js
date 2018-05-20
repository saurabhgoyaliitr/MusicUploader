
function do_first()
{
  x=window.innerHeight;

  document.getElementById("sidebar").style.minHeight=x-40;
  document.getElementById("content").style.minHeight=x-10;
}




function ahead_start(song)
{
    song.currentTime=0.8;

}


function disableBodyScroll() {
  var body = document.getElementsByTagName('body')[0];
    body.style.overflowY = 'hidden';
}
function enableBodyScroll() {
  var body = document.getElementsByTagName('body')[0];
    body.style.overflowY = 'auto';
}

function play_song(song)
{

  if(song.paused)
  {
    song.play();
  }

  else
  {
    song.pause();
  }
}


 function inc(src)
 {
   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "account/views.php?loc=" + src, true);
        xmlhttp.send();
 }



function show_upload_box(){
      //document.getElementById("blur").style.display="block";
      	document.getElementById('upload_box').style.transition="top 0.8s linear 0s";
    	document.getElementById("upload_box").style.top="20%";
    	//document.getElementById("blur").style.display="block";
    	document.getElementById('upload_box').style.zIndex=120;

      document.getElementById('blur').style.display="block";
     
     }

function hide_upload_box () {
    		document.getElementById('upload_box').style.transition="top 0.8s linear 0s";
    	document.getElementById("upload_box").style.top="-600px";
    	//document.getElementById("blur").style.display="block";
    	document.getElementById('upload_box').style.zIndex=120;

      document.getElementById('blur').style.display="none";
    	//console.log("hi");
    	
    }
