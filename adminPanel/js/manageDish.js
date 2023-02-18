var imageUpload = 0;
var dishList=[];

function checkOnline() {
    // console.log('checkOnline');
    if (window.navigator.onLine) { } else {
        alert("No Internet connection.Please Check :(");
        return false;
    }
}
function addDish() {
    document.getElementById("addDishBtn").disabled=true;

    var dishName = document.getElementById("dishName");
    var dishPrice = document.getElementById("dishPrice");
    var dishType=document.getElementById("dishType");
    var dishDescription = document.getElementById("dishDescription");
    var dishImage = document.getElementById("dishImage");
    var flagImageUpload = false;
    

    if (dishName.value.trim() == "") {
        dishName.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Dish Name can not be blank.";
        document.getElementById("addDishBtn").disabled=false;
        return 0;
    } else {
        dishName.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }

    if (dishPrice.value.trim().length == 0) {
        dishPrice.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Dish Price can not be blank.";
        document.getElementById("addDishBtn").disabled=false;
        return 0;
    } else {
        dishPrice.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }

    if (dishType.value.trim().length == 0) {
        dishPrice.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Select Dish Type.";
        document.getElementById("addDishBtn").disabled=false;
        return 0;
    } else {
        dishType.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }

    if (dishDescription.value.trim() == "") {
        dishDescription.style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Dish Description Can Not Be Blank.";
        document.getElementById("addDishBtn").disabled=false;
        return 0;
    } else {
        dishDescription.style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
    }
    if (imageUpload != 1) {
        document.getElementById("dishImage").style.backgroundColor = "#ff6666";
        document.getElementById("error").innerHTML = "Please upload dish image...";
        document.getElementById("addDishBtn").disabled=false;
        return 0;
    } else {
        document.getElementById("dishImage").style.backgroundColor = "";
        document.getElementById("error").innerHTML = "";
        flagImageUpload = true;
        dishImage = dishImage.files[0];
    }

    document.getElementById("success").innerHTML = "Addnig New Dish Please Wait....";

    // console.log(dishName.value, dishPrice.value, dishDescription.value, dishImage);

    formData = new FormData();
    formData.append("flagAddProduct", "flagAddProduct");
    formData.append("dishName", dishName.value.trim());
    formData.append("dishPrice", dishPrice.value.trim());
    formData.append("dishDescription", dishDescription.value.trim());
    formData.append("dishImage", dishImage);
    formData.append("dishType", dishType.value.trim());
    formData.append("flagImageUpload", flagImageUpload);

    $.ajax({
        url: "saveProduct.php",
        type: "POST",
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            // console.log(data);
            if (data.trim() == "true") {
                document.getElementById("success").innerHTML = "Dish are successfully added.";
                document.getElementById("dishName").value = "";
                document.getElementById("dishPrice").value = "";
                document.getElementById("dishDescription").value = "";
                document.getElementById("imagePreview").src = "../images/food.png";
                document.getElementById("addDishBtn").disabled=false;
                loadDishList();
            }

        }
    });

    // $.post('saveProducts.php', {
    //     'emailId': emailValue,
    //     'pass': passValue,
    // }, function (data) {
    //     console.log(data);

    // });
}

function loadDishList() {
    document.getElementById("loadingMessage").hidden=false;
    $.post('fetchAllData.php', {
        'flagForDishList': 'flagForDishList'
    }, function (data) {
        // console.log(data,'data');
        var tableData=data.split("%8%")[0];
        dishList=JSON.parse(data.split("%8%")[1]);

        // console.log(tableData,"tableData",dishList,"dishList");
        
        document.getElementById("dishListTableBody").innerHTML = tableData;
        document.getElementById("success").innerHTML="";
        document.getElementById("loadingMessage").hidden=true;
    });
}

function showDish(dishId){
    dishId=dishId-1;
    document.getElementById("modalDishTitle").innerHTML=dishList[dishId].dishName+" ( "+dishList[dishId].dishType+" )";
    document.getElementById("modalDishImage").src="../images/dishImages/"+dishList[dishId].imageName;
    document.getElementById("modalDishPrice").innerHTML="₹ "+dishList[dishId].dishPrice;
    document.getElementById("modalDishDescription").innerHTML=dishList[dishId].dishDescription;
    document.getElementById("modalOpenBtn").click();
}
function closeModal(){
    document.getElementById("closeModalBtn").click();
}