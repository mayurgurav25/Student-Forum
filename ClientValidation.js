function validate() {
    var email = $("#username").val();
    var pass = $("#password").val();


    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var password_regex1 = /([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])|([!,%,&,@,#,$,^,*,?,_,~])/;
    var password_regex2 = /([0-9])/;
    var password_regex3 = /([!,%,&,@,#,$,^,*,?,_,~])/;

    if (email_regex.test(email) == false) {
        alert("Please Enter Correct Email");
        return false;
    } else if (pass.length < 8 || password_regex1.test(pass) == false || password_regex2.test(pass) == false || password_regex3.test(pass) == false) {
        alert("Password Must Be At Least 8 Digits Long And Contains One UpperCase, One LowerCase And One Special Character Password");
        return false;
    } else {
        return true;
    }
}

function validateregister() {
    var email = $("#username").val();
    var pass = $("#password").val();
    var fullname = $("#fullname").val();
    var year = $("#year").val();
    var department = $("#department").val();
    var who = $("#who").val();
    var doc = $("#doc").val();
    var document = $("#document").val();
    var profile = $("#profile").val();
    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var password_regex1 = /([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])|([!,%,&,@,#,$,^,*,?,_,~])/;
    var password_regex2 = /([0-9])/;
    var password_regex3 = /([!,%,&,@,#,$,^,*,?,_,~])/;
    if (fullname == "") {
        alert("Please Enter Your Name");
        return false;
    } else if (year == "") {
        alert("Please Select Year");
        return false;
    } else if (department == "") {
        alert("Please Select Department");
        return false;
    } else if (who == "") {
        alert("Please Select Who you are");
        return false;
    } else if (email_regex.test(email) == false) {
        alert("Please Enter Correct Email");
        return false;
    } else if (pass.length < 8 || password_regex1.test(pass) == false || password_regex2.test(pass) == false || password_regex3.test(pass) == false) {
        alert("Password Must Be At Least 8 Digits Long And Contains One UpperCase, One LowerCase And One Special Character Password");
        return false;
    } else if (doc == "") {
        alert("Please Select valid document name");
        return false;
    } else if (profile == "") {
        alert("Please Upload Image for your profile picture");
        return false;
    } else if (document == "") {
        alert("Please upload valid Document for verification");
        return false;
    } else {
        return true;
    }
}