const form = document.getElementById("loginForm");

form.addEventListener("submit", function(event){
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    if(email === ""){
        alert("Email is required.");
        event.preventDefault();
        return;
    }

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email)){
        alert("Invalid email.");
        event.preventDefault();
        return;
    }

    if(password.length < 8){
        alert("Password must be at least 8 characters.");
        event.preventDefault();
        return;
    }

});