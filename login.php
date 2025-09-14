<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
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
input[type="email"], input[type="password"] {
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
    <h2>Login</h2>
    <form id="loginForm">
        <input type="email" id="email" placeholder="Email" required>
        <input type="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <div class="link">
        <p>New user? <a href="register.php">Register here</a></p>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    // Removed validation checks

    const user = JSON.parse(localStorage.getItem(email));
    if(user && user.password === password) {
        alert(`Login successful!\nWelcome ${user.name}\nEmail: ${user.email}\nPhone: ${user.phone}\nLocation: ${user.location}`);
        window.location.href = "index.php";  // ✅ Redirect added here
    } else {
        alert("Invalid email or password! If new, please register.");
        window.location.href = "register.php";
    }
});
</script>

</body>
</html>
