<?php  
if (isset($_POST['submit'])) {
    require "../config/header.php";
    $connection = db_connect();

    // USE ESCAPE CHARACTERS!
    // Gathering of every variable from forms
    $doeID = db_quote($_POST['updateID']);
    $filter = "";
    if ($_POST['doeUse']){
        $doeUse = db_quote($_POST['doeUse']);
        if ($filter) {
            $filter = ", doeUse = " . $doeUse;
        } else {
            $filter = "doeUse = " . $doeUse;
        }
    }
    if ($_POST['parity']){
        $parity = db_quote($_POST['parity']);
        if ($filter) {
            $filter = ", parity = " . $parity;
        } else {
            $filter = "parity = " . $parity;
        }
    }    
    if ($_POST['location']){
        $location = db_quote($_POST['location']);        
        if ($filter) {
            $filter = ", location = " . $location;
        } else {
            $filter = "location = " . $location;
        }
    }
    if ($_POST['kiddingDate']){
        $kiddingDate = db_quote($_POST['kiddingDate']);        
        if ($filter) {
            $filter = ", kiddingDate = " . $kiddingDate;
        } else {
            $filter = "kiddingDate = " . $kiddingDate;
        }
    }
    if ($_POST['weaningDate']){
        $weaningDate = db_quote($_POST['weaningDate']);        
        if ($filter) {
            $filter = ", weaningDate = " . $weaningDate;
        } else {
            $filter = "weaningDate = " . $weaningDate;
        }
    }
    if ($_POST['breedDate']){
        $breedDate = db_quote($_POST['breedDate']);        
        if ($filter) {
            $filter = ", breedDate = " . $breedDate;
        } else {
            $filter = "breedDate = " . $breedDate;
        }
    }
    if ($_POST['serviceSire']){
        $serviceSire = db_quote($_POST['serviceSire']);        
        if ($filter) {
            $filter = ", serviceSire = " . $serviceSire;
        } else {
            $filter = "serviceSire = " . $serviceSire;
        }
    }
    if ($_POST['dueDate']){
        $dueDate = db_quote($_POST['dueDate']);        
        if ($filter) {
            $filter = ", dueDate = " . $dueDate;
        } else {
            $filter = "dueDate = " . $dueDate;
        }
    }
    if ($_POST['cullDate']){
        $cullDate = db_quote($_POST['cullDate']);        
        if ($filter) {
            $filter = ", cullDate = " . $cullDate;
        } else {
            $filter = "cullDate = " . $cullDate;
        }
    }
    if ($_POST['cullReason']){
        $cullReason = db_quote($_POST['cullReason']);        
        if ($filter) {
            $filter = ", cullReason = " . $cullReason;
        } else {
            $filter = "cullReason = " . $cullReason;
        }
    }
    $result = "";
    if ($filter) {
        $result = db_query("UPDATE doe_data SET " . $filter . "WHERE doeID = " . $doeID);
    } 

    mysqli_close($connection);
    header('Location: doeInfo.php?sendID=' . $_POST['updateID']);
}
?>



<!-- Remember to update links for css/scripts when changing directories! -->

<html>
    <head>
        <title>Update Doe Information</title>
        <link  rel="stylesheet" href="../css/bootstrap.css" >
        <link rel="stylesheet" href="../css/bootstrap-datepicker3.css">
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
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <h1>Update Doe Information</h1>
                <div class="row">
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
                                echo '<input type="hidden" value="' . $row['doeID'] . '" name="updateID" />';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>ID:</b> ' . $row['doeID'] . '</h4></div>';
                                echo '<div class="col-xs-6"><h4><b>Name:</b> ' . $row['name'] . '</h4></div></div>';
                                echo '<br />';
                                // Some variables should not have the option to be changed
                                /* echo '<p class="col-md-6"><b>Birth Date:</b> ' . $row['birthDate'] . '</p>';
                                echo '<p class="col-md-3"><b>Sire:</b> ' . $row['sire'] . '</p>';
                                echo '<p class="col-md-3"><b>Dam:</b> ' . $row['dam'] . '</p>';
                                echo '<p class="col-md-6"><b>Breed Composition:</b> ' . $row['breedComp'] . '</p>';
                                echo '<p class="col-md-6"><b>Genetic Line:</b> ' . $row['geneticLine'] . '</p>'; */
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Use:</b> ' . $row['doeUse'] . '</h4></div>';
                                echo '<div class="col-xs-6"><select class="form-control" name="doeUse">
                                        <option selected="selected" value="">--</option>
                                        <option>Meat</option>
                                        <option>Dairy</option>
                                    </select></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Parity:</b> ' . $row['parity'] . '</h4></div>';
                                echo '<div class="col-xs-6"><select class="form-control" name="parity">
                                        <option selected="selected" value="">--</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                    </select></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Location:</b> ' . $row['location'] . '</h4></div>';
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="location" placeholder="Site Name" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Kidding Date:</b> ';
                                if ($row['kiddingDate'] === '1970-01-01') {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['kiddingDate'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="kiddingDate" data-provide="datepicker" placeholder="mm/dd/yyyy" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Weaning Date:</b> ';
                                if ($row['weaningDate'] === '1970-01-01') {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['weaningDate'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="weaningDate" data-provide="datepicker" placeholder="mm/dd/yyyy" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Breed Date:</b> ';
                                if ($row['breedDate'] === '1970-01-01') {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['breedDate'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="breedDate" data-provide="datepicker" placeholder="mm/dd/yyyy" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Service Sire:</b> ';
                                if (!$row['serviceSire']) {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['serviceSire'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="serviceSire" placeholder="Service Sire" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Due Date:</b> ';
                                if ($row['dueDate'] === '1970-01-01') {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['dueDate'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="dueDate" data-provide="datepicker" placeholder="mm/dd/yyyy" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Cull Date:</b> ';
                                if ($row['cullDate'] === '1970-01-01') {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['cullDate'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6"><input type="text" class="form-control" name="cullDate" data-provide="datepicker" placeholder="mm/dd/yyyy" /></div></div>';
                                echo '<div class="row"><div class="col-xs-6"><h4><b>Cull Reason:</b> ';
                                if (!$row['cullReason']) {
                                    echo '--</h4></div>';
                                } else {
                                    echo $row['cullReason'] . '</h4></div>';
                                }
                                echo '<div class="col-xs-6">
                                <select class="form-control" name="cullReason">
                                    <option selected="selected" value="">--</option>
                                    <option>Died</option>
                                    <option>Age</option>
                                    <option>Open/Failed to Kid</option>
                                    <option>Lost Kid Early</option>
                                    <option>Bad Udder</option>
                                    <option>Foot Problems</option>
                                    <option>CL</option>
                                    <option>Single Birth</option>
                                    <option>Poor Performance</option>
                                    <option>Disposition</option>
                                    <option>Other</option>
                                </select>
                                </div></div>';
                                echo '<br /><input type="submit" name="submit" class="btn btn-warning pull-right no-print"/>';
                            }

                            mysqli_close($connection);
                        ?>
                        </fieldset>
                    </form>
                    <a href="index.php"><button class="btn btn-warning pull-left no-print">Cancel</button></a>   
                </div>
            </div>
            
            
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>
    </body>

</html>