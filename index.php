<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif|Rubik|Unna&display=swap" rel="stylesheet">
    <title>Pharmacy Inventory System</title>
    <link rel="icon" href="favicon (3).ico">
    <style> 
        input[type=text] {
          width: 50%;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 4px;
          font-size: 16px;
          background-color: white;
          background-image: url("https://pngimage.net/wp-content/uploads/2018/06/searchicon.png-3.png");
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 12px 20px 12px 40px;
        }
    </style>
  </head>
  <body>
    <div class="header">
      <h1>Pharmacy Inventory System</h1>

      <button onclick="window.location.href = 'login.php';">Log In</button>

      <button onclick="window.location.href = 'register.php';">Sign Up</button>

    </div>
      
        <div class="main">
        <img src="pharmacist.png" alt="pharmacist" height="500px">
        <p>Log In to enjoy more things with us.</p>
        </div>
      
        <!--search form-->
        
        <form action="index.php" method="POST">
            <div align="center" style="margin-left: 20%; margin-right: 20%;">
                <center><button type="submit" name="view_all">View All Records</button></center>
                <br></br>
                <input type="text" name="search_input" placeholder="Type in keyword" autocomplete="off">
                <button type="submit" name="search">Search</button>
                <br></br>
            </div>
        </form>


    <!--Search for specific record-->
    <?php if(isset($_POST['search'])):?>
    <div style="margin-left: 5%; margin-right: 5%;">
    <table class = "table">
        <thead>
            <tr>
                <th>Number</th>
                <th>Med ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Supplier</th>
            </tr>
        </thead>
    <tbody>
        <?php 
        $conn =new mysqli("localhost","root","","pharmacy_inventory") OR die("Error: " . mysqli_error($conn));
        $search=$_POST['search_input'];
        $search_query="SELECT * FROM drug WHERE (drug_name LIKE '%$search%' OR drug_type LIKE '%$search%' OR drug_desc LIKE '%$search%' OR drug_supplier LIKE '%$search%')";
        $result=$conn->query($search_query) or die($conn->error);
        $counter=0;
        while($row=$result->fetch_assoc()):
            $counter=$counter+1;?>
            <tr>
                <td><?= $counter ?><br></br></td>
                <td><?= $row['drug_id'] ?><br></br></td>
                <td><?= $row['drug_name']; ?><br></br></td>
                <td><?= $row['drug_type']; ?><br></br></td>
                <td><?= $row['drug_desc']; ?><br></br></td>
                <td style="width:10%"><?= $row['drug_price']; ?><br></br></td>
                <td><?= $row['drug_quantity']; ?><br></br></td>
                <td><?= $row['drug_supplier']; ?><br></br></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
    </div>
    <?php endif; ?>

    <!--View all records-->
    <?php if(isset($_POST['view_all'])):?>
    <div style="margin-left: 5%; margin-right: 5%;">
    <table class = "table">
        <thead>
        <tr>
            <th>Number</th>
            <th>Med ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Supplier</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $conn =new mysqli("localhost","root","","pharmacy_inventory") OR die("Error: " . mysqli_error($conn));
        $sQuery="SELECT * FROM drug";
        $result=$conn->query($sQuery);
        $counter=0;
        while ($row=$result->fetch_assoc()): 
            $counter=$counter+1 ?>
            <tr>
                <td><?= $counter ?><br></br></td>
                <td><?= $row['drug_id'] ?><br></br></td>
                <td><?= $row['drug_name']; ?><br></br></td>
                <td><?= $row['drug_type']; ?><br></br></td>
                <td><?= $row['drug_desc']; ?><br></br></td>
                <td style="width:10%"><?= $row['drug_price']; ?><br></br></td>
                <td><?= $row['drug_quantity']; ?><br></br></td>
                <td><?= $row['drug_supplier']; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    </div>
    <?php endif; ?>
  </body>
</html>