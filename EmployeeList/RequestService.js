var data = {"name": "", "age": 0, "id": 0, "message": ""};

function addUser(){
    var formArray = [];
    formArray = $("#addEmployeeForm").serializeArray();
    var name = formArray[0]["value"];
    data["name"] = name;
    var age = formArray[1]["value"];
    data["age"] = age;
    data["message"] = "add";
    var results = $.post("EmployeeListController.php", data, function(response){
        ViewModel.displayData();
    }).fail(function(err){
        console.log("failure");
        console.log(err);
    });
}

function updateUser(){
    var formArray = [];
    formArray = $("#updateUserForm").serializeArray();
    var name = formArray[0]["value"];
    data["name"] = name;
    var age = formArray[1]["value"];
    data["age"] = age;
    data["message"] = "update";
    var results = $.post("EmployeeListController.php", data, function(response){
        ViewModel.displayData();
    }).fail(function(err){
        console.log("failure");
        console.log(err);
    });
}

function deleteUser(employeeId){
    data["id"] = employeeId;
    data["message"] = "delete";
    var results = $.post("EmployeeListController.php", data, function(response){
        ViewModel.displayData();
    }).fail(function(err){
        console.log("failure");
        console.log(err);
    });
}

$(document).ready(function(){
    ViewModel.addDataToScreen();
    $('#addEmployeeB').on("click", ViewModel.showForm);
    $('#addEmployeeS').on("click", addUser);
    $('#addEmployeeS').on("click", ViewModel.showForm);
    $('#updateEmployeeS').on("click", updateUser);
    $('#updateEmployeeS').on("click", ViewModel.showForm);
});