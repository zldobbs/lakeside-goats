<!-- Remember to update links for css/scripts when changing directories! -->

<html>
    <head>
        <title>Existing Does</title>
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
            <div class="jumbotron">
                <h1>The Herd</h1>
                <p>View the current data regarding Lakeside's Herd. You may add or remove does from this page.</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <h1>Dairy Herd</h1>
                    <table class = "table table-hover" style="background-color: #ffffff; color: #000">

                       <thead>
                          <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Location</th>
                             <th>Status</th>
                             <th></th><th></th>
                          </tr>
                       </thead>

                       <tbody>
                        <?php
                            require "../config/header.php";
                            $connection = db_connect();
   
                            $filter = "";
                            $result = db_query("SELECT * FROM doe_data WHERE doeUse = 'Dairy' ORDER BY CAST(doeID AS UNSIGNED INTEGER)");
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            while ($row) {
                                if (!$row['cullReason']) {
                                echo '<tr>';
                                
                                echo '<td>' . $row['doeID'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['location'] . '</td>';
                                echo '<td>GOOD</td>';
                                echo '<td><a href="doeInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-list-alt" style="color: #000"></span></a></td>';
                                echo '<td><a href="updateInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-edit" style="color: #000"></span></a></td>';
                                echo '</tr>';
                                } else {
                                    $cullID = db_quote($row['doeID']);
                                    if ($filter) {
                                        $filter = $filter . " OR doeID = " . $cullID;
                                    } else {
                                        $filter = "doeID = " . $cullID;
                                    }
                                    
                                }
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            }        
                            if ($filter) {
                                $result = db_query("SELECT * FROM doe_data WHERE doeUse = 'Dairy' AND ( " . $filter . " ) ORDER BY CAST(doeID AS UNSIGNED INTEGER)");
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                while ($row) {
                                    echo '<tr class="danger">';

                                    echo '<td>' . $row['doeID'] . '</td>';
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['location'] . '</td>';
                                    echo '<td>CULLED</td>';
                                    echo '<td><a href="doeInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-list-alt" style="color: #000"></span></a></td>';
                                    echo '<td><a href="updateInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-edit" style="color: #000"></span></a></td>';
                                    echo '</tr>';
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                }     
                            }   

                        ?>
                        </tbody>
                    </table>
                    <h1>Meat Herd</h1>
                    <table class = "table table-hover" style="background-color: #ffffff; color: #000">

                       <thead>
                          <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Location</th>
                             <th>Status</th> 
                             <th></th><th></th>
                          </tr>
                       </thead>

                       <tbody>
                        <?php

                            $filter = "";
                            $result = db_query("SELECT * FROM doe_data WHERE doeUse = 'Meat' ORDER BY CAST(doeID AS UNSIGNED INTEGER)");
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            while ($row) {
                                if (!$row['cullReason']) {
                                echo '<tr>';
                                
                                echo '<td>' . $row['doeID'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['location'] . '</td>';
                                echo '<td>GOOD</td>';
                                echo '<td><a href="doeInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-list-alt" style="color: #000"></span></a></td>';
                                echo '<td><a href="updateInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-edit" style="color: #000"></span></a></td>';
                                echo '</tr>';
                                } else {
                                    $cullID = db_quote($row['doeID']);
                                    if ($filter) {
                                        $filter = $filter . " OR doeID = " . $cullID;
                                    } else {
                                        $filter = "doeID = " . $cullID;
                                    }
                                    
                                }
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            }        
                            if ($filter) {
                                $result = db_query("SELECT * FROM doe_data WHERE doeUse = 'Meat' AND ( " . $filter . " ) ORDER BY CAST(doeID AS UNSIGNED INTEGER)");
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                while ($row) {
                                    echo '<tr class="danger">';

                                    echo '<td>' . $row['doeID'] . '</td>';
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['location'] . '</td>';
                                    echo '<td>CULLED</td>';
                                    echo '<td><a href="doeInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-list-alt" style="color: #000"></span></a></td>';
                                    echo '<td><a href="updateInfo.php?sendID=' . $row['doeID'] . '"><span class="glyphicon glyphicon-edit" style="color: #000"></span></a></td>';
                                    echo '</tr>';
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                }     
                            }

                            mysqli_close($connection);
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-xs-12">
                    <h1>Tools</h1>
                    <div class="well">
                        <h3>Add Doe</h3>
                        <p>Use this tool to add a new doe to either the dairy or meat herd.</p>
                        <a href="newProfile.php"><button class="btn btn-warning pull-right">Add Doe</button></a>
                        <br />
                        <br />
                    </div>
                    <div class="well">
                        <h3>Animal Status Report</h3>
                        <p>Generate a report of the herd based upon specified criteria.</p>
                        <a href="animalStatusReport.php"><button class="btn btn-warning pull-right">Generate</button></a>
                        <br />
                        <br />
                    </div>
                </div>
            </div>

        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>