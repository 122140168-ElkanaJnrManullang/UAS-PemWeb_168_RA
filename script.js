document
  .getElementById("registerForm")
  .addEventListener("submit", function (e) {
    e.preventDefault(); 

    clearErrors();

    const name = document.getElementById("name").value.trim();
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const terms = document.getElementById("terms").checked;

    let valid = true;

    // Validasi Nama
    if (name === "") {
      showError("nameError", "Name is required.");
      valid = false;
    }

    // Validasi Username
    if (username === "") {
      showError("usernameError", "Username is required.");
      valid = false;
    }

    // Validasi Email
    if (!email.includes("@") || !email.includes(".")) {
      showError("emailError", "Please enter a valid email format.");
      valid = false;
    }

    // Validasi Password
    if (password.length < 8) {
      showError("passwordError", "Password must be at least 8 characters.");
      valid = false;
    }

    // Validasi Confirm Password
    if (password !== confirmPassword) {
      showError("confirmPasswordError", "Passwords do not match.");
      valid = false;
    }

    // Validasi Term of Service
    if (!terms) {
      showError("termsError", "You must agree to the terms of service.");
      valid = false;
    }

    if (valid) {
      alert("Registration successful!"); 
      this.submit(); // Submit form
    }
  });

function showError(id, message) {
  document.getElementById(id).textContent = message;
}

function clearErrors() {
  const errorElements = document.querySelectorAll(".error-message");
  errorElements.forEach((element) => {
    element.textContent = ""; 
  });
}
