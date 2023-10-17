function sendMsg(email) {
    let msg = document.getElementById("msgBox").value;
    var r = new XMLHttpRequest;
    if(msg.trim() === ""){
        alert("type somrthing")
    }else{
        r.onreadystatechange = function(){
            if(r.readyState == 4 && r.status == 200 ){
                var t = r.responseText;
                if(t == "success"){
                    window.location.reload();
                }
            }
        }
        r.open('GET', '../livechat/chat.php?email='+ email+"&msg="+msg + " ", true);
        r.send();
    }

}
