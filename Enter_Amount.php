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
    .input1{
    border: 0;
    background: none;
    display: block;
    margin: 20px ;
    margin-left: 4%;
    border: 2px solid rgb(100, 157, 231);
    padding: 14px 10px;
    width: 40%;
    outline: none;
    color: black;
    border-radius: 20px;
    transition: 0.5s;
}

.input1:focus{
width: 45%;
border-color: rgb(191, 223, 132);  
}
.input2{
    border: 0;
    background: none;
    display: block;
    margin: 15px ;
    margin-left: 32%;
    border: 2px solid rgb(191, 223, 132);
    padding: 14px 40px;
    outline: none;
    color: black;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.5s;
    width: 20%;
    
}

.input2:hover{
background-color: yellowgreen;
}
    </style>
</head>
<body>

    <h1>TRANSACTION</h1>
    <h4 style="margin-left: 34%;">Enter Amount to make trasaction with <?php echo $_SESSION['Name'];?></h4>

    
    <div style="margin-left: 15%;">
    <form action ="Enter_Amount.php" method ="POST">
    <input type="number" placeholder="Amount" name="amount" class="input1" style="margin-left: 23%;" id="amount"/>
        <input type = "submit" class="input2"   name ="transact" value = "Transact"/>
        <button onclick="window.location.href='Customer_transaction.php'" class="input2">Cancel</button>
    </form>
    </div>
   


    <?php
    include 'config.php';
    if (isset($_POST["transact"])) {
        $amount = $_POST['amount'];
        $id = $_SESSION['id'];
        $name = $_SESSION['Name'];

    if($amount==""){
      echo "<script>alert('please fill amount...!!');</script>";
  }else{   
$update= "update customerlist set balance = (balance - '$amount') where id like '$id' ";
$update2 = "update customerlist set balance = (balance + '$amount') where Name like '$name' ";
$select = "SELECT * from customerlist where id = '$id'";
$select2 = "SELECT * from customerlist where Name = '$name'";


if(mysqli_query($conn,$update)){
    
}
else{
    echo "<script>alert('Error while updating balance...!!');</script>";
    echo "Error: " . $update . "<br>" . mysqli_error($conn);
  }

if(mysqli_query($conn,$update2)){
    
}
else{
    echo "<script>alert('Error while updating balance...!!');</script>";
    echo "Error: " . $update . "<br>" . mysqli_error($conn);
  }



if($result = mysqli_query($conn,$select)){
    $row = $result-> fetch_assoc();
    $senderid = $_SESSION['id'];
    $sendername = $row['Name'];
   

    if($result2 = mysqli_query($conn,$select2)){
         $row2 = $result2-> fetch_assoc();
        $receiverid = $row2['id'];
        $receivername = $row2['Name'];

        $insert = "INSERT into transactions values('$senderid','$sendername','$receiverid','$receivername','$amount')";
        if($result3 = mysqli_query($conn,$insert)){
            echo '<script type  = "text/javascript">';
            echo 'alert("Entered Amount will be deducted....!");';
            echo 'window.location.href = "Successfull.php"';
            echo '</script>';
           
       }
       else{
        echo "<script>alert('Error while updating Transaction...!!');</script>";
        echo "Error: " . $update . "<br>" . mysqli_error($conn);
         }
        
    
    }
    else{
        echo "Error: " . $update . "<br>" . mysqli_error($conn);
      }

}
else{
    echo "Error: " . $update . "<br>" . mysqli_error($conn);
  }

}


}

 



?>
               

      
       
 
</body>
</html>