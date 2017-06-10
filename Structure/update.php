<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>

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
        <h1>Update Product</h1>
    </div>

    <?php
    // get passed parameter value, in this case, the record ID
    // isset() is a PHP function used to verify if a value is there or not
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    //include database connection
    include 'Database/databaseconnection.php';

    // read current record's data
    try {
        // prepare select query
        $query = "SELECT id, foodName, foodPrice, foodTag, foodType, foodSize FROM menu WHERE id = ? LIMIT 0,1";
        $stmt = $con->prepare( $query );

        // this is the first question mark
        $stmt->bindParam(1, $id);

        // execute our query
        $stmt->execute();

        // store retrieved row to a variable
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // values to fill up our form
        $id = $row['id'];
        $foodName = $row['foodName'];
        $foodPrice = $row['foodPrice'];
        $foodTag = $row['foodTag'];
        $foodType = $row['foodType'];
        $foodSize = $row['foodSize'];
    }

// show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
    ?>

    <?php
    // get passed parameter value, in this case, the record ID
    // isset() is a PHP function used to verify if a value is there or not
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    //include database connection
    include 'Database/databaseconnection.php';

    // check if form was submitted
    if($_POST){

        try{

            // write update query
            // in this case, it seemed like we have so many fields to pass and
            // it is better to label them and not use question marks
            $query = "UPDATE menu 
                    SET foodName=:foodName, foodPrice=:foodPrice, foodTag=:foodTag, 
                  foodType=:foodType, foodSize=:foodSize
                  WHERE id = :id";

            // prepare query for execution
            $stmt = $con->prepare($query);

            // posted values
            $foodName=htmlspecialchars(strip_tags($_POST['foodName']));
            $foodPrice=htmlspecialchars(strip_tags($_POST['foodPrice']));
            $foodTag=htmlspecialchars(strip_tags($_POST['foodTag']));
            $foodType=htmlspecialchars(strip_tags($_POST['foodType']));
            $foodSize=htmlspecialchars(strip_tags($_POST['foodSize']));

            // bind the parameters
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':foodName', $foodName);
            $stmt->bindParam(':foodPrice', $foodPrice);
            $stmt->bindParam(':foodTag', $foodTag);
            $stmt->bindParam(':foodType', $foodType);
            $stmt->bindParam(':foodSize', $foodSize);

            // Execute the query
            if($stmt->execute()){
                echo "<div class='alert alert-success'>Record was updated.</div>";
            }else{
                echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
            }

        }

            // show errors
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }
    ?>

    <!--we have our html form here where new user information will be entered-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Name</td>
                <td><label>
                        <input type='text' name='foodName' value="<?php echo htmlspecialchars($foodName, ENT_QUOTES);  ?>" class='form-control'/>
                    </label></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><label>
                        <input type='number' name='foodPrice' value="<?php echo htmlspecialchars($foodPrice, ENT_QUOTES);  ?>" class='form-control'/>
                    </label></td>
            </tr>
            <tr>
                <td>Tag</td>
                <td><label>
                        <input type='text' name='foodTag' value="<?php echo htmlspecialchars($foodTag, ENT_QUOTES);  ?>" class='form-control'>
                    </label></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><label>
                        <input type='text' name='foodType' value="<?php echo htmlspecialchars($foodType, ENT_QUOTES);  ?>" class='form-control'/>
                    </label></td>
            </tr>
            <tr>
                <td>Size</td>
                <td><label>
                        <input type='text' name='foodSize' value="<?php echo htmlspecialchars($foodSize, ENT_QUOTES);  ?>" class='form-control'/>
                    </label></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Save Changes' class='btn btn-primary' />
                    <a href='read.php' class='btn btn-danger'>Back to read products</a>
                </td>
            </tr>
        </table>
    </form>
    <!-- dynamic content will be here -->

</div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.7/js/bootstrap.min.js"></script>

</body>
</html>