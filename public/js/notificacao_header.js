function ajax_notifica(){
    var req = new XMLHttpRequest();
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
            document.getElementById('notificacoes').innerHTML=req.responseText;
        }
    }
    req.open('GET', 'functions_notifica.php', true);
    req.send();
}

setInterval(function(){ajax_notifica();}, 1000);