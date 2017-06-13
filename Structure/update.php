<!DOCTYPE HTML>
<html>
<head>
    <title>Update a Menu Item</title>

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
        <h1>Update a Menu Item</h1>
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
        $query = "SELECT id, foodName, foodPrice, foodTag, foodType, foodSize, foodImage FROM menu WHERE id = ? LIMIT 0,1";
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
        $foodImage = $row['foodImage'];
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
                  foodType=:foodType, foodSize=:foodSize, foodImage=:foodImage
                  WHERE id = :id";

            // prepare query for execution
            $stmt = $con->prepare($query);

            // posted values
            $foodName=htmlspecialchars(strip_tags($_POST['foodName']));
            $foodPrice=htmlspecialchars(strip_tags($_POST['foodPrice']));
            $foodTag=htmlspecialchars(strip_tags($_POST['foodTag']));
            $foodType=htmlspecialchars(strip_tags($_POST['foodType']));
            $foodSize=htmlspecialchars(strip_tags($_POST['foodSize']));

            // new image field
            $foodImage =! empty($_FILES["foodImage"]["name"])
                ? sha1_file($_FILES['foodImage']['tmp_name'])."-".basename($_FILES["foodImage"]["name"])
                : "";
            $foodImage=htmlspecialchars(strip_tags($foodImage));

            // bind the parameters
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':foodName', $foodName);
            $stmt->bindParam(':foodPrice', $foodPrice);
            $stmt->bindParam(':foodTag', $foodTag);
            $stmt->bindParam(':foodType', $foodType);
            $stmt->bindParam(':foodSize', $foodSize);
            $stmt->bindParam('foodImage', $foodImage);

            // Execute the query
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Record was updated.</div>";

                if ($foodImage) {

                    // sha1_file() function is used to make a unique file name
                    $target_directory = "uploads/";
                    $target_file = $target_directory . $foodImage;
                    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

                    //error message is empty
                    $file_upload_error_messages = "";

                    // make sure that file is a real image
                    $check = getimagesize($_FILES["foodImage"]["tmp_name"]);
                    if ($check !== false) {
                        // submitted file is an image
                    } else {
                        $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
                    }

                    // make sure certain file types are allowed
                    $allowed_file_types = array("jpg", "jpeg", "png", "gif");
                    if (!in_array($file_type, $allowed_file_types)) {
                        $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
                    }

                    // make sure file does not exist
                    if (file_exists($target_file)) {
                        $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
                    }

                    // make sure submitted file is not too large, can't be larger than 1 MB
                    if ($_FILES['foodImage']['size'] > (1024000)) {
                        $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
                    }

                    // make sure the 'uploads' folder exists
                    // if not, create it
                    if (!is_dir($target_directory)) {
                        mkdir($target_directory, 0777, true);
                    }

                    // if $file_upload_error_messages is still empty
                    if (empty($file_upload_error_messages)) {
                        // it means there are no errors, so try to upload the file
                        if (move_uploaded_file($_FILES["foodImage"]["tmp_name"], $target_file)) {
                            // it means photo was uploaded
                        } else {
                            echo "<div class='alert alert-danger'>";
                            echo "<div>Unable to upload photo.</div>";
                            echo "<div>Update the record to upload photo.</div>";
                            echo "</div>";
                        }
                    } // if $file_upload_error_messages is NOT empty
                    else {
                        // it means there are some errors, so show them to user
                        echo "<div class='alert alert-danger'>";
                        echo "<div>{$file_upload_error_messages}</div>";
                        echo "<div>Update the record to upload photo.</div>";
                        echo "</div>";
                    }
                }
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
                <td>Size</td>
                <td><label>
                        <input type='file' name='foodImage' value="<?php echo htmlspecialchars($foodImage, ENT_QUOTES);  ?>" class='form-control'/>
                    </label></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Save Changes' class='btn btn-primary' />
                    <a href='read.php' class='btn btn-danger'>Back to Menu</a>
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