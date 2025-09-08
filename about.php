<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About - Technocrat</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #6e8efb, #a777e3, #fc5c7d, #6a11cb);
      background-size: 600% 600%;
      animation: gradientMove 20s ease infinite;
      color: white;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      max-width: 1000px;
      margin: 60px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.04);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      font-weight: 700;
      border-bottom: 2px solid rgba(255,255,255,0.3);
      padding-bottom: 10px;
    }

    p {
      font-size: 1.1rem;
      line-height: 1.7;
      margin-bottom: 15px;
    }

    .info-box {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      gap: 25px;
    }

    .box {
      flex: 1 1 250px;
      padding: 20px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      color: #fff;
      font-weight: 500;
      transition: transform 0.3s ease;
    }

    .box:hover {
      transform: translateY(-8px);
    }

    .box i {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    /* 🎨 Custom Colors for Each Box */
    .developer-box {
      background: #ff6b81;
    }
    .tech-box {
      background: #3498db;
    }
    .purpose-box {
      background: #f1c40f;
      color: #000;
    }

    .back-link {
      margin-top: 30px;
      display: inline-block;
      background: #6a11cb;
      color: white;
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .back-link:hover {
      background: #8b3fff;
    }

    @media (max-width: 768px) {
      .container {
        margin: 20px;
        padding: 20px;
      }

      h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>About Technocrat</h1>
    <p><strong>Technocrat Admin Dashboard</strong> is a user-friendly and modern web interface designed to simplify management of e-commerce products, orders, customers, and settings.</p>

    <div class="info-box">
      <div class="box developer-box">
        <i class="bi bi-person-fill"></i>
        <h3>Developer</h3>
        <p>Aarti Yadav<br>Email: aartitejli@gmail.com</p>
      </div>
      <div class="box tech-box">
        <i class="bi bi-tools"></i>
        <h3>Technologies</h3>
        <p>HTML, CSS, PHP, MySQL, Bootstrap Icons</p>
      </div>
      <div class="box purpose-box">
        <i class="bi bi-bullseye"></i>
        <h3>Purpose</h3>
        <p>To provide a clean and efficient admin panel for business management.</p>
      </div>
    </div>

    <a href="dashboard2.php" class="back-link"><i class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
  </div>

</body>
</html>
