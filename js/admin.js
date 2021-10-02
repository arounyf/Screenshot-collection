//管理界面js


function down(){
  window.open("function/d.php", "_self");
}

function fastdown(){
  window.open("function/fastd.php", "_self");
}


 function del() { 
    var obj = new XMLHttpRequest(); 
    obj.onreadystatechange = function() { 
      if (obj.status == 200 && obj.readyState == 4) { 
        document.getElementById('con').innerHTML = obj.responseText; 
      } 
    } 
    obj.open("post", "function/delete.php"); 
    obj.send(); 

} 

function loginout(){
  window.open("function/clear.php", "_self");
}


function doption() { 
    var obj = new XMLHttpRequest(); 
    obj.onreadystatechange = function() { 
      if (obj.status == 200 && obj.readyState == 4) { 
        document.getElementById('con').innerHTML = obj.responseText; 
      } 
    } 
    var xm = document.getElementById('xm').value; 
    if (xm == ""){
        alert("未填写字段");
    }else{
        var fd = new FormData(); 
        fd.append('xm', xm); 
        obj.open("post", "function/doption.php"); 
        obj.send(fd); 
    }
   

  } 