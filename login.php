<?php
session_start();

// Jika sudah login, redirect ke index
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Inventory</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
    form { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    input, button { padding: 10px; width: 100%; margin: 10px 0; }
    h2 { text-align: center; }
  </style>
</head>
<body>
  <form method="POST" action="proses_login.php">
    
    <h2>Login Sistem Inventory</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <?php if (isset($_GET['msg'])): ?>
      <p style="color:red; text-align:center;"><?= htmlspecialchars($_GET['msg']) ?></p>
    <?php endif; ?>
  </form>
</body>
</html>
