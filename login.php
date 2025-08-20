<?php
// login.php
session_start();

$users = [
    "user" => "user",
    "admin" => "admin" // Weak default password
];

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] === $password) {
        // Weak session handling (predictable)
        $_SESSION['auth'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Portal</title>
  <style>
    body { font-family: system-ui, Arial, sans-serif; background:#0f1220; color:#e9ecf1; margin:0; }
    .wrap { max-width: 800px; margin: 8vh auto; padding: 24px; }
    .card { background:#171a2b; border:1px solid #2a2f4a; border-radius:16px; padding:24px; box-shadow: 0 10px 30px rgba(0,0,0,.25); }
    h2 { margin-top:0; }
    .error { color:#ff4d4d; margin-bottom:12px; }
    input {
      width: 100%; padding: 10px; margin: 8px 0; border-radius: 8px; border: 1px solid #2a2f4a;
      background:#0e1120; color:#e9ecf1;
    }
    input:focus { outline:none; border-color:#4d57ff; }
    button {
      width: 100%; padding: 12px; margin-top: 10px; border-radius: 10px;
      border: none; background:#4d57ff; color:#fff; font-weight:600; cursor:pointer;
    }
    button:hover { filter: brightness(1.08); }
    a { color:#4d57ff; text-decoration:none; }
    a:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <h2>Login Portal</h2>
      <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
      <form method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
      <p style="margin-top:14px;font-size:.9em;opacity:.8;">
        Hint: Sometimes its default...
      </p>
    </div>
  </div>
</body>
</html>
