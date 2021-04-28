$(document).ready(function () {
    $("#creden").keyup(function () {
        check_pass();
    });
});

function check_pass() {
    var val = document.getElementById("creden").value;
    var pass_type = document.getElementById("pass_type");
    var no = 0;
    if (val != "") {
        // If the password length is less than or equal to 6
        if (val.length <= 6) no = 1;

        // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
        if (val.length > 6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;

        // If the password length is greater than 6 and contain alphabet,number,special character respectively
        if (val.length > 6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,,?,_,~,-,(,)]/)))) no = 3;

        // If the password length is greater than 6 and must contain alphabets,numbers and special characters
        if (val.length > 6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;

        if (no == 1) {
            pass_type.style.color = "red";
            document.getElementById("pass_type").innerHTML = "Very Weak";
        }

        if (no == 2) {
            pass_type.style.color = "#F5BCA9";
            document.getElementById("pass_type").innerHTML = "Weak";
        }

        if (no == 3) {
            pass_type.style.color = "#FF8000";
            document.getElementById("pass_type").innerHTML = "Good";
        }

        if (no == 4) {
            pass_type.style.color = "#05DA0E";
            document.getElementById("pass_type").innerHTML = "Strong";
        }
    }

    else {
        pass_type.style.color = "red";
        document.getElementById("pass_type").innerHTML = "Enter Password";
    }
}

function validateEmail(emailField){
    var email=document.getElementById("email").value;
    var res=email.includes("bmsce.ac.in");
    var email_type = document.getElementById("email_type");
    if(res)
    {
        pass_type.style.color = "#05DA0E";
        document.getElementById("email_type").innerHTML = "Valid Email";
        return true;
    }
    if(!res)
    {
        pass_type.style.color = "red";
        document.getElementById("email_type").innerHTML = "Please enter college email ID";
        return false;
    }
    

}