<?php
// dashboard.php
session_start();

if (!isset($_SESSION['auth'])) {
    die("Not logged in!");
}

function make_encrypted_hint($plain) {
    // ROT13
    $rot = str_rot13($plain);
    // Base64
    return base64_encode($rot);
}

$hint_message = "Visit backup_login.php but you'll need a key to get in, here it is: letmein";
$hint = make_encrypted_hint($hint_message);

// Capture the content depending on user
if ($_SESSION['auth'] === "admin") {
    $title = "Welcome Admin!";
    $body  = "<p>Flag 1: <b>flag{br0k3n_4uth3nt1c4t10n_15_345y}</b></p>
              <p>There is a hint to find the next flag somewhere here.</p>";
    // Embed the encrypted hint invisibly in source
    $extra = "<!-- Encrypted hint: $hint -->";
} else {
    $title = "Welcome User!";
    $body  = "<p>No flags for you!</p>";
    $extra = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <style>
    body { font-family: system-ui, Arial, sans-serif; background:#0f1220; color:#e9ecf1; margin:0; }
    .wrap { max-width: 800px; margin: 8vh auto; padding: 24px; }
    .card { background:#171a2b; border:1px solid #2a2f4a; border-radius:16px; padding:24px; box-shadow: 0 10px 30px rgba(0,0,0,.25); }
    h2 { margin-top:0; }
    p { line-height:1.6; }
    a { color:#4d57ff; text-decoration:none; }
    a:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <h2><?= $title ?></h2>
      <?= $body ?>
      <p style="margin-top:16px;font-size:.9em;opacity:.8;">
        <a href="login.php">Log out</a>
      </p>
    </div>
  </div>
  <?= $extra ?>
</body>
</html>
