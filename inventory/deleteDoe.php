<?php  
if (isset($_POST['submit'])) {
    require "../config/header.php";
    $connection = db_connect();
    
    if ($_POST['submit'] == 'Yes') {
        $doeID = db_quote($_POST['deleteID']);
        $result = db_query("DELETE FROM doe_data WHERE doeID = " . $doeID);
        if (!$result) {
            echo mysqli_error();
        }
    }     
    
    mysqli_close($connection);
    header('Location: index.php');
}
?>

<!-- Remember to update links for css/scripts when changing directories! -->

<html>
    <head>
        <title>Delete Doe</title>
        <link  rel="stylesheet" href="../css/bootstrap.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>
    
    <body>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="../index.html">LIVES</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="../index.html">Home</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="index.php">Inventory/Animal Status</a></li>
                        <li><a href="../labor/index.php">Labor</a></li>
                        <li><a href="../wip.html">Nutrition</a></li>
                        <li><a href="../wip.html">Health</a></li>
                        <li><a href="../wip.html">Genetic Improvement</a></li>
                        <li><a href="../wip.html">Finance</a></li>
                        <li><a href="../wip.html">Profit Margin</a></li>
                      </ul>
                    </li>
                    <li><a href="../about.html">About</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>
            <br /><br /><br /><br />
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <fieldset class="form-group">
                        <?php
                            require "../config/header.php";
                            $connection = db_connect();
                            $checkID = db_quote($_GET['sendID']);
                            $result = db_query("SELECT * FROM doe_data WHERE doeID = " . $checkID);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            if (!$row) {
                                echo '<h3>Failure to find doe!</h3>';
                            } else {
                                echo '<h3>Are you sure you want to permanently delete all information for ' . $row['name'] . ' with ID ' . $row['doeID'] . '? This action can not be reversed.</h3>';
                                echo '<input class="btn btn-warning col-xs-6" type="submit" name ="submit" value ="Yes">
                                <input class="btn btn-warning col-xs-6" type="submit" name ="submit" value ="No">';
                                echo '<input type="hidden" value="' . $row['doeID'] . '" name="deleteID" />';
                            }

                            mysqli_close($connection);
                        ?>
                    </fieldset>
                </form>               
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>