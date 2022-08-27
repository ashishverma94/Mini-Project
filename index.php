<?php
$insert = false ;
if ( isset($_POST['name']))
{
    $server = "localhost" ;
    $username = "root" ;
    $password = "";

    $con = mysqli_connect($server , $username , $password ) ;
    if ( !$con )
        die( "Connection to this database failed due to ". mysqli_connect_error()) ;
    
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc = $_POST['desc'];
   $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
          VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());" ;

    if ( $con -> query($sql) == true )
    {
        $insert = true ;
    }
    else
        echo "ERROR : $sql <br> $con->error" ;
    
    $con->close() ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpg" class = "bg" alt="Elpis Global School">
    <div class = "container">
        <h1> Welcome to Elpis Global School</h1>
        <p> <h3>Enter Your Detail to confirm your participation</h3></p>

        <?php
            if ( $insert == true )
            {
                echo "<p class = 'submitmsg'> Thank you for submitting your form.</p>" ;
            }
        ?>

        <form action="index.php" method = "post">
            <input type="text" name = "name" id = "name" placeholder="Enter Your name :">
            <input type="text" name = "age" id = "age" placeholder="Enter Your age :">
            <input type="text" name = "gender" id = "gender" placeholder="Enter Your gender :">
            <input type="text" name = "email" id = "email" placeholder="Enter Your E-Mail :">
            <input type="text" name = "phone" id = "phone" placeholder="Enter Your Mobile No. :">
            <textarea name = "desc" id = "desc" cols = "30" rows = "10" placeholder="Enter any other information here.">
            </textarea>
            <button class="btn">Submit</button>

        </form>
    </div>

    <script src="index.js"></script>
</body>
</html>