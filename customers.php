<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>👥 Customers</title>

  <style>
    :root {
      --primary: #4f46e5;
      --primary-light: #818cf8;
      --accent: #f43f5e;
      --accent-light: #fb7185;
      --text-dark: #1e293b;
      --bg-light: #f9fafb;
      --white: #ffffff;
      --shadow-dark: rgba(0,0,0,0.1);
    }

    * { box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 40px 20px;
      background: linear-gradient(135deg, #eef2ff, #fdf2f8);
      color: var(--text-dark);
      min-height: 100vh;
      overflow-x: auto;
    }

    h1 {
      text-align: center;
      font-weight: 900;
      font-size: 3rem;
      color: var(--primary);
      margin-bottom: 40px;
      letter-spacing: 3px;
      text-shadow: 2px 2px 5px rgba(79, 70, 229, 0.3);
      animation: fadeInDown 1s ease forwards;
      opacity: 0;
    }

    .table-wrapper {
      max-width: 1150px;
      margin: 0 auto;
      background: var(--white);
      border-radius: 20px;
      box-shadow: 0 10px 30px var(--shadow-dark), 0 4px 15px var(--shadow-dark);
      overflow-x: auto;
      animation: fadeInUp 1s ease 0.5s forwards;
      opacity: 0;
      border: 3px solid transparent;
      background-image: linear-gradient(var(--white), var(--white)),
        radial-gradient(circle at top left, var(--primary-light), var(--accent-light));
      background-origin: border-box;
      background-clip: padding-box, border-box;
    }

    .table-wrapper:hover {
      border-color: var(--primary-light);
      box-shadow: 0 12px 40px rgba(79, 70, 229, 0.3),
                  0 6px 25px rgba(244, 63, 94, 0.3);
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      min-width: 700px;
      font-weight: 600;
    }

    thead tr {
      background: linear-gradient(90deg, var(--primary), var(--accent));
      color: white;
      font-size: 1.1rem;
      letter-spacing: 0.06em;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 18px 22px;
      text-align: left;
      vertical-align: middle;
      white-space: nowrap;
    }

    tbody tr {
      background: #fafafa;
      border-bottom: 1px solid #e2e8f0;
      transition: background-color 0.3s ease, transform 0.25s ease;
      opacity: 0;
      transform: translateY(25px);
      animation: fadeInUp 0.7s forwards;
    }

    tbody tr:hover {
      background: #e0e7ff;
      box-shadow: 0 8px 30px rgba(79, 70, 229, 0.25),
                  0 4px 15px rgba(244, 63, 94, 0.2);
      transform: translateY(-7px) scale(1.03);
      z-index: 2;
    }

    @media (max-width: 900px) {
      body { padding: 30px 12px; }
      .table-wrapper { max-width: 100%; }
      table { min-width: 600px; }
      h1 { font-size: 2.4rem; }
    }

    @media (max-width: 550px) {
      table { min-width: 500px; }
      h1 { font-size: 2rem; }
      th, td { padding: 12px 10px; font-size: 0.9rem; }
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-40px);}
      100% { opacity: 1; transform: translateY(0);}
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(25px);}
      100% { opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

  <h1>👥 Registered Customers</h1>

  <div class="table-wrapper">
    <?php
      $query = "SELECT * FROM user ORDER BY created_at DESC";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Created At</th>
                </tr>
              </thead>";
        echo "<tbody>";
        $delay = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr style='animation-delay: " . (0.5 + $delay * 0.15) . "s'>";
          echo "<td>" . htmlspecialchars($row['id']) . "</td>";
          echo "<td>" . htmlspecialchars($row['username']) . "</td>";
          echo "<td>" . htmlspecialchars($row['email']) . "</td>";
          echo "<td>" . htmlspecialchars($row['password']) . "</td>";
          echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
          echo "</tr>";
          $delay++;
        }
        echo "</tbody></table>";
      } else {
        echo "<p style='text-align:center; padding: 40px; font-size:1.3rem; color:#777;'>No customers found.</p>";
      }
    ?>
  </div>

</body>
</html>
