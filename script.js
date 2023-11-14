function showLogin() {
    document.getElementById("selection").style.display = "none";
    document.getElementById("login").style.display = "block";
    document.getElementById("message").innerHTML = "";
}

function showRegistration() {
    document.getElementById("selection").style.display = "none";
    document.getElementById("registration").style.display = "block";
    document.getElementById("message").innerHTML = "";
}

function goBack() {
    document.getElementById("message").innerHTML = "";
    document.getElementById("login").style.display = "none";
    document.getElementById("registration").style.display = "none";
    document.getElementById("selection").style.display = "block";
    // window.history.back();
}

function validateLogin() {
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;

    if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return false;
    }
    return true;
    // showMessage("Welcome! Login successful!", "green");
    // document.getElementById("login").style.display = "none";
}

function validateRegistration() {
    var username = document.getElementById("regUsername").value;
    var email = document.getElementById("regEmail").value;
    var password = document.getElementById("regPassword").value;
    var confirmPassword = document.getElementById("regConfirmPassword").value;

    if (username === "" || email === "" || password === "" || confirmPassword === "") {
        alert("Please fill in all fields.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    if (!validateEmail(email)) {
        alert("Invalid email format.");
        return false;
    }
    // showMessage("Welcome " + username + "! Registration successful!", "green");
    return true;

    // document.getElementById("registration").style.display = "none";
}

function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showMessage(message, color = "red") {
    $("#message").text(message).css("color", color);
}