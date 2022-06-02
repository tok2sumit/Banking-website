<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <!-- CSS only -->

</head>

<style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    
    table {
        position: absolute;
        margin-left: 4.2%;
        border-collapse: collapse;
        width: 90%;
        height: 300px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        background-color: #16a085;
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
        margin-bottom: 4%;
        margin-top:0%;
    }
  
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    a:hover{
        background-color: rgb(189, 238, 161);
        color: black;
    }
   
    

    .button1{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 7px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
    }
    .button1:hover{
        background-color: white;
        color: black;
        border: solid 1px yellowgreen;
    }
    body{
        scroll-behavior: smooth;
    }
</style>

<body>

  
  <h1>Customer List </h1>
   
    <table>
        
        <tr id="header">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Current Balance</th>
            <th>View</th>
        </tr>
  <?php
      include 'config.php';
       
            $query = "SELECT * FROM customerlist ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
            
    ?>

    
        <tr>
            <td><?php echo $row['id'];?> </td>
            <td><?php echo $row['Name'];?> </td>
            <td><?php echo $row['Email'];?> </td>
            <td><?php echo $row['balance'];?> </td>
            
            <form action ="index.php" method ="POST">
                <input type = "hidden" name  ="id" value = "<?php echo $row['id'];?>"/>
                <td><input type = "submit" class="button1"  name ="view" value = "view"/></td>
                
              </form>
        </tr>
       

    
    <?php
            }
   ?>

   <?php

   if(isset($_POST['view'])){
       $id = $_POST['id'];
       $_SESSION["id"]=$id;
       
    echo '<script type = "text/javascript">';
    echo 'window.location.href = "customer.php"';
    echo '</script>';
       
   }
   ?>
</table>

</body>

</html>