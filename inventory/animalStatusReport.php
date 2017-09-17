<html>
    <head>
        <title>Animal Status Report</title>
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
            <div class="jumbotron">
                <h1>Animal Status Report</h1>
                <p>Specify the criteria you wish to be evaluated when selecting does from the herd</p>
            </div>
            <div class="row">
                <form action="animalStatusReportSent.php" method="post">
                    <?php
                            require "../config/header.php";
                            $connection = db_connect();
                            if (!$connection) {
                                echo 'Failed to connect to database!';
                            }
                    ?>
                    <fieldset class="form-group">
                        <div class="col-md-3 col-xs-12">
                            <label>Birth Date After</label>
                            <input type="text" class="form-control" name="birthDate" data-provide="datepicker" placeholder="mm/dd/yyyy"/>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Sire</label>
                            <select class="form-control" name="sire">
                                <option selected="selected" value="">--</option>
                                <?php 
                                    $result = db_query("SELECT DISTINCT sire FROM doe_data");
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    while($row) {
                                        echo '<option>' . $row['sire'] . '</option>';
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Dam</label>
                            <select class="form-control" name="dam">
                                <option selected="selected" value="">--</option>
                                <?php 
                                    $result = db_query("SELECT DISTINCT dam FROM doe_data");
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    while($row) {
                                        echo '<option>' . $row['dam'] . '</option>';
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">    
                            <label>Breed Composition</label>
                            <select class="form-control" name="breedComp">
                                <option selected="selected" value="">--</option>
                                <option>Alpine</option>
                                <option>Angora</option>
                                <option>Boer</option>
                                <option>Kiko</option>
                                <option>Kinder</option>
                                <option>Lamancha</option>
                                <option>Nigerian Drowf</option>
                                <option>Nubian</option>
                                <option>Oberhasli</option>
                                <option>Pygmy</option>
                                <option>Saanen</option>
                                <option>Savanna</option>
                                <option>Spanish</option>
                                <option>Tennessee Fainting</option>
                                <option>Toggenburg</option>
                                <option>Cross Bred</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Genetic Line</label>
                            <select class="form-control" name="geneticLine">
                                <option selected="selected" value="">--</option>
                                <?php 
                                    $result = db_query("SELECT DISTINCT geneticLine FROM doe_data");
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    while($row) {
                                        echo '<option>' . $row['geneticLine'] . '</option>';
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <label>Use</label>
                            <select class="form-control" name="doeUse">
                                <option selected="selected" value="">--</option>
                                <option>Meat</option>
                                <option>Dairy</option>
                            </select>
                        </div>
                        <div class="col-md-1 col-xs-12">
                            <label>Parity</label> <!-- number of litters had -->
                            <select class="form-control" name="parity">
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
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Location</label>
                            <select class="form-control" name="location">
                                <option selected="selected" value="">--</option>
                                <?php 
                                    $result = db_query("SELECT DISTINCT location FROM doe_data");
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    while($row) {
                                        echo '<option>' . $row['location'] . '</option>';
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Kidding Date After</label>
                            <input type="text" class="form-control" name="kiddingDate" data-provide="datepicker" placeholder="mm/dd/yyyy" />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Weaning Date After</label>
                            <input type="text" class="form-control" name="weaningDate" data-provide="datepicker" placeholder="mm/dd/yyyy"  />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Breed Date After</label>
                            <input type="text" class="form-control" name="breedDate" data-provide="datepicker" placeholder="mm/dd/yyyy"  />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Service Sire</label>
                            <select class="form-control" name="serviceSire">
                                <option selected="selected" value="">--</option>
                                <?php 
                                    $result = db_query("SELECT DISTINCT serviceSire FROM doe_data");
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    while($row) {
                                        echo '<option>' . $row['serviceSire'] . '</option>';
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Due Date After</label>
                            <input type="text" class="form-control" name="dueDate" data-provide="datepicker" placeholder="mm/dd/yyyy" />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Cull Date After</label>
                            <input type="text" class="form-control" name="cullDate" data-provide="datepicker" placeholder="mm/dd/yyyy" />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Cull Reason</label>
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
                        </div>
                        
                        <div class="col-xs-12">
                            <br /><input type="submit" name="submit" class="btn btn-warning pull-right"/>
                        </div>


                        
                    </fieldset>
                </form>
            </div>
            
            
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>
    </body>

</html>