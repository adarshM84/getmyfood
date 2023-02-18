var masterData = '';
var masterDihList = [];
console.log('hello', masterData);
// function view(imageid) {
//     // console.log("Enter");
//     // console.log(document.getElementById('text1').style.display);
//     // document.getElementById('text1').setAttribute('style', 'display:block !important');
//     //her we take id of card
//     var image1 = document.getElementById(imageid);
//     console.log(image1.getElementsByTagName('h5')[0].style.getPropertyValue("display"));
//     if (image1.getElementsByTagName('h5')[0].style.getPropertyValue("display") == 'block') {
//         image1.getElementsByTagName('h5')[0].setAttribute('style', 'display:none !important');
//     } else {
//         image1.getElementsByTagName('h5')[0].setAttribute('style', 'display:block !important');
//     }
//     if (image1.getElementsByTagName('p')[0].style.getPropertyValue("display") == 'block') {
//         image1.getElementsByTagName('p')[0].setAttribute('style', 'display:none !important');
//     } else {
//         image1.getElementsByTagName('p')[0].setAttribute('style', 'display:block !important');
//     }
//     // image1.getElementsByTagName('p')[0].setAttribute('style', 'display:block !important');
//     if (image1.getElementsByTagName('a')[0].style.getPropertyValue("display") == 'block') {
//         image1.getElementsByTagName('a')[0].setAttribute('style', 'display:none !important');
//     } else {
//         image1.getElementsByTagName('a')[0].setAttribute('style', 'display:block !important', 'margin-top: 83px;');
//     }

