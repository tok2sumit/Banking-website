<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
         h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
        margin-bottom: 5%;
        
    }
    .button1{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 18px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
    }
    a:hover{
        background-color: white;
        color: black;
        border: solid 2px yellowgreen;
    }
    </style>
</head>
<body>

    <h1>Customer</h1>
    <div style="align-items: center; display: flex; height: 100%; justify-content: center;"> 

<div class="card" style="width: 18rem;">
  <img src="customer.png" class="card-img-top" alt="...">
  <div class="card-body">
      
    <?php
    include 'config.php';
      
       $id = $_SESSION["id"];      
            $query = "SELECT * FROM customerlist where id = '$id'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
           
    ?>

    <h5 class="card-title"><?php echo $row['Name'];?></h5>
    <p class="card-text">Thank you for been a Customer..!!</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Email : <?php echo $row['Email'];?></li>
    <li class="list-group-item">Amount : <?php echo $row['balance'];?></li>
    
  </ul>
  
  <div class="card-body">
    <a href="Customer_transaction.php" style="margin-right: 10%; margin-left: 8%;"  class="button1">Transact</a>
    <a href="index.php" class="button1">Cancel</a>
  </div>
</div>
</div>
<?php
            }
?>


</body>
</html>