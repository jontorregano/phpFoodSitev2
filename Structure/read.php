<!DOCTYPE HTML>
<html>
<head>
    <title>Grab It N Go Menu</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
   <!-- <link rel="stylesheet" href="libs/bootstrap-3.3.7/css/bootstrap.min.css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400i" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="Content/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Fonts-->
    <link href="Content/font-awesome.min.css" rel="stylesheet">
    <link href="Content/linea-arrows.css" rel="stylesheet">
    <link href="Content/linea-icons.css" rel="stylesheet">
    <!-- Plugins-->
    <link href="Content/owl.carousel.css" rel="stylesheet">
    <link href="Content/magnific-popup.css" rel="stylesheet">
    <link href="Content/vertical.min.css" rel="stylesheet">
    <link href="Content/pace-theme-minimal.css" rel="stylesheet">
    <link href="Content/animate.css" rel="stylesheet">
    <!-- Template core CSS-->
    <link href="Content/template3.css" rel="stylesheet">


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
<!-- Header-->
<header class="header header-center">
    <div class="container-fluid">
        <!-- Logos-->
        <!--  <div class="inner-header">
              <a class="inner-brand" href="index.html">
                  <img class="brand-dark" src="Content/images/logo.png" width="77px" alt="">
                  <img class="brand-light" src="Content/images/logo-light.png" width="77px" alt="">
              </a>
          </div> -->
        <!-- Navigation-->
        <div class="inner-navigation collapse navbody">
            <div class="inner-navigation-inline">
                <div class="inner-nav">
                    <ul>
                        <!-- Home-->
                        <li class="menu-item-has-children menu-item-has-mega-menu">
                            <a href="index.php">Home</a>
                            <div class="mega-menu">
                                <ul class="sub-menu mega-menu-row">
                                    <!-- Column 1-->
                                </ul>
                            </div>
                        </li>
                        <!-- Home end-->
                        <!-- Contact Us-->
                        <li class="menu-item-has-children">
                            <a href="contact.php">Contact Us</a>
                        </li>
                        <!-- Read php-->
                        <li class="menu-item-has-children">
                            <a href="read.php">Inventory Menu</a>
                        </li>

                        <!-- Mega menu-->
                        <li class="menu-item-has-children menu-item-has-mega-menu">
                            <a href="Content/downloads/grabngomenu.pdf">Menu</a>
                            <div class="mega-menu">
                                <ul class="sub-menu mega-menu-row">
                                    <!-- Column 1-->
                                    <li class="menu-item-has-children mega-menu-col">
                                        <a href="index.php">Breakfast</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.php">Sandwiches</a></li>
                                            <li><a href="index.php">Plates</a></li>
                                            <li><a href="index.php">All</a></li>
                                        </ul>
                                    </li>
                                    <!-- Column 2-->
                                    <li class="menu-item-has-children mega-menu-col">
                                        <a href="index.php">Poboys</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.php">Sandwiches</a></li>
                                            <li><a href="index.php">Combos</a></li>
                                            <li><a href="index.php">All</a></li>
                                        </ul>
                                    </li>
                                    <!-- Column 3-->
                                    <li class="menu-item-has-children mega-menu-col">
                                        <a href="index.php">Fried Chicken</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.php">Combos</a></li>
                                            <li><a href="index.php">All</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Mega menu end-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- Extra menu-->
        <div class="extra-nav">
            <ul>
                <li><a class="open-offcanvas" href="#"><span>Cart</span><span class="fa fa-bars"></span></a></li>
            </ul>
        </div>
        <!-- Mobile menu-->
        <div class="nav-toogle"><a href="#" data-toggle="collapse" data-target=".inner-navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></div>
    </div>
</header>
<!-- Header end-->
<!-- Wrapper-->
<!-- <div class="wrapper"> -->
    <!-- Page Header-->
 <!--   <section class="module-header full-height parallax bg-dark bg-gradient" data-background="Content/images/chicken.jpg"> -->
   <!--     <div class="container"> -->
      <!--      <div class="row"> -->
            <!--    <div class="col-md-12"> -->
                <!--    <img class="brand-dark" src="Content/images/GING.png" alt=""> -->
               <!--     <h1 class="h1 m-b-15">Food Mart</h1> -->


                    <!--   <p class="m-b-30">Start with co-working way in our studio.</p> -->
                 <!--   <p>
                        <a class="btn btn-lg btn-circle btn-white" href="#">Online Ordering Coming Soon</a> -->
                        <!--        <a class="btn btn-lg btn-outline btn-circle btn-white" href="#">Learn More</a> -->
                <!--    </p>
                </div>
            </div>
        </div>
    </section>  -->
    <!-- Page Header end-->
<body>

<section class="bg-dark">
<!-- container -->
<div class="container">

    <div class="page-header text-center">
        <h1>Grab It N Go Menu</h1>
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
    $query = "SELECT id, foodName, foodPrice, foodTag, foodType, foodSize, foodImage FROM menu ORDER BY id ASC
      LIMIT :from_record_num, :records_per_page";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->bindParam(':foodImage', $foodImage);

    // this is how to get number of rows returned
    $num = $stmt->rowCount();

    // link to create record form
    //echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

    //check if more than 0 record found
    if($num>0){

        echo "<table class='table table-hover table-responsive table-bordered'>";//start table

        //creating our table heading
        echo "<tr>";
        //echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Picture</th>";
        echo "<th>Price</th>";
        echo "<th>Tag</th>";
        echo "<th>Type</th>";
        //echo "<th>Size</th>";
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
            //echo "<td>{$id}</td>";
            echo "<td>{$foodName}</td>";

            if ($foodImage != null){
                echo "<td><img src='uploads/$foodImage' style='width:75px;' /></td>";
            } else {
                echo "<td><img src='uploads/noImage' style='width:75px;' /></td>";
            }

            echo "<td>&#36;{$foodPrice}</td>";
            echo "<td>{$foodTag}</td>";
            echo "<td>{$foodType}</td>";
            //echo "<td>{$foodSize}</td>";
            echo "<td>";
            // read one record
            echo "<a href='read_one.php?id={$id}' class='btn btn-lg btn-circle btn-white'>View</a>";

            // we will use this links on next part of this post
            //echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

            // we will use this links on next part of this post
            //echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
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

        // end table
        echo "</table>";

        // paginate records
        $page_url="read.php?";
        include_once "paging.php";
    }

        // if no records found
        else{
            echo "<div class='alert alert-danger'>No records found.</div>";
    }
    ?>

    <!-- dynamic content will be here -->

</div> <!-- end .container -->
</section>

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