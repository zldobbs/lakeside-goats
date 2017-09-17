
<!-- Remember to update links for css/scripts when changing directories! -->

<html>
    <head>
        <title>Animal Status Report</title>
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
                <?php  
                if (isset($_POST['submit'])) {
                    require "../config/header.php";
                    $connection = db_connect();
                    $filter="";
                    // USE ESCAPE CHARACTERS!
                    // Gathering of every variable from forms
                    if ($_POST['birthDate']) {
                        $birthDate = db_quote(date("Y-m-d", strtotime($_POST['birthDate']))); // Convert date to correct format
                        if ($filter) {
                            $filter = $filter . " AND birthDate > " . $birthDate;
                        } else {
                            $filter = "birthDate > " . $birthDate;
                        }
                    }
                    if ($_POST['sire']) {
                        $sire = db_quote($_POST['sire']);
                        if ($filter) {
                            $filter = $filter . " AND sire = " . $sire;
                        } else {
                            $filter = "sire = " . $sire;
                        }
                    }    
                    
                    if ($_POST['dam']) {
                        $dam = db_quote($_POST['dam']);
                        if ($filter) {
                            $filter = $filter . " AND dam = " . $dam;
                        } else {
                            $filter = "dam = " . $dam;
                        }
                    }    
                   
                    if ($_POST['breedComp']) {
                        $breedComp = db_quote($_POST['breedComp']);
                        if ($filter) {
                            $filter = $filter . " AND breedComp = " . $breedComp;
                        } else {
                            $filter = "breedComp = " . $breedComp;
                        }
                    }    
                   
                    if ($_POST['geneticLine']) {
                        $geneticLine = db_quote($_POST['geneticLine']);
                        if ($filter) {
                            $filter = $filter . " AND geneticLine = " . $geneticLine;
                        } else {
                            $filter = "geneticLine = " . $geneticLine;
                        }
                    }    
                    
                    if ($_POST['doeUse']) {
                        $doeUse = db_quote($_POST['doeUse']);
                        if ($filter) {
                            $filter = $filter . " AND doeUse = " . $doeUse;
                        } else {
                            $filter = "doeUse = " . $doeUse;
                        }
                    }    
                    
                    if ($_POST['parity']) {
                        $parity = db_quote($_POST['parity']);
                        if ($filter) {
                            $filter = $filter . " AND parity = " . $parity;
                        } else {
                            $filter = "parity = " . $parity;
                        }
                    }    
                    
                    if ($_POST['location']) {
                        $location = db_quote($_POST['location']);
                        if ($filter) {
                            $filter = $filter . " AND location = " . $location;
                        } else {
                            $filter = "location = " . $location;
                        }
                    }    
                    
                    if ($_POST['kiddingDate']) {
                        $kiddingDate = db_quote(date("Y-m-d", strtotime($_POST['kiddingDate']))); // Convert date to correct format
                        if ($filter) {
                            $filter = $filter . " AND kiddingDate > " . $kiddingDate;
                        } else {
                            $filter = "kiddingDate > " . $kiddingDate;
                        }
                    }
                    
                    if ($_POST['weaningDate']) {
                        $weaningDate = db_quote(date("Y-m-d", strtotime($_POST['weaningDate']))); // Convert date to correct format
                        if ($filter) {
                            $filter = $filter . " AND weaningDate > " . $weaningDate;
                        } else {
                            $filter = "weaningDate > " . $weaningDate;
                        }
                    }
                    
                    if ($_POST['breedDate']) {
                        $breedDate = db_quote(date("Y-m-d", strtotime($_POST['breedDate']))); // Convert date to correct format
                        if ($filter) {
                            $filter = $filter . " AND breedDate > " . $breedDate;
                        } else {
                            $filter = "breedDate > " . $breedDate;
                        }
                    }
                   
                    if ($_POST['serviceSire']) {
                        $serviceSire = db_quote($_POST['serviceSire']);
                        if ($filter) {
                            $filter = $filter . " AND serviceSire = " . $serviceSire;
                        } else {
                            $filter = "serviceSire = " . $serviceSire;
                        }
                    }    
                    
                    if ($_POST['dueDate']) {
                        $dueDate = db_quote(date("Y-m-d", strtotime($_POST['dueDate']))); // Convert date to correct format
                        if ($filter) {
                            $filter = $filter . " AND dueDate > " . $dueDate;
                        } else {
                            $filter = "dueDate > " . $dueDate;
                        }
                    }
                    
                    if ($_POST['cullDate']) {
                        $cullDate = db_quote(date("Y-m-d", strtotime($_POST['cullDate']))); // Convert date to correct format
                        if ($filter) {
                            $filter = $filter . " AND cullDate > " . $cullDate;
                        } else {
                            $filter = "cullDate > " . $cullDate;
                        }
                    }
                    
                    if ($_POST['cullReason']) {
                        $cullReason = db_quote($_POST['cullReason']);
                        if ($filter) {
                            $filter = $filter . " AND cullReason = " . $cullReason;
                        } else {
                            $filter = "cullReason = " . $cullReason;
                        }
                    }  
                    
                    
                    
                    $result = "";
                    if (!$filter) {
                        $result = db_query("SELECT * FROM doe_data ORDER BY CAST(doeID AS UNSIGNED INTEGER)");
                    } else {
                        $result = db_query("SELECT * FROM doe_data WHERE " . $filter . "ORDER BY CAST(doeID AS UNSIGNED INTEGER)");
                    }
                
                    if (!$result) {
                        echo '<h1>Error encountered while fetching result!</h1>';
                        echo '<p>NO DOES FOUND WHERE ' . $filter . '</p>';
                    } else {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if (!$row) {
                            echo '<h1>No Results Found!</h1>';
                            echo 'NO DOES FOUND WHERE ' . $filter;
                        } else {
                        echo '<div class="col-xs-12">
                        <table class = "table" style="background-color: #ffffff; color: #000">

                       <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Birth Date</th>
                              <th>Sire</th> 
                              <th>Dam</th>
                              <th>Breed Composition</th>
                              <th>Genetic Line</th>
                              <th>Use</th>
                              <th>Parity</th>
                              <th>Location</th>
                              <th>Kidding Date</th>
                              <th>Weaning Date</th>
                              <th>Breed Date</th>
                              <th>Service Sire</th>
                              <th>Due Date</th>
                              <th>Cull Date</th>
                              <th>Cull Reason</th>
                          </tr>
                       </thead>

                       <tbody>';
                        }
                        while ($row) {
                           
                            echo '<tr>';
                            echo '<td>' . $row['doeID'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['birthDate'] . '</td>';
                            echo '<td>' . $row['sire'] . '</td>';
                            echo '<td>' . $row['dam'] . '</td>';
                            echo '<td>' . $row['breedComp'] . '</td>';
                            echo '<td>' . $row['geneticLine'] . '</td>';
                            echo '<td>' . $row['doeUse'] . '</td>';
                            echo '<td>' . $row['parity'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td>';
                            if ($row['kiddingDate'] === '1970-01-01') {
                                echo '--</td>';
                            } else {
                                echo $row['kiddingDate'] . '</td>';
                            }
                            echo '<td>';
                            if ($row['weaningDate'] === '1970-01-01') {
                                echo '--</td>';
                            } else {
                                echo $row['weaningDate'] . '</td>';
                            }
                            echo '<td>';
                            if ($row['breedDate'] === '1970-01-01') {
                                echo '--</td>';
                            } else {
                                echo $row['breedDate'] . '</td>';
                            }
                            echo '<td>';
                            if (!$row['serviceSire']) {
                                echo '--</td>';
                            } else {
                                echo $row['serviceSire'] . '</td>';
                            }
                            echo '<td>';
                            if ($row['dueDate'] === '1970-01-01') {
                                echo '--</td>';
                            } else {
                                echo $row['dueDate'] . '</td>';
                            }
                            echo '<td>';
                            if ($row['cullDate'] === '1970-01-01') {
                                echo '--</td>';
                            } else {
                                echo $row['cullDate'] . '</td>';
                            }
                            echo '<td>';
                            if (!$row['cullReason']) {
                                echo '--</td>';
                            } else {
                                echo $row['cullReason'] . '</td>';
                            }
                            echo '</tr>';
                            //echo '<a href="updateInfo.php?sendID=' . $row['doeID'] . '" ><button class="btn btn-warning pull-right">Edit</button></a>';
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        }
                    }
                    echo '</tbody></table></div>';
                    mysqli_close($connection);
                } else {
                    echo '<h1>No data sent!</h1>';
                }
                ?>
            
            
            
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>