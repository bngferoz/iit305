<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Items</title>
  </head>
  <body>

        
        <?php
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

        if(isset($_POST['reg_button'])){
            header("Location: http://localhost/inventory/dash.php");
            exit;
            }

            if(isset($_POST['submit_button'])){
                $name = $_POST['item'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                
                try{
                    $sq = "INSERT INTO `item` (`name`, `quantity`, `price`) VALUES ('$name', '$quantity', '$price')";
                $result = mysqli_query($conn, $sq);
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Item Inserted successfully!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>';
                }
                else{
                    // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Wrong input!
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
<h1>Add Items</h1>
    <form action="addItems.php" method="post">
        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="item" class="form-control" id="item">
        </div>

        

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="500" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="1" max="500" class="form-control">
        </div>

        
        <button type="submit" name='submit_button' class="btn btn-primary">Add Items</button>
        <button type='submit' name='reg_button' class="btn btn-primary"/>Go Back</button>
    </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>