<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>

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
        <h1>Read Product</h1>
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
        $query = "SELECT id, foodName, foodPrice, foodTag, foodType, foodSize FROM menu WHERE id = ? 
          LIMIT 0,1";
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

    <!--we have our html table here where new user information will be displayed-->
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Id</td>
            <td><?php echo htmlspecialchars($id, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo htmlspecialchars($foodName, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?php echo htmlspecialchars($foodPrice, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Tag</td>
            <td><?php echo htmlspecialchars($foodTag, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
        <tr>
            <td>Type</td>
            <td><?php echo htmlspecialchars($foodType, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Size</td>
            <td><?php echo htmlspecialchars($foodSize, ENT_QUOTES);  ?></td>
        </tr>
            <td></td>
            <td>
                <a href='read.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>

    <!-- dynamic content will be here -->

</div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.7/js/bootstrap.min.js"></script>

</body>
</html>