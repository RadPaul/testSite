function authentification() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;
    var vars = "login="+login+"&password="+password;
    hr.open("POST", "php/login.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        console.log(hr);
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            console.log(return_data);
            if (return_data == "OK") {
                localStorage.setItem("myid", login);
                pageView();
            } else {alert(return_data); }
        }
    }
    hr.send(vars); // Executing the request
}

//site personalization
function pageView() {
    if (localStorage.getItem("myid")) {
        document.getElementById("profile").innerHTML=localStorage.getItem("myid");
        document.getElementById("profile").setAttribute("href", "profile.php");
        document.getElementById("auth").style.display="none";
    }
    //user stylesheet mode
    if (localStorage.getItem("mode") === null) {
        localStorage.setItem("mode", document.getElementById("stylesheet").getAttribute("href"));
    } else {
        document.getElementById("stylesheet").setAttribute("href", localStorage.getItem("mode"));
    }
}

function logForm() {
    if ((document.getElementById("profile").innerHTML=="Profile") && (document.getElementById("auth").style.display=="inline-block")){
        document.getElementById("auth").style.display="none";
    } else {
        document.getElementById("auth").style.display="inline-block";
    } 
}

//change the styleshhet mode function
function changeMode() {
    const sslink = document.getElementById("stylesheet");
    if (sslink.getAttribute("href") == "stylesheets/styleLight.css") {
        localStorage.setItem("mode","stylesheets/styleDark.css");
    } else {
        localStorage.setItem("mode","stylesheets/styleLight.css");
    }
    return sslink.setAttribute("href", localStorage.getItem("mode"));
}

//function that shows a random number (which is basically the only point of the site being a thing)
function likeAGame() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var number = Math.round(Math.random()*10000);
    var name = localStorage.getItem("myid");
    var vars = "number="+number+"&name="+name;
    hr.open("POST", "php/post.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    hr.send(vars); // Executing the request
}

//user's stat POST data
function myStat(){
    var hr = new XMLHttpRequest();
    var name = localStorage.getItem("myid");
    var vars = "name="+name;
    hr.open("POST", "php/tables.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("myStat").innerHTML = return_data;
        }
    }
    hr.send(vars); // Executing the request
}