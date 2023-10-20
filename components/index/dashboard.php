<?php

$conn =  mysqli_connect("localhost", "root", "", "hotelbooking", 3306);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();

if(!isset($_SESSION['admin_name'])) {
 header('location:../../index.php');
}


// Fetch data from the database
$select_query = "SELECT * FROM alamein_booking";
$result = mysqli_query($conn, $select_query);

// Fetch data from the database
$select_query2 = "SELECT * FROM atlantis_booking";
$result2 = mysqli_query($conn, $select_query2);

// Fetch data from the database
$select_query3 = "SELECT * FROM hurghada_booking";
$result3 = mysqli_query($conn, $select_query3);

// Fetch data from the database
$select_query4 = "SELECT * FROM jumeirah_booking";
$result4 = mysqli_query($conn, $select_query4);

?>

<!DOCTYPE html>
<html>
  <?php include '../templates/navbar.php';?>
  <section class="dashboard">
<head>
    <title>Reservation Data Viewer</title>
    <style>
      * {
        background-image: #8c7343
      }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            background-color:
        }

        th {
            background-color: #8c7343;
            color: white
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | YYA Hotels</title>
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="rooms.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../cities/citiess.css?v=<?php echo time(); ?>">
  <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <section>
    <h1>Alamein Reservation Data</h1>
    <table id="table1">
        <thead>
            <tr>
                <th>Room</th>
                <th>Number of Guests</th> <!-- Updated column name -->
                <th>Arrivals</th>
                <th>Leaving</th>
                <th>User</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the fetched data and generate table rows
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["room"] . "</td>";
                    echo "<td>" . $row["guests"] . "</td>";
                    echo "<td>" . $row["arrivals"] . "</td>";
                    echo "<td>" . $row["leaving"] . "</td>";
                    echo "<td>" . $row["user"] . "</td>";
                    echo "<td>" . $row["number"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button onclick="clearTable1()">Clear Table</button>
    </div>
  </section>
    <section>
    <h1>Atlantis Reservation Data</h1>
    <table id="table1">
        <thead>
            <tr>
                <th>Room</th>
                <th>Number of Guests</th> <!-- Updated column name -->
                <th>Arrivals</th>
                <th>Leaving</th>
                <th>User</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the fetched data and generate table rows
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>" . $row["room"] . "</td>";
                    echo "<td>" . $row["guests"] . "</td>";
                    echo "<td>" . $row["arrivals"] . "</td>";
                    echo "<td>" . $row["leaving"] . "</td>";
                    echo "<td>" . $row["user"] . "</td>";
                    echo "<td>" . $row["number"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button onclick="clearTable1()">Clear Table</button>
    </div>
  </section>
  <section>
    <h1>Hurghada Reservation Data</h1>
    <table id="table2">
        <thead>
            <tr>
                <th>Room</th>
                <th>Number of Guests</th> <!-- Updated column name -->
                <th>Arrivals</th>
                <th>Leaving</th>
                <th>User</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the fetched data and generate table rows
            if ($result3 && mysqli_num_rows($result3) > 0) {
                while ($row = mysqli_fetch_assoc($result3)) {
                    echo "<tr>";
                    echo "<td>" . $row["room"] . "</td>";
                    echo "<td>" . $row["guests"] . "</td>";
                    echo "<td>" . $row["arrivals"] . "</td>";
                    echo "<td>" . $row["leaving"] . "</td>";
                    echo "<td>" . $row["user"] . "</td>";
                    echo "<td>" . $row["number"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button onclick="clearTable3()">Clear Table</button>
    </div>
  </section>
  <section>
    <h1>Jumeirah Reservation Data</h1>
    <table id="table4">
        <thead>
            <tr>
                <th>Room</th>
                <th>Number of Guests</th> <!-- Updated column name -->
                <th>Arrivals</th>
                <th>Leaving</th>
                <th>User</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the fetched data and generate table rows
            if ($result4 && mysqli_num_rows($result4) > 0) {
                while ($row = mysqli_fetch_assoc($result4)) {
                    echo "<tr>";
                    echo "<td>" . $row["room"] . "</td>";
                    echo "<td>" . $row["guests"] . "</td>";
                    echo "<td>" . $row["arrivals"] . "</td>";
                    echo "<td>" . $row["leaving"] . "</td>";
                    echo "<td>" . $row["user"] . "</td>";
                    echo "<td>" . $row["number"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button onclick="clearTable4()">Clear Table</button>
    </div>
  </section>

  <script>
function clearTable1() {
  var table = document.getElementById('table1');
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
}

function clearTable2() {
  var table = document.getElementById('table2');
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
}

function clearTable3() {
  var table = document.getElementById('table2');
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
}

function clearTable4() {
  var table = document.getElementById('table2');
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
}
</script>
</body>
</section>
</html>
