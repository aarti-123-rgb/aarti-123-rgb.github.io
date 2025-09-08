<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Technocrat Settings</title>
<style>
  /* Reset & base */
  * {
    margin: 0; padding: 0; box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  body, html {
    height: 100%;
    background: linear-gradient(135deg, #6e8efb, #a777e3, #fc5c7d, #6a11cb);
    background-size: 600% 600%;
    animation: gradientMove 15s ease infinite;
    overflow-x: hidden;
    color: #fff;
  }
  @keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  /* Container & Layout */
  .container {
    max-width: 900px;
    margin: 60px auto;
    background: rgba(0,0,0,0.5);
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.4);
  }
  
  h2 {
    margin-bottom: 25px;
    font-weight: 700;
    font-size: 2rem;
    border-bottom: 2px solid #fc5c7d;
    padding-bottom: 10px;
  }
  
  form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  
  label {
    font-weight: 600;
    margin-bottom: 6px;
    font-size: 1rem;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="password"],
  select {
    padding: 10px 15px;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 1rem;
  }

  input[type="checkbox"] {
    width: 18px;
    height: 18px;
  }

  .checkbox-group {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  
  button {
    width: 180px;
    padding: 12px 0;
    border: none;
    border-radius: 25px;
    background: #fc5c7d;
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  button:hover {
    background: #ff385c;
  }
  
  /* Responsive */
  @media (max-width: 600px) {
    .container {
      margin: 30px 20px;
      padding: 20px;
    }
    button {
      width: 100%;
    }
  }
</style>
</head>
<body>

<div class="container">
  <h2>Settings</h2>
  <form action="update_settings.php" method="POST">
    
    <!-- Username -->
    <div>
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly />
    </div>
    
    <!-- Email -->
    <div>
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required />
    </div>

    <!-- Password change -->
    <div>
      <label for="current_password">Current Password</label>
      <input type="password" id="current_password" name="current_password" placeholder="Enter current password" required />
    </div>

    <div>
      <label for="new_password">New Password</label>
      <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required />
    </div>

    <div>
      <label for="confirm_password">Confirm New Password</label>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required />
    </div>
    
    <!-- Notification preferences -->
    <div>
      <label>Notification Preferences</label>
      <div class="checkbox-group">
        <input type="checkbox" id="email_notifications" name="notifications[]" value="email" checked />
        <label for="email_notifications">Email Notifications</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="sms_notifications" name="notifications[]" value="sms" />
        <label for="sms_notifications">SMS Notifications</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="push_notifications" name="notifications[]" value="push" />
        <label for="push_notifications">Push Notifications</label>
      </div>
    </div>

    <button type="submit">Update Settings</button>
  </form>
</div>

</body>
</html>
