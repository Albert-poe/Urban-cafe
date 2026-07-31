 const form = document.getElementById("registerForm");

 form.addEventListener("submit", function(event){

     let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm_password").value;

     if(username === ""){
        alert("Username cannot be empty.");
        event.preventDefault();
        return false;
    }

     if(username.length < 4){
        alert("Username must be at least 4 characters.");
        event.preventDefault();
        return;
    }

     let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email)){
        alert("Please enter a valid email address.");
        event.preventDefault();
        return;
    }

     if(password.length < 8){
        alert("Password must be at least 8 characters.");
        event.preventDefault();
        return;
    }

     if(password !== confirmPassword){
        alert("Passwords do not match.");
        event.preventDefault();
        return;
    }

});