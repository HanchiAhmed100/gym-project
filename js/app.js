// navbar 
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function changeNav() {
  if(window.innerWidth > 600){
    if(document.getElementById("mySidenav").style.width == "0px"){
      document.getElementById("mySidenav").style.width = "35%";
    }else{
      document.getElementById("mySidenav").style.width = "0";
    }
  }else{
    if(document.getElementById("mySidenav").style.width == "0px"){
      document.getElementById("mySidenav").style.width = "100%";
    }else{
      document.getElementById("mySidenav").style.width = "0";
    }
  }
}

  


