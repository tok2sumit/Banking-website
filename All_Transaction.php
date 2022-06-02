<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
         h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
        margin-bottom: 2%;
        margin-top:0%;
    }
    
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
<h1>ALL TRANSACTIONS </h1>
 
  
  
    <table>
        
        <tr id="header">
            
            <th>Sender ID</th>
            <th>Sender Name</th>
            <th>Receiver ID</th>
            <th>Receiver Name</th>
            <th>Amount Transfered</th>
            
        </tr>
  <?php
  include 'config.php';
      
            $query = "SELECT * FROM transactions";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
            
    ?>

    
        <tr>
            
            <td><?php echo $row['senderid'];?> </td>
            <td><?php echo $row['sendername'];?> </td>
            <td><?php echo $row['receiverid'];?> </td>
            <td><?php echo $row['receivername'];?> </td>
            <td><?php echo $row['amount'];?> </td>
            
        </tr>
       

    
    <?php
            }
   ?>

</table>
</body>

</html>