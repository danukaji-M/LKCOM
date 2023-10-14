function basicSearch(no){
    var text = document.getElementById("searchtext").value;
    var cat = document.getElementById("category").value;
    if(text.trim() === '' && cat != "0" ){
        window.location="basicsearch.php?trigger=true&st="+text+"&cat="+cat+"&no="+no;
    }
    if (text.trim() != '' && cat == "0"){
        window.location="basicsearch.php?trigger=true&st="+text+"&cat="+cat+"&no="+no;
    }
    if(text.trim() != '' && cat !=0){
        window.location="basicsearch.php?trigger=true&st="+text+"&cat="+cat+"&no="+no;
    }if(text.trim() === '' && cat == "0"){
        window.location.href;
    }

}

function mySearchFunction() {
    var text = urlParams.get('st');
    var cat = urlParams.get('cat');
    var no = urlParams.get('no');
    searchstatus = 0;
    if(text.trim() === '' && cat != "0" ){
        searchstatus = 1;
    }
    if (text.trim() != '' && cat == "0"){
        searchstatus = 2;
    }
    if(text.trim() != '' && cat !=0){
        searchstatus = 3;
    }if(text.trim() === '' && cat == "0"){
        window.location.href;
    }
}

const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('trigger') === 'true') {
    mySearchFunction();
}


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




function productclick(item_id){
    
    if(item_id != 0){
        var r = new XMLHttpRequest;
        r.onreadystatechange = function (){
            if (r.readyState ==4 && r.status==200){
                var t = r.responseText;

            }
        }
        r.open('GET', 'clickProductProcess.php?pid='+item_id,true);
        r.send();
    }
}

function brandclick(brand_id){
    if(brand_id != 0){
        var r = new XMLHttpRequest;
        r.onreadystatechange = function (){
            if (r.readyState ==4 && r.status==200){
                var t = r.responseText;
                
            }
        }
        r.open('GET', 'clickBrandProcess.php?bid='+brand_id,true);
        r.send();
    }
}

function catogoryclick(cat_id){
    if(cat_id != 0){
        var r = new XMLHttpRequest;
        r.onreadystatechange = function (){
            if (r.readyState ==4 && r.status==200){
                var t = r.responseText;
            }else{
            }
        }
        r.open('GET', 'clickCategoryProcess.php?cid='+cat_id,true);
        r.send();
    }
}

function changeUserType(){
    var swbutton = document.getElementById("switch");
    window.location='sellerAccopunt.php'
}



function phis(){
    var divrev = document.getElementById("rev");
    var divhis = document.getElementById("his");
    var divcom = document.getElementById("com")
    var viewdiv = document.getElementById("phistry");
    var viewdiv1 = document.getElementById("viewdiv1");
    var viewdiv2 = document.getElementById("viewdiv2");

    divhis.classList = "col-4 border-start border-end border-top bg-primary";
    divrev.classList="col-4 border-start border-end border-top border-bottom";
    divcom.classList="col-4 border-start border-end border-top border-bottom";
    viewdiv1.classList="row d-none"
    viewdiv2.classList="row d-none"
    viewdiv.classList="row mt-5 d-block"
}

function prev(){
    var divrev = document.getElementById("rev");
    var divhis = document.getElementById("his");
    var divcom = document.getElementById("com")
    var viewdiv = document.getElementById("phistry");
    var viewdiv1 = document.getElementById("viewdiv1");
    var viewdiv2 = document.getElementById("viewdiv2");

    divrev.classList="col-4 border-start bg-primary border-end border-top bg-primary";
    divhis.classList="col-4 border-start border-end border-top border-bottom";
    divcom.classList="col-4 border-start border-end border-top border-bottom";

    viewdiv.classList="row d-none"
    viewdiv2.classList="row d-none"
    viewdiv1.classList="row mt-5 d-block"

}

function pcom(){
    var divrev = document.getElementById("rev");
    var divhis = document.getElementById("his");
    var divcom = document.getElementById("com")
    var viewdiv = document.getElementById("phistry");
    var viewdiv1 = document.getElementById("viewdiv1");
    var viewdiv2 = document.getElementById("viewdiv2");

    divrev.classList="col-4 border-start border-end border-top border-bottom";
    divhis.classList="col-4 border-start border-end border-top border-bottom";
    divcom.classList="col-4 border-start bg-primary border-end border-top bg-primary";
    viewdiv.classList="row d-none"
    viewdiv1.classList="row d-none"
    viewdiv2.classList="row mt-5 d-block"
}

