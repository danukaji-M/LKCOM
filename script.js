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
            if(t == "success"){
                var newmodal = document.getElementById("forgotPasswordModal");
                togmodal = new bootstrap.Modal(newmodal);
                togmodal.show();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET" , "verificationSend.php?e="+email.value , true);
    r.send();
    
}

function resetPassword(){
    
    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var f = new FormData();
    f.append("e",email.value);
    f.append("np",np.value);
    f.append("rnp",rnp.value);
    f.append("vc",vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                bm.hide();
                alert ("Your password has been updated.");
                window.location.reload();

            }else{
                alert (t);
            }
        }
    }

    r.open("POST","passwordReset.php",true);
    r.send(f);
    
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