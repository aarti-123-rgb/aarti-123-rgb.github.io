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
<title>Technocrat Admin Dashboard</title>
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
  
  /* Floating circles */
  .floating-circles {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    pointer-events: none;
    z-index: 0;
  }
  .circle {
    position: absolute;
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
    opacity: 0.4;
  }
  .circle:nth-child(1) {
    width: 180px; height: 180px;
    top: 15%; left: 10%;
    background: #ff6384;
  }
  .circle:nth-child(2) {
    width: 120px; height: 120px;
    top: 50%; left: 75%;
    background: #4286f4;
  }
  .circle:nth-child(3) {
    width: 100px; height: 100px;
    top: 80%; left: 35%;
    background: #fff566;
  }
  @keyframes float {
    0%   { transform: translateY(0) rotate(0deg); }
    50%  { transform: translateY(-25px) rotate(180deg); }
    100% { transform: translateY(0) rotate(360deg); }
  }
  
  /* Layout */
  .container {
    display: flex;
    height: 100vh;
    position: relative;
    z-index: 10;
  }
  
  /* Sidebar */
  nav.sidebar {
    width: 250px;
    background-color: rgba(0,0,0,0.5);
    backdrop-filter: blur(10px);
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
  }
  nav.sidebar h2 {
    margin-bottom: 40px;
    font-weight: 700;
    font-size: 1.8rem;
    letter-spacing: 2px;
  }
  nav.sidebar a {
    color: #fff;
    text-decoration: none;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 12px;
    font-weight: 600;
    transition: background 0.3s ease;
    display: flex;
    align-items: center;
  }
  nav.sidebar a:hover, nav.sidebar a.active {
    background: #6a11cb;
  }
  nav.sidebar a i {
    margin-right: 12px;
    font-size: 1.3rem;
  }
  
  /* Main content */
  main.content {
    flex-grow: 1;
    padding: 30px 40px;
    overflow-y: auto;
  }
  
  /* Top header */
  header.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
  }
  header.topbar h1 {
    font-weight: 700;
    font-size: 2rem;
    color: #fff;
  }
  header.topbar form.search-form {
    display: flex;
  }
  header.topbar form.search-form input[type="text"] {
    padding: 8px 14px;
    border-radius: 25px 0 0 25px;
    border: none;
    outline: none;
    width: 280px;
  }
  header.topbar form.search-form button {
    padding: 8px 18px;
    border: none;
    border-radius: 0 25px 25px 0;
    background: #6a11cb;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  header.topbar form.search-form button:hover {
    background: #8b3fff;
  }
  
  /* Dashboard cards */
  .cards {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
  }
  .card {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    flex: 1 1 220px;
    padding: 30px 20px;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    text-align: center;
    transition: transform 0.3s ease;
  }
  .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.5);
  }
  .card h3 {
    margin-bottom: 12px;
    font-weight: 700;
    font-size: 1.4rem;
  }
  .card p {
    font-size: 2rem;
    font-weight: 700;
  }
  
  /* Logout button */
  .logout-btn {
    margin-top: auto;
    padding: 10px 0;
  }
  .logout-btn form button {
    width: 100%;
    padding: 12px 0;
    background: #fc5c7d;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    color: white;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .logout-btn form button:hover {
    background: #ff385c;
  }
  
  /* Responsive */
  @media(max-width: 768px) {
    nav.sidebar {
      width: 200px;
      padding: 20px 10px;
    }
    main.content {
      padding: 20px 15px;
    }
    header.topbar h1 {
      font-size: 1.5rem;
    }
    header.topbar form.search-form input[type="text"] {
      width: 180px;
    }
  }
</style>

<!-- For icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

</head>
<body>

<div class="floating-circles">
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
</div>

<div class="container">

  <nav class="sidebar">
    <h2>Technocrat</h2>
    <a href="about.php" class="active"><i class="bi bi-speedometer2"></i>About</a>
    <a href="products.php"><i class="bi bi-box-seam"></i>Products</a>
    <a href="orders.php"><i class="bi bi-bag-check-fill"></i>Orders</a>
    <a href="customers.php"><i class="bi bi-people-fill"></i>Customers</a>
    <a href="setting.php"><i class="bi bi-gear-fill"></i>Setting</a>

    <div class="logout-btn">
      <form action="logout.php" method="post">
        <button type="submit">Logout</button>
      </form>
    </div>
  </nav>

  <main class="content">
    <header class="topbar">
      <h1>📊 Admin Dashboard</h1>
      <form action="search_results.php" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search products..." required />
        <button type="submit">Search</button>
      </form>
    </header>

    <section class="cards">
      <div class="card">
        <h3>Products</h3>
        <p>12</p>
      </div>
      <div class="card">
        <h3>Orders</h3>
        <p>8</p>
      </div>
      <div class="card">
        <h3>Customers</h3>
        <p>5</p>
      </div>
      <div class="card">
        <h3>Settings</h3>
        <p>—</p>
      </div>
    </section>
  </main>

</div>

</body>
</html>