// }
/* <script> */
function confirmlogin() {
    var loginValue = document.getElementById("loginId").innerText;
    if (loginValue != 'Login') {
        window.location.href = "viewProfile.php";
    } else {
        window.location.href = "loginmessage.php";
    }
}
// </script>
function saveOrder(foodId) {
    window.location.href = "order.php?id=" + foodId;
}
function validEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.match(mailformat)) {
        return true;
    }
    else {
        return false;
    }
}
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function saveData() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("Email").value;
    let address = document.getElementById("address").value;
    let number = document.getElementById("mobile").value;
    var pass = document.getElementById("pass").value;
    console.log(pass);
    if (name == '') {
        document.getElementById("errormessage").innerHTML = "Name Can Not Be Blank.";
        document.getElementById("name").style.backgroundColor = "#ff8080";
        return;
    } else {
        document.getElementById("name").style.background = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (email == '') {
        document.getElementById("errormessage").innerHTML = "Email Can Not Be Blank.";
        document.getElementById("Email").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("Email").style.background = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (!validateEmail(email)) {
        document.getElementById("errormessage").innerHTML = "Please Enter Email In Valid Format.";
        document.getElementById("Email").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("Email").style.background = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (number == '') {
        document.getElementById("errormessage").innerHTML = "Mobile Number Can Not Be Blank";
        document.getElementById("mobile").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("mobile").style.background = "";
    }
    if (number.length < 10) {
        document.getElementById("errormessage").innerHTML = "Number Length Can Not Be Less Than 10.";
        document.getElementById("mobile").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("mobile").style.background = "";
    }
    if (number.length > 10) {
        document.getElementById("errormessage").innerHTML = "Number Length Can Not Be Greater Than 10.";
        document.getElementById("mobile").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("mobile").style.background = "";
    }
    if (pass == '') {
        document.getElementById("errormessage").innerHTML = "Password can not be blank.";
        document.getElementById("pass").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("pass").style.background = "";
    }
    if (pass.length < 4) {
        document.getElementById("errormessage").innerHTML = "Password Shoulf Have minimum 4 digit.";
        document.getElementById("pass").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("pass").style.background = "";
    }
    if (address == '') {
        document.getElementById("errormessage").innerHTML = "Address Can Not Be Blank";
        document.getElementById("address").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("address").style.background = "";
    }
    var flag = "Insert";

    document.getElementById("success").innerHTML = "Creating account please wait...";
    // return;
    var currentLocation = window.location.href;
    $.post('data.php', {
        'name': name,
        'flag': flag,
        'email': email,
        'address': address,
        'number': number,
        "pass": pass,
        'page': currentLocation,
    }, function (data) {
        console.log(data);
        document.getElementById("success").innerHTML = "Account successfully created.You will redirect to home page.";
        // alert("Your registration completed.");
        // location.reload("loginmessage.php");
        window.location.href = 'index.php';
    });
}
function checkLogin() {
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

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
        console.log(data);
        if (data.length > 0) {
            document.getElementById("success").innerHTML = "";
            document.getElementById("error").innerHTML = "Invalid Email/Password.";
        } else {
            var audio = document.getElementById("audio");
            audio.play();
            window.location.href = "order.php";
        }
    });
}
function save() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("Email").value.trim();
    let message = document.getElementById("message").value.trim();
    let number = document.getElementById("mobile").value.trim();
    let stateid = document.getElementById("country-state");
    let state = stateid.value.trim();
    let pincode = document.getElementById("pincode").value.trim();
    //  console.log(name,address);
    if (name == '') {
        document.getElementById("errormessage").innerHTML = "Name Can Not Be Blank.";
        document.getElementById("name").style.backgroundColor = "#ff8080";
        return;
    } else {
        document.getElementById("name").style.background = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (email == '') {
        document.getElementById("errormessage").innerHTML = "Email Can Not Be Blank.";
        document.getElementById("Email").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("Email").style.background = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (!validEmail(email)) {
        document.getElementById("errormessage").innerHTML = "Please Enter Email In Valid Format.";
        document.getElementById("Email").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("Email").style.background = "";
        document.getElementById("errormessage").innerHTML = "";
    }
    if (message == '') {
        document.getElementById("errormessage").innerHTML = "Message Can Not Be Blank";
        document.getElementById("message").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("message").style.background = "";
    }
    if (number == '') {
        document.getElementById("errormessage").innerHTML = "Mobile Number Can Not Be Blank";
        document.getElementById("mobile").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("mobile").style.background = "";
    }
    if (number.length < 10) {
        document.getElementById("errormessage").innerHTML = "Number Length Can Not Be Less Than 10.";
        document.getElementById("mobile").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("mobile").style.background = "";
    }
    if (number.length > 10) {
        document.getElementById("errormessage").innerHTML = "Number Length Can Not Be Greater Than 10.";
        document.getElementById("mobile").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("mobile").style.background = "";
    }
    if (state == '') {
        document.getElementById("errormessage").innerHTML = "State Can Not Be Blank.";
        document.getElementById("country-state").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("country-state").style.background = "";
    }
    if (pincode == '') {
        document.getElementById("errormessage").innerHTML = "Pincode Can Not Be Blank.";
        document.getElementById("pincode").style.background = "#ff8080";
        return;
    } else {
        document.getElementById("errormessage").innerHTML = "";
        document.getElementById("pincode").style.background = "";
    }


    document.getElementById("success").innerHTML = "Saving message please wait...";
    document.getElementById('saveContactMessage').disabled = true;
    // alert("Your detail are submited Successfuly.Our Team will contact to you.");
    // var currentLocation = window.location.href;
    // window.location.href = 'data.php?name=' + name + '&email=' + email + '&address=' + address + '&number=' + number + '&state=' + state + "&pin=" + pincode + '&page=' + currentLocation;
    $.post('data.php', {
        'flagSaveReview': 'flagSaveReview',
        'name': name,
        'email': email,
        'message': message,
        'number': number,
        'state': state,
        'pincode': pincode
    }, function (data) {
        console.log("Data", data);
        if (data.trim() == 'true') {
            document.getElementById("success").innerHTML = "Successfully saved.";
            document.getElementById('saveContactMessage').disabled = false;
            document.getElementById("name").value = "";
            document.getElementById("Email").value = "";
            document.getElementById("message").value = "";
            document.getElementById("mobile").value = "";
            document.getElementById("pincode").value = "";
            document.getElementById("country-state").options[0].selected = true;
        }
    })

}

function generatePDF() {
    const element = document.getElementById('invoice');
    var opt = {
        filename: 'foodOrderBill.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    // New Promise-based usage:
    html2pdf(element, opt);
    // html2pdf(excess);
    console.log('Save');
    return true;
}

function loadDishList() {
    document.getElementById("loadingMessageDish").hidden=false;
    document.getElementById("loadingMessageSpecialDish").hidden=false;

    $.post('allQuery.php', {
        'flagForDishList': 'flagForDishList'
    }, function (data) {
        console.log(data.split("%8%"))
        if(data.split("%8%")[3]=="true"){
            document.getElementById("dishListHome").innerHTML=data.split("%8%")[0];
            document.getElementById("specialDishList").innerHTML=data.split("%8%")[2];
            masterDihList=JSON.parse(data.split("%8%")[1]);
            document.getElementById("loadingMessageDish").hidden=true;
            document.getElementById("loadingMessageSpecialDish").hidden=true;

        }else{
            loadDishList();
        }
        // console.log(data);
        
    })
}