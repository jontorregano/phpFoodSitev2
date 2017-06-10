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

            try {
                // insert query
                $query = "INSERT INTO menu SET foodName=:foodName, foodPrice=:foodPrice, foodTag=:foodTag, 
                  foodType=:foodType, foodSize=:foodSize, foodImage=:foodImage";

                // prepare query for execution
                $stmt = $con->prepare($query);

                // posted values
                $foodName = htmlspecialchars(strip_tags($_POST['foodName']));
                $foodPrice = htmlspecialchars(strip_tags($_POST['foodPrice']));
                $foodTag = htmlspecialchars(strip_tags($_POST['foodTag']));
                $foodType = htmlspecialchars(strip_tags($_POST['foodType']));
                $foodSize = htmlspecialchars(strip_tags($_POST['foodSize']));

                // new image field
                $foodImage =! empty($_FILES["foodImage"]["foodName"])
                    ? sha1_file($_FILES['foodImage']['tmp_name'])."-".basename($_FILES["foodImage"]["foodName"])
                    : "";
                $foodImage=htmlspecialchars(strip_tags($foodImage));

                // bind the parameters
                $stmt->bindParam(':foodName', $foodName);
                $stmt->bindParam(':foodPrice', $foodPrice);
                $stmt->bindParam(':foodTag', $foodTag);
                $stmt->bindParam(':foodType', $foodType);
                $stmt->bindParam(':foodSize', $foodSize);
                $stmt->bindParam(':foodImage', $foodImage);


                // specify when this record was inserted to the database
                //$created=date('Y-m-d H:i:s');
                //$stmt->bindParam(':created', $created);

                // Execute the query
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Record was saved.</div>";

                    // now, if image is not empty, try to upload the image
                    if ($foodImage) {

                        // sha1_file() function is used to make a unique file name
                        $target_directory = "uploads/";
                        $target_file = $target_directory . $foodImage;
                        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

                        //error message is empty
                        $file_upload_error_messages="";

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
                        if ($_FILES['image']['size'] > (1024000)) {
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

                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
                    }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
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
                    <td>Tag</td>
                    <td><label>
                            <input type='text' name='foodTag' class='form-control'>
                        </label></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><label>
                            <input type='text' name='foodType' class='form-control'/>
                        </label></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td><label>
                            <input type='text' name='foodSize' class='form-control'/>
                        </label></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="foodImage" /></td>
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

