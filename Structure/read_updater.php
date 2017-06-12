<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - View Records - PHP CRUD Tutorial</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="libs/bootstrap-3.3.7/css/bootstrap.min.css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- custom css -->
    <style>
        .m-r-1em{ margin-right:1em; }
        .m-b-1em{ margin-bottom:1em; }
        .m-l-1em{ margin-left:1em; }
    </style>

</head>
<body>


<!-- container -->
<div class="container">

    <div class="page-header">
        <h1>View Products</h1>
    </div>

    <?php
    // include database connection
    include 'Database/databaseconnection.php';

    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // if it was redirected from delete.php
    if($action=='deleted'){
        echo "<div class='alert alert-success'>Record was deleted.</div>";
    }

    // select all data
    $query = "SELECT id, foodName, foodPrice, foodTag, foodType, foodSize FROM menu ORDER BY id ASC
      LIMIT :from_record_num, :records_per_page";
    $stmt = $con->prepare($query);
    $stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
    $stmt->execute();

    // this is how to get number of rows returned
    $num = $stmt->rowCount();

    // link to create record form
    echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

    //check if more than 0 record found
    if($num>0){

        echo "<table class='table table-hover table-responsive table-bordered'>";//start table

        //creating our table heading
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Price</th>";
        echo "<th>Tag</th>";
        echo "<th>Type</th>";
        echo "<th>Size</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['firstname'] to
            // just $firstname only
            extract($row);

            // creating new table row per record
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$foodName}</td>";
            echo "<td>&#36;{$foodPrice}</td>";
            echo "<td>{$foodTag}</td>";
            echo "<td>{$foodType}</td>";
            echo "<td>{$foodSize}</td>";
            echo "<td>";
            // read one record
            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

            // we will use this links on next part of this post
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

        // PAGINATION
        // count total number of rows
        $query = "SELECT COUNT(*) as total_rows FROM menu";
        $stmt = $con->prepare($query);

        // execute query
        $stmt->execute();

        // get total rows
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['total_rows'];

        // paginate records
        $page_url="read_updater.php?";
        include_once "paging.php";

        // end table
        echo "</table>";
    }

        // if no records found
        else{
            echo "<div class='alert alert-danger'>No records found.</div>";
    }
    ?>

    <!-- dynamic content will be here -->

</div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.7/js/bootstrap.min.js"></script>

<script type='text/javascript'>
    function delete_user( id ){

        var answer = confirm('Are you sure?');
        if (answer){
            // if user clicked ok,
            // pass the id to delete.php and execute the delete query
            window.location = 'delete.php?id=' + id;
        }
    }
</script>

</body>
</html>