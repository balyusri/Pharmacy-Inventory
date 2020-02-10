<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif|Rubik|Unna&display=swap" rel="stylesheet">
    <title>Pharmacy Inventory System</title>
    <link rel="icon" href="favicon (3).ico">
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

  </head>
  <body>
    <div class = "header">
        <h1>Pharmacy Inventory System</h1>
    </div>

    <div class="navbar">
      <ul>
        <li><a href="main.html">Home</a></li>
        <li><a class = "active" href="inventory.php">Inventory</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </div>

    <div class = "date">
      <script>
        var d = new Date();
        var month = d.getMonth()+1;
        document.write("Current date : "+ d.getDate() + "/" + month + "/" + d.getFullYear() );
      </script>
    </div>
    <div>
        <br><center><h2>Add New Medicine</h2></center><br>
        <form action="query.php" method="POST">
            <div class = "medinfobox">
              <div class = "medinfo">
                  <br>
                  <label>Medicine name: </label>
                  <input type="text" name="drug_name" class="form-control" id="drug_name" placeholder="Medicine Name" autocomplete="off">
                  <br>
                  <label>Medicine type: </label>
                  <input type="text" name="drug_type" class="form-control" id="drug_type" placeholder="Medicine type" autocomplete="off">
                  <br>
                  <label>Description: </label>
                  <input type="text" name="drug_desc" class="form-control" size="60" id="drug_desc" placeholder="Description" autocomplete="off">
                  <br>
                  <label>Supplier: </label>
                  <input type="text" name="drug_supplier" class="form-control" id="drug_supplier" placeholder="Supplier" autocomplete="off">
                  <br>
                  <label>Price: </label>
                  <input type="text" name="drug_price" class="form-control" size="30" id="drug_price" placeholder="Price" autocomplete="off">
                  <br>
                  <label>Quantity: </label>
                  <input type="text" name="drug_quantity" class="form-control" size="30" id="drug_quantity" placeholder="Quantity" autocomplete="off">
                  <br>
                  <br>
              </div>
            </div>
            <div align="center">
                <button type="submit" name="add" style="font-size: 17px;padding: 10px 40px" class="btn btn-info">Add</button>
                <br>
                <br>

            </div>
        </form>
    </div>

    <?php require_once("query.php");?>

      <div class="container">
            <?php if(isset($_SESSION['msg'])): ?>
              <div class="<?= $_SESSION['alert']; ?>">
                  <?= $_SESSION['msg'];
              unset($_SESSION['msg']);
              ?>
              </div>
            <?php endif; ?>
      </div>

      <div style="margin-left: 5%; margin-right: 5%;">
          <table class = "table">
              <thead>
                  <tr>
                      <th>Med ID</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Supplier</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <form action="query.php" method="POST">
                  <?php
                  $sQuery="SELECT * FROM drug";
                  $result=$conn->query($sQuery);
                  $counter=0;
                  $x=1;
                  while ($row=$result->fetch_assoc()): $counter=$counter+1?>
                  <tr>
                      <td><?= $row['drug_id'] ?><br></br></td>
                      <td><?= $row['drug_name']; ?><br></br></td>
                      <td><?= $row['drug_type']; ?><br></br></td>
                      <td><?= $row['drug_desc']; ?><br></br></td>
                      <td style="width:10%"><?= $row['drug_price']; ?><br></br></td>
                      <td><?= $row['drug_quantity']; ?><br></br></td>
                      <td><?= $row['drug_supplier']; ?></td>
                      <td style="width:10%">
                          <button type="submit" name="delete" value="<?= $row['drug_id'] ?>" class="btn btn-danger">Delete</button>
                          <button type="button" name="edit" value="<?= $x; $x++;?>" class="btn btn-primary">Edit</button>
                          <br></br>
                      </td>

                  </tr>

                  <?php endwhile; ?>
                </form>
              </tbody>
          </table>

      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $(".alert").remove();
            },3000);

            $(".btn-primary").click(function(){
                $(".table").find('tr').eq(this.value).each(function(){
                    $("#drug_name").val($(this).find('td').eq(1).text());
                    $("#drug_type").val($(this).find('td').eq(2).text());
                    $("#drug_desc").val($(this).find('td').eq(3).text());
                    $("#drug_price").val($(this).find('td').eq(4).text());
                    $("#drug_quantity").val($(this).find('td').eq(5).text());
                    $("#drug_supplier").val($(this).find('td').eq(6).text());
                    $(".btn-info").val($(this).find('td').eq(0).text());
                });
                $(".btn-info").attr("name","edit");
            });
        });
        </script>

        <div class="footer">
          <h3>Find more about us at:</h3>
          <a class="footer-link" href="https://www.instagram.com/"><img src="instagram.png" height="30px"></a>
          <br>
          <a class="footer-link" href="https://twitter.com/"><img src="twitter.png" height="30px"></a>
          <br>
          <a class="footer-link" href="https://www.facebook.com/"><img src="facebook.png" height="30px"></a>

        </div>
  </body>
</html>
