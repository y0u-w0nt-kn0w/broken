<?php
// backup_login.php (Easter egg)
$message = "";

if (isset($_GET['key']) && $_GET['key'] === 'letmein') {
    $message = "flag 2: <b>flag{b4ckup_l0g1n_f0und}</b>";
} else {
    $message = "Access Denied!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Backup Login</title>
  <style>
    body { font-family: system-ui, Arial, sans-serif; background:#0f1220; color:#e9ecf1; margin:0; }
    .wrap { max-width: 800px; margin: 8vh auto; padding: 24px; }
    .card { background:#171a2b; border:1px solid #2a2f4a; border-radius:16px; padding:24px; box-shadow: 0 10px 30px rgba(0,0,0,.25); text-align:center; }
    h2 { margin-top:0; }
    p { line-height:1.6; }
    a { color:#4d57ff; text-decoration:none; }
    a:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <h2>Backup Login</h2>
      <p><?= $message ?></p>
      <p style="margin-top:16px;font-size:.9em;opacity:.8;">
        <a href="index.php">Back to Home</a>
      </p>
    </div>
  </div>
</body>
</html>
