<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Summary</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    margin: 0;
    padding: 30px;
}
.container {
    background-color: #fff;
    padding: 25px 35px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 450px;
    box-sizing: border-box;
}
h2 { text-align: center; margin-bottom: 20px; }
input[type="text"], input[type="email"], input[type="tel"] {
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
@media (max-width: 480px) {
    .container { padding: 20px; }
    button { font-size: 14px; padding: 10px; }
}
</style>
</head>
<body>

<div class="container">
    <h2>Order Summary</h2>
    <form id="orderForm">
        <input type="text" id="name" placeholder="Full Name" required>
        <input type="email" id="email" placeholder="Email" required>
        <input type="tel" id="phone" placeholder="Phone Number" required>
        <input type="text" id="products" placeholder="Products Ordered" required>
        <input type="text" id="completed" placeholder="Order Completed (Yes/No)" required>
        <button type="submit">OK</button>
    </form>
</div>

<script>
document.getElementById('orderForm').addEventListener('submit', function(e){
    e.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const products = document.getElementById('products').value.trim();
    const completed = document.getElementById('completed').value.trim();

    // Validation (same style as register page)
    if(!/^[A-Za-z\s]{3,}$/.test(name)) {
        alert("Please enter a valid name (letters only, min 3 characters).");
        return;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }
    if(!/^\d{10}$/.test(phone)) {
        alert("Phone number must be exactly 10 digits.");
        return;
    }
    if(products.length < 2) {
        alert("Please enter at least 2 characters for products ordered.");
        return;
    }
    if(!/^(Yes|No)$/i.test(completed)) {
        alert("Order Completed must be 'Yes' or 'No'.");
        return;
    }

    alert("Thank you, visit again!");
});
</script>

</body>
</html>
