<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome</title>
  </head>
  <body>

        
        <?php
        session_start();
        if(isset($_SESSION['username'])){
        echo '<div class="container mt-3"><h1>Welcome ' . $_SESSION ['username'].'<a href="logout.php"> (Logout)</a></h1></div>';
        echo '<div class="container mt-3"><a href="addItems.php"> Add Items</a>';
        echo '</div>';
        }
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "inventory";

        try{
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            //$sql = "CREATE DATABASE inventory";
            //$sql = "CREATE TABLE `inventory`.`user` (`user_name` VARCHAR(500) NOT NULL , `password` VARCHAR(500) NOT NULL ) ENGINE = InnoDB;";
            //$sql = "INSERT INTO `inventory`.`user` (`user_name`, `password`) VALUES ('$name', '$password');";
            //$result = mysqli_query($conn, $sql);
            

            
        }
        catch(mysqli_sql_exception $e){
            echo $e;
        }    

        

        try{
            $sql = "SELECT * FROM item";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "<div class='container mt-3'><table class='table'>";
            echo "<tr>";
            echo "<th scope='col'>Item</th><th scope='col'>Quantity</th><th scope='col'>Price</th>";
            echo "</tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
            echo "</table></div>";
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> No Data Found!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>';
        }
        }
        catch(mysqli_sql_exception $e){
            echo $e;
        }

mysqli_close($conn);
        ?>
        

        


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>