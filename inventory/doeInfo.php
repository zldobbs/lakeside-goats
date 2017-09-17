<!-- Remember to update links for css/scripts when changing directories! -->

<html>
    <head>
        <title>Doe Information</title>
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
            <div class="col-xs-12">
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

                       <tbody>
                <?php
                    require "../config/header.php";
                    $connection = db_connect();
                    $checkID = db_quote($_GET['sendID']);
                    $result = db_query("SELECT * FROM doe_data WHERE doeID = " . $checkID);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (!$row) {
                        echo '<h3>Failure to find doe!</h3>';
                    } else {
                    
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
                        echo '</tr></tbody></table>';  
                        echo '<a href="deleteDoe.php?sendID=' . $row['doeID'] . '" ><button class="btn btn-warning pull-right no-print">Delete</button></a>';     
                        echo '<a href="updateInfo.php?sendID=' . $row['doeID'] . '" ><button class="btn btn-warning pull-right no-print">Edit</button></a>';   
                        echo '<a href="index.php"><button class="btn btn-warning pull-left no-print">Back</button></a>';     

                    }
                    
                    mysqli_close($connection);
                ?>
                           
            </div>
            
            
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>