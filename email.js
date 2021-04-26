function validateEmail(emailField){
    var email=document.getElementById("email").value;
    var res=email.includes("bmsce.ac.in");
    if(!res)
    {
        document.getElementById("email").innerhtml="";
        validateEmail(emailField);
    }

alert("valid email id");
return true;

}