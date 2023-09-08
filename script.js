function togDiv(){
    var crDiv = document.getElementById("crDiv");
    var logDiv = document.getElementById("logDiv");

    crDiv.classList = "d-none";
    logDiv.classList = "d-block col-lg-6 offset-lg-3 col-12";
}

function togCrDiv(){
    var crDiv = document.getElementById("crDiv");
    var logDiv = document.getElementById("logDiv");

    logDiv.classList = "d-none";
    crDiv.classList = "d-block col-lg-6 offset-lg-3 col-12";
}

function creatNewAccount(){
    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var pw1 = document.getElementById("pw1");
    var pw2 = document.getElementById("pw2");
    var mob = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();
    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("e", e.value);
    f.append("pw1", pw1.value);
    f.append("pw2", pw2.value);
    f.append("mob", mob.value);
    f.append("gen", gender.value);

    var r = new XMLHttpRequest();


    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            
            if (t=="Success") {
                document.getElementById("responseText1").innerHTML= t ;
                document.getElementById("responseText1").classList = ("text-capitalize text-success");
                document.getElementById("responseDiv").classList = ("d-block col-12 form-control alert-success text-start");
            }else{
                document.getElementById("responseText1").innerHTML= t ;
                document.getElementById("responseText1").classList = ("text-capitalize text-danger");
                document.getElementById("responseDiv").classList = ("d-block col-12 form-control alert-danger text-start");
            }
        }
    }
    

    r.open("POST", "createAccountProcess.php" , true);
    r.send(f);
}

function login(){
    var email = document.getElementById("email1").value;
    var password = document.getElementById("password1").value;
    var rememberme = document.getElementById("check").checked;

    var f = new FormData();
    f.append("e", email);
    f.append("p", password);
    f.append("r", rememberme);
    
    var r = new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t=="success"){
                window.location="home.php";
            }
        } else if (r.readyState == 4 && r.status != 200) {
            // Handle other HTTP statuses (e.g., 401 for unauthorized)
            alert("Login failed"); 
        }
    }

    r.open("POST", "loginProcess.php", true);
    r.send(f);
}

var togmodal;
function modalon(){

    var email = document.getElementById("email1");
    
    var r = new XMLHttpRequest;
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status==200){
            var t = r.responseText;
            if(t == 1){
                var newmodal = document.getElementById("forgotPasswordModal");
                togmodal = new bootstrap.Modal(newmodal);
                togmodal.show();
            }else if(t != 1){
                alert(t);
            }
        }
    }
    r.open("GET" , "verificationSend.php?e="+email.value , true);
    r.send();
    
}


function showPassword(){

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if(np.type == "password"){
        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    }else{
        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye"></i>';
    }

}

function showPassword2(){

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if(rnp.type == "password"){
        rnp.type = "text";
        rnpb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    }else{
        rnp.type = "password";
        rnpb.innerHTML = '<i class="bi bi-eye"></i>';
    }

}

function resetPassword(){
    var np = document.getElementById("np").value;
    var rnp = document.getElementById("rnp").value;
    var vc = document.getElementById("vc").value;
    var e = document.getElementById("email1").value;

    var f = new FormData;
    f.append('np' , np);
    f.append('rnp', rnp);
    f.append('vc' , vc);
    f.append('e'  , e);

    var r = new XMLHttpRequest;
    r.onreadystatechange = function(){
        if (r.status==200 && r.readyState==4) {
            var t = r.responseText;
            if(t=="success"){
                window.location="index.php";
            }
        }
    }

    r.open("POST" , "passwordReset.php" ,true);
    r.send(f);
}

function signOut(){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                // window.location.reload();
                window.location = "index.php";

            }else{
                alert (t);
            }
        }
    }

    r.open("GET","signoutProcess.php",true);
    r.send();
    
}


var newmodal;
var num;
document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv1");

    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);

    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);

});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv2");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv3");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv4");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv5");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv6");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-1 border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv7");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom"; 
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

document.addEventListener("DOMContentLoaded", function() {
    
    const myDiv = document.getElementById("myDiv8");
    


    // Function to be executed when the mouse enters the <div>
    function handleMouseEnter() { 
        myDiv.classList="col-1 border-1  border-top border-start border-end text-center";
    }

    // Function to be executed when the mouse leaves the <div>
    function handleMouseLeave() {
        myDiv.classList="col-1 text-center border-bottom";
    }

    // Add a mouseenter event listener to the <div>
    myDiv.addEventListener("mouseenter", handleMouseEnter);
    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});

function clicking(item_id){

    if (item_id == 0){

    }else{
        const currentDate = new Date();
        const expirationDate = new Date(currentDate.getTime() + 30 * 24 * 60 * 60 * 1000);
        const expirationDateString = expirationDate.toUTCString();
        
        document.cookie = "item"+item_id +"expires=${expirationDateString}; path=/";
        var r = new XMLHttpRequest;
    
        r.onreadystatechange = function() {
            if(r.status == 200 && r.readyState == 4){
                var t = r.responseText;

            }
        }
    
        r.open("GET","clicking.php?click="+item_id,true);
        r.send();
    }
}