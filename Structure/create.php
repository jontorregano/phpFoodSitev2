<!DOCTYPE HTML>
<html>
<head>
<title>PDO - Create a Record - PHP CRUD Tutorial</title>

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="libs/bootstrap-3.3.7/css/bootstrap.min.css" />

<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Create Product</h1>
        </div>

        <?php
        if($_POST){

            // include database connection
            include 'Database/databaseconnection.php';

            try{
                // insert query
                $query = "INSERT INTO menu SET foodName=:foodName, foodPrice=:foodPrice, foodTag=:foodTag, 
                  foodType=:foodType, foodSize=:foodSize";

                // prepare query for execution
                $stmt = $con->prepare($query);

                // posted values
                $foodName=htmlspecialchars(strip_tags($_POST['foodName']));
                $foodPrice=htmlspecialchars(strip_tags($_POST['foodPrice']));
                $foodTag=htmlspecialchars(strip_tags($_POST['foodTag']));
                $foodType=htmlspecialchars(strip_tags($_POST['foodType']));
                $foodSize=htmlspecialchars(strip_tags($_POST['foodSize']));

                // bind the parameters
                $stmt->bindParam(':foodName', $foodName);
                $stmt->bindParam(':foodPrice', $foodPrice);
                $stmt->bindParam(':foodTag', $foodTag);
                $stmt->bindParam(':foodType', $foodType);
                $stmt->bindParam(':foodSize', $foodSize);


                // specify when this record was inserted to the database
                //$created=date('Y-m-d H:i:s');
                //$stmt->bindParam(':created', $created);

                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Record was saved.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Unable to save record.</div>";
                }

            }

                // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>

        <!-- dynamic content will be here -->
        <!-- html form here where the product information will be entered -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><label>
                            <input type='text' name='foodName' class='form-control'/>
                        </label></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><label>
                            <input type='number' name='foodPrice' class='form-control'/>
                        </label></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td><label>
                            <input type='text' name='foodSize' class='form-control'/>
                        </label></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><label>
                            <input type='text' name='foodType' class='form-control'/>
                        </label></td>
                </tr>
                <tr>
                    <td>Tag</td>
                    <td><label>
                            <input type='text' name='foodTag' class='form-control'>
                        </label></td>
                </tr>
                <tr>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='read.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>

    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

