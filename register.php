<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}
.container {
    background-color: #fff;
    padding: 25px 35px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}
h2 { text-align: center; margin-bottom: 20px; }
input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}
button:hover { background-color: #45a049; }
.link { text-align: center; margin-top: 15px; }
.link a { color: #4CAF50; text-decoration: none; }
@media (max-width: 480px) {
    .container { padding: 20px; }
    button { font-size: 14px; padding: 10px; }
}
</style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <form id="registerForm">
        <input type="text" id="name" placeholder="Full Name" required>
        <input type="email" id="email" placeholder="Email" required>
        <input type="password" id="password" placeholder="Password" required>
        <input type="tel" id="phone" placeholder="Phone Number" required>
        <input type="text" id="location" placeholder="Location" required>
        <button type="submit">Register</button>
    </form>
    <div class="link">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const location = document.getElementById('location').value.trim();

    // Name validation: only letters and spaces, min 3 characters
    if (!/^[A-Za-z\s]{3,}$/.test(name)) {
        alert("Please enter a valid name (only letters, min 3 characters).");
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    // Password validation: at least 6 characters, must contain at least 1 number
    if (!/^(?=.*[0-9]).{6,}$/.test(password)) {
        alert("Password must be at least 6 characters long and include at least 1 number.");
        return;
    }

    // Phone validation: exactly 10 digits
    if (!/^\d{10}$/.test(phone)) {
        alert("Phone number must be exactly 10 digits.");
        return;
    }

    // Location validation: only letters and spaces, min 2 characters
    if (!/^[A-Za-z\s]{2,}$/.test(location)) {
        alert("Please enter a valid location (letters only, min 2 characters).");
        return;
    }

    // Check if email already registered
    if(localStorage.getItem(email)) {
        alert("Email already registered! Please login.");
        window.location.href = "login.php";
        return;
    }

    // Store user in localStorage
    const user = { name, email, password, phone, location };
    localStorage.setItem(email, JSON.stringify(user));
    alert("Registration successful! Redirecting to login...");
    window.location.href = "login.php";
});
</script>

</body>
</html>
