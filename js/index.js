function showNav(){
    if(document.getElementById("myNav").hidden==false){
        document.getElementById("myNav").hidden=true;
    }else{
        document.getElementById("myNav").hidden=false;
        document.getElementById("myNav").setAttribute("style","position: fixed;top: 100px;left: 80px;z-index:2;background-color:white;border-radius: 10px;");
    }

}


function saveTask() {
    var userName = document.getElementById("name").value;
    var date = document.getElementById("taskDate").value;
    var task = document.getElementById("task").value;

    if (userName == "") {
        document.getElementById("name").style.backgroundColor = "#ff6666";
        document.getElementById("errormessage").innerHTML = "Name Can Not Be Blank.Please Correct It..";
        return;
    } else {
        document.getElementById("name").style.backgroundColor = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (date == "") {
        document.getElementById("taskDate").style.backgroundColor = "#ff6666";
        document.getElementById("errormessage").innerHTML = "Date Can Not Be Blank.Please Correct It..";
        return;
    } else {
        document.getElementById("taskDate").style.backgroundColor = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (task == "") {
        document.getElementById("task").style.backgroundColor = "#ff6666";
        document.getElementById("errormessage").innerHTML = "Task Can Not Be Blank.Please Correct It..";
        return;
    } else {
        document.getElementById("task").style.backgroundColor = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    var taskId=document.getElementById('name').name;
    console.log(taskId);

    document.getElementById("success").innerHTML = "Adding Task Please Wait..";
    $.post('allQuery.php', {
        "saveFlag": "SAVE",
        'taskId':taskId,
        "name": userName,
        "taskDate": date,
        "task": task
    }, function (data) {
        // console.log(data);
        document.getElementById("success").innerHTML = "Task Added.Page will refresh please wait..";
        location.reload();
    });
}