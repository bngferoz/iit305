<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>User Registration</title>
  </head>
  <body>
<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = mysqli_connect($servername, $username, $password);
        //$sql = "CREATE DATABASE inventory";
        //$sql = "CREATE TABLE `inventory`.`user` (`user_name` VARCHAR(500) NOT NULL , `password` VARCHAR(500) NOT NULL ) ENGINE = InnoDB;";
        //$name = "hello";
        //$password = "feroz12345";
        //$sql = "INSERT INTO `inventory`.`user` (`user_name`, `password`) VALUES ('$name', '$password');";
        //$result = mysqli_query($conn, $sql);
        

        
    }
    catch(mysqli_sql_exception $e){
        echo $e;
    }

    if(isset($_POST['go_back'])){
      header("Location: http://localhost/inventory");
      exit;
      }

      if(isset($_POST['reg_button'])){
        $user = $_POST['username'];
        $userPassword = $_POST['password'];
         
        try{
          $sql = "INSERT INTO `inventory`.`user` (`user_name`, `password`,`type`) VALUES ('$user', '$userPassword','user');";
          $result = mysqli_query($conn, $sql);
          if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> User Created successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
          }
          else{
              // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
          }
        }
        catch(mysqli_sql_exception $e){
            echo $e;
        }
      }
   
mysqli_close($conn); 
?>

<div class="container mt-3">
<h1>User Registration</h1>
    <form action="userRegistration.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password"> 
    </div>

    
    <button type="submit" name='reg_button' class="btn btn-primary">Submit</button>
    <button type='submit' name='go_back' class="btn btn-primary"/>Go Back</button>
    </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