var newmodal;
function profilephotoChange(){
    $('#imgModal').modal('show');
}

function save(){
    var imgUpload = document.getElementById("userImage");

    var f = new FormData();
    f.append("img",imgUpload.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                $('#imgModal').modal('hide');
                window.location="userProfile.php";
            }else{
                alert(t);
            }
        }
    }
    r.open("POST", "profilepicUpdate.php",true);
    r.send(f);
}




function changeView(){
    document.getElementById("view2").classList.remove("d-none"); 
    document.getElementById("view1").classList.add("d-none");
}

function changeview(){

    document.getElementById("view2").classList.add("d-none"); 
    document.getElementById("view1").classList.remove("d-none");
}

function adressesUpdate(){
    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var pw = document.getElementById("pw");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pal1 = document.getElementById("pal1");
    var pal2 = document.getElementById("pal2");
    var pcity = document.getElementById("pcity");
    var ppc = document.getElementById("ppc");



    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("pw", pw.value);
    f.append("email", email.value);
    f.append("mobile",mobile.value);
    f.append("pl1", pal1.value);
    f.append("pl2", pal2.value);
    f.append("pc", pcity.value);
    f.append("ppc", ppc.value);


    var r = new XMLHttpRequest ();
    r.onreadystatechange = function(){
        if(r.status==200 && r.readyState ==4){
            var t = r.responseText;
            if(t="success"){
                window.location="userProfile.php";
            }else{
                alert(t);
            }
        }
    }
    r.open("POST", `profileUpdate.php` , true);
    r.send(f);
}

function border(x){

    if(document.getElementById(x).classList == " click "){
        document.getElementById(x).classList.add("clicked")
    }else{
        document.getElementById(x).classList.remove("clicked")
    }

}

function colorSelect(x){

}

function clothSizesView(x){ 
    alert("hi"); 
}

function insertProduct() {
    var t = document.getElementById("title").value;
    var d = document.getElementById("discription").value;
    var image = document.getElementById("image-uploaderm");
    var price = document.getElementById("price").value;
    var dc = document.getElementById("dc").value;
    var doc = document.getElementById("doc").value;
    var cat = document.getElementById("catsel").value;
    var scat = document.getElementById("subcatsel").value;
    var brand = document.getElementById("brandsel").value;
    var qty = document.getElementById("qty").value;
    var col = document.getElementById("clr_id").value;
    var feaures = document.getElementById("specs").value;
    var payment = 0;
    if (document.getElementById("cpay").checked && document.getElementById("cod").checked){
        payment = 1;
    }else if(document.getElementById("cpay").checked){
        payment = 2;
    }else if(document.getElementById("cod").checked){
        payment = 3;
    }

    var f = new FormData();
    f.append('t',t);
    f.append('d',d);
    f.append('price',price);
    f.append('dc',dc);
    f.append('doc',doc);
    f.append('cat',cat);
    f.append('scat',scat);
    f.append('b',brand);
    f.append('qty',qty);
    f.append('c',col);
    f.append('f',feaures);
    f.append('p',payment);
    
    var img_count = image.files.length;
    for (var index = 0; index < img_count; index++) {
        f.append('img'+index, image.files[index])
    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);
}

document.getElementById("image-uploaderm").addEventListener("change", function(event) {
    var image = event.target;
    var img_count = image.files.length;
    for (var index = 0; index < img_count; index++) {
        var imgTagId = "i" + (index ); // Create the ID for the img tag
        var imgTag = document.getElementById(imgTagId); // Get the corresponding img tag
        
        if (imgTag) {
            // Create a URL for the selected image and set it as the src attribute of the img tag
            imgTag.src = URL.createObjectURL(image.files[index]);
        }
    }
});

function sort(id){
    var search = document.getElementById("search");
    var time = 0;
    var qty =0;
    var price = 0;
    var status = 0;

    if(document.getElementById("older").checked){
        time = 1;
    }else if(document.getElementById("new").checked){
        time = 2
    }

    if(document.getElementById("high").checked){
        price = 1;
    }else if(document.getElementById("low").checked){
        price = 2;
    }

    if(document.getElementById("active").checked){
        status = 1;
    }if(document.getElementById("deactive").checked){
        status = 2;
    }

    if(document.getElementById("tomn").checked){
        qty=1;
    }else if(document.getElementById("tomx").checked){
        qty = 2;
    }

    var f = new FormData();
    f.append("text",search.value);
    f.append("qty",qty);
    f.append("price",price);
    f.append("time",time);
    f.append("status",status);
    f.append("page",id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            document.getElementById("sort").innerHTML = t;
        }
    }

    r.open("POST", "sortProcess.php",true);
    r.send(f);
}
function update( num){
    $(document).ready(function(){
        $("#statusOpen"+num).click(function(){
            $("#status-modal").modal('show');
        });
    });
}

function yes(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t= "success"){
                window.location.reload();
            }else{
                alert(t)
            }
        }
    }

    r.open("GET", "statusChangeProcess.php?id="+id,true);
    r.send();
}

function deleteProduct(num){
    $(document).ready(function(){
        $("#deleteOpen"+num).click(function(){
            $("#delete-modal").modal('show');
        });
    });
}

function del(id){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","deleteProcess.php?id="+id,true);
    r.send();
}
var discountId;
function DiscountAdd(num){
    discountId = num;
    $(document).ready(function(){
        $("#discountOpen"+num).click(function(){
            $("#discount-modal").modal('show');
        });
    });
}

function discount(id){
    var disval = document.getElementById("discount").value;
    var r = new XMLHttpRequest;
    r.onreadystatechange = function(){
        if(r.status ==200 && r.readyState ==4){
            var t=r.responseText;
            if(t= "success"){
                window.location.reload();
            } 
        }
    }
    r.open("GET" , "discountProceess.php?id="+discountId+"&dis="+disval,true);
    r.send();
}



function barGraph(){
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
type: "bar",
data: {
    labels: xValues,
    datasets: [{
    backgroundColor: barColors,
    data: yValues
    }]
},
options: {
    legend: {display: false},
    title: {
    display: true,
    text: "World Wine Production 2018"
    }
}
});
}

function lineGraph(){
    const xValues = ["January" ,"February", "March" , "April" , "May" , "June" , "July" , "August" , "September" , "Octomber" ,  "November" , "December"];

new Chart("myChartclick", {
type: "line",
data: {
    labels: xValues,
    datasets: [{ 
    data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478 , 7988 , 4678],
    borderColor: "red",
    fill: false}]
},
options: {
    legend: {display: false},
    text: "World Wine Production 2018"
}
});
}

function singleload(id){

    var r = new XMLHttpRequest;
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState ==4){
            window.location = "singleproductview.php?pid="+id;
        }
    }
    
    r.open("GET","singleproductView.php?pid="+id,true);
    r.send();
}

function addtocart(id){
    var r = new XMLHttpRequest;
    var qty = document.getElementById("qtysingle1");
    r.onreadystatechange = function () {
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            alert(t);
        }
    }
    r.open("GET","addtoCartProcess.php?pid="+id+"&qty="+qty.value,true);
    r.send();
}


function removeCart(id){
    var r = new XMLHttpRequest;
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","cartDelete.php?pid="+id,true);
    r.send();
}

function buyNow(id){
    var r = new XMLHttpRequest;
    var f = new FormData;
    f.append("id",id);
    if((document.getElementById("qtysingle1"))=== null){
        qty = 1
        f.append("qty",qty);
    }else{
        var qty = document.getElementById("qtysingle1").value;
        f.append("qty",qty);
    }


    
    r.onreadystatechange = function(){
        if (r.status==200 && r.readyState==4){
            var t = r.responseText;
            if (t=="You cant buy your product") {
                alert(t);
            }else if(t=="Address Error"){
                alert(t);
            }else{
                var obj = JSON.parse(t);

                var umail = obj["umail"];
                var amount = obj["amount"];
    
                if (t == "Address Error") {
                    alert("Please Update Your Profile.");
                    window.location = "userProfile.php";
                } else {
    
                    // Payment completed. It can be a successful failure.
                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID:" + orderId);
    
                        window.location = "invoice.php";
                        // Note: validate the payment and show success or failure page to the customer
                    };
    
                    // Payment window closed
                    payhere.onDismissed = function onDismissed() {
                        // Note: Prompt user to pay again or show an error page
                        console.log("Payment dismissed");
                    };
    
                    // Error occurred
                    payhere.onError = function onError(error) {
                        // Note: show an error page
                        console.log("Error:" + error);
                    };
    
                    // Put the payment variables here
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "1223947",    // Replace your Merchant ID
                        "return_url": "http://localhost:8080/lkcom/cart.php?id=" + id,     // Important
                        "cancel_url": "http://localhost:8080/lkcom/cart.php?id=" + id,     // Important
                        "notify_url": "http://sample.com/notify",
                        "order_id": obj["id"],
                        "items": obj["item"],
                        "amount": amount,
                        "currency": "LKR",
                        "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                        "first_name": obj["fname"],
                        "last_name": obj["lname"],
                        "email": umail,
                        "phone": obj["mobile"],
                        "address": obj["address"],
                        "city": obj["city"],
                        "country": "Sri Lanka",
                        "delivery_address": obj["address"],
                        "delivery_city": obj["city"],
                        "delivery_country": "Sri Lanka",
                        "custom_1": "",
                        "custom_2": ""
                    };
    
                    // Show the payhere.js popup, when "PayHere Pay" is clicked
                    // document.getElementById('payhere-payment').onclick = function (e) {
                        payhere.startPayment(payment);
                    // };
    
                }
            }
        }
    }

    r.open("POST","buyProcess.php",true);
    r.send(f);
}
function buyCart(x ){
    alert(x);
}

var selectedValue = 0;
var starRadios = document.querySelectorAll('input[name="stars"]');

// Add a click event listener to each radio button
starRadios.forEach((radio) => {
    radio.addEventListener('click', () => {
        // Get the value of the clicked radio button
        selectedValue = radio.value;
        // You can now use the selectedValue for further processing
    });
});

var selectedValue;

$(document).ready(function () {
    // Get a reference to the select element
    var selectElement = document.getElementById("boughtItem");

    // Add an event listener for the change event
    selectElement.addEventListener("change", function () {
        // Get the selected value
        var selectedValue = selectElement.value;

        // Do something with the selected value (e.g., display it)
    });
});

var stval;
function feedback(){
    if(selectedValue==0){
        stval =0;
    }
    if(selectedValue==1){
        stval = 1;
    }
    if(selectedValue==2){
        stval = 2;
    }
    if(selectedValue==3){
        stval = 3;
    }
    if(selectedValue==4){
        stval = 4;
    }
    if(selectedValue==5){
        stval = 5;
    }
    var text = document.getElementById ("textfb").value;
    var image = document.getElementById("imagefb");
    var f = new FormData;
    f.append("img",image.files[0]);
    f.append("star", stval);
    f.append("text",text);
    f.append("buy_id",selectedValue);
    
    var r = new XMLHttpRequest;
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState==4){
            var t = r.responseText;
            alert(t)
        }
    }

    r.open("POST","feedbackphp.",true);
    r.send(f);
}

// Assuming you have jQuery loaded, you can do this:

function redirrectSeller(email){
    
    const r = new XMLHttpRequest;
    r.onreadystatechange = function() {
        if (r.readyState === 4 && r.status === 200) {
            window.location.href="customerSeeSeller.php"
        }
    }
}


function changeView2(){

    var d2 = document.getElementById ('insert');
    var d3 = document.getElementById ('sellin');
    var d4 = document.getElementById ('customer');
    var d5 = document.getElementById ('withdraw');
    d2.classList="d-block col-12  col-lg-10";
    d3.classList="d-none";
    d4.classList="d-none";
    d5.classList="d-none";
}



function changeView3() {
    var d2 = document.getElementById ('insert');
    var d3 = document.getElementById ('sellin');
    var d4 = document.getElementById ('customer');
    var d5 = document.getElementById ('withdraw');
    d2.classList="d-none";
    d4.classList="d-none";
    d5.classList="d-none";
    d3.classList="d-block col-12  col-lg-10";
}

function changeView4() {
    var d2 = document.getElementById ('insert');
    var d3 = document.getElementById ('sellin');
    var d4 = document.getElementById ('customer');
    var d5 = document.getElementById ('withdraw');
    d2.classList="d-none";
    d3.classList="d-none";
    d5.classList="d-none";
    d4.classList="d-block col-12  col-lg-10";
}

function changeView5() {
    var d2 = document.getElementById ('insert');
    var d3 = document.getElementById ('sellin');
    var d4 = document.getElementById ('customer');
    var d5 = document.getElementById ('withdraw');
    d2.classList="d-none";
    d4.classList="d-none";
    d3.classList="d-none";
    d5.classList="d-block col-12  col-lg-10";
}

var newmodal1;
function withdraw(){
    var tot = document.getElementById('tot').value;
    var r = new XMLHttpRequest;
    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            alert("Successfully Withdrawn");   
        }
    }
    r.open("GET","withdrawveificationProcess.php",true);
    r.send();
}

function loading(x){
    var number = x+16;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "home.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status === 200) {
            
        }
    };
    xhr.send(number);
};


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

    // Add a mouseleave event listener to the <div>
    myDiv.addEventListener("mouseleave", handleMouseLeave);
});