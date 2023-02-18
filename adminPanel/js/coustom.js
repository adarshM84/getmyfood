var footerFlag = false;

function filterTable(searchInputId,tableId) {
    var input, filter, table, tr, td, i, cellValue,j;
    input = document.getElementById(searchInputId);
    filter = input.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j=0; j < tr[i].getElementsByTagName("td").length; j++) {
            td = tr[i].getElementsByTagName("td")[j];
            cellValue = td.innerText;
            if (td) {
                cellValue = td.innerText;
                if (cellValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
  }
function showList(divId, anchorId) {
    // console.log(divId, anchorId);
    // console.log(document.getElementById('allProduct'));
    for (var i = 1; i <= 5; i++) {
        document.getElementById('level' + i).setAttribute('class', 'nav-link text-white');
    }
    document.getElementById('level' + anchorId).setAttribute('class', 'nav-link text-white active');

    if (divId == 'home') {
        $("#home").fadeIn("slow");
        $("#ordersList").fadeOut("slow");
        $("#addProduct").fadeOut("slow");
        $("#allProduct").fadeOut("slow");
        $("#allCoustomers").fadeOut("slow");

        document.getElementById('home').hidden = false;
        document.getElementById('ordersList').hidden = true;
        document.getElementById('addProduct').hidden = true;
        document.getElementById('allProduct').hidden = true;
        document.getElementById('allCoustomers').hidden = true;
    }
    else if (divId == 'ordersList') {
        $("#ordersList").fadeIn("slow");
        $("#home").fadeOut("slow");
        $("#addProduct").fadeOut("slow");
        $("#allProduct").fadeOut("slow");
        $("#allCoustomers").fadeOut("slow");

        document.getElementById('ordersList').hidden = false;
        document.getElementById('home').hidden = true;
        document.getElementById('addProduct').hidden = true;
        document.getElementById('allProduct').hidden = true;
        document.getElementById('allCoustomers').hidden = true;
        loadOrderList();
    }
    else if (divId == 'addProduct') {
        $("#addProduct").fadeIn("slow");
        $("#allProduct").fadeOut("slow");
        $("#ordersList").fadeOut("slow");
        $("#home").fadeOut("slow");
        $("#allCoustomers").fadeOut("slow");

        document.getElementById('addProduct').hidden = false;
        document.getElementById('allProduct').hidden = true;
        document.getElementById('ordersList').hidden = true;
        document.getElementById('home').hidden = true;
        document.getElementById('allCoustomers').hidden = true;
    } else if (divId == 'allProduct') {
        $("#allProduct").fadeIn("slow");
        $("#addProduct").fadeOut("slow");
        $("#ordersList").fadeOut("slow");
        $("#home").fadeOut("slow");
        $("#allCoustomers").fadeOut("slow");

        document.getElementById('allProduct').hidden = false;
        document.getElementById('addProduct').hidden = true;
        document.getElementById('ordersList').hidden = true;
        document.getElementById('home').hidden = true;
        document.getElementById('allCoustomers').hidden = true;
        loadDishList();
    }
    else {
        $("#allCoustomers").fadeIn("slow");
        $("#ordersList").fadeOut("slow");
        $("#home").fadeOut("slow");
        $("#addProduct").fadeOut("slow");
        $("#allProduct").fadeOut("slow");

        document.getElementById('allCoustomers').hidden = false;
        document.getElementById('addProduct').hidden = true;
        document.getElementById('allProduct').hidden = true;
        document.getElementById('ordersList').hidden = true;
        document.getElementById('home').hidden = true;
        loadUserList();
    }

}
function removeSpecialcharecter(str) {
    return str.replace(/[^a-zA-Z0-9 ]/g, '');
}

function showFooter() {
    if (!footerFlag) {
        document.getElementById('signOut').setAttribute('class', 'dropdown-menu dropdown-menu-dark text-small shadow show');
        footerFlag = true;
    } else {
        document.getElementById('signOut').setAttribute('class', 'dropdown-menu dropdown-menu-dark text-small shadow');
        footerFlag = false;
    }

}

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function checkLogin() {
    var emailId = document.getElementById("emailId");
    var pass = document.getElementById("pass");
    var emailValue = emailId.value.trim();
    var passValue = pass.value.trim();
    // console.log(emailId.value, pass.value);
    if (emailId.value == "") {
        emailId.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Email can not be blank.";
        return 0;
    } else {
        emailId.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }
    if (!validateEmail(emailId.value)) {
        emailId.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Invalid Email.";
        return 0;
    } else {
        emailId.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }
    if (pass.value == "") {
        pass.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Password Can Not Be Blank.";
        return 0;
    } else {
        pass.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }
    document.getElementById("success").innerHTML = "Please Wait Checking For Credential....";
    $.post('checklogin.php', {
        'emailId': emailValue,
        'pass': passValue,
    }, function (data) {
        // console.log(data);
        if (data.length > 0) {
            document.getElementById("success").innerHTML = "";
            document.getElementById("error").innerHTML = "Invalid Email/Password.";
        } else {
            var audio = document.getElementById("audio");
            audio.play();
            window.location.href = "dashboard.php";
        }
    });
}

function loadDashboardData() {
    document.getElementById("loadingMessageHome").hidden = false;

    $.post('fetchAllData.php', {
        'flagForDashboardData': 'flagForDashboardData'
    }, function (data) {
        document.getElementById('totalOrder').value = data.split(":::")[0];
        document.getElementById('pendingOrder').value = data.split(":::")[1];
        document.getElementById('completedOrder').value = data.split(":::")[2];
        document.getElementById('totalUser').value = data.split(":::")[3];
        document.getElementById("loadingMessageHome").hidden = true;
    });
}

function loadOrderList() {
    document.getElementById("loadingMessageOrderList").hidden = false;
    $.post('fetchAllData.php', {
        'flagForOrderList': 'flagForOrderList'
    }, function (data) {
        document.getElementById("orderListTableBody").innerHTML = data;
        document.getElementById("loadingMessageOrderList").hidden = true;
    });
}

function loadUserList() {
    document.getElementById("loadingMessageCustomer").hidden = false;
    $.post('fetchAllData.php', {
        'flagForUserList': 'flagForUserList'
    }, function (data) {
        document.getElementById("coustomerListTableBody").innerHTML = data;
        document.getElementById("loadingMessageCustomer").hidden = true;
    });
}