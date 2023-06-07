function validateForm() {
    var email = document.getElementById('email');
    var user = document.getElementById('user');
    var pass = document.getElementById('pass');
    var isOk = true;

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))) {
        email.style.border = "1px solid red";
        isOk = false;
    }
    else {
        email.style.border = "";
    }

    if (user.value == null || !isNaN(user.value)) {
        user.style.border = "1px solid red";
        isOk = false;
    }
    else {
        user.style.border = "";
    }
    
    if (pass.value == "") {
        pass.style.border = "1px solid red";
        isOk = false;
    }
    else {
        pass.style.border = "";
    }
    
    return isOk;
}