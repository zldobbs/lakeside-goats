<?php  
if (isset($_POST['submit'])) {
    require "../config/header.php";
    $connection = db_connect();

    // USE ESCAPE CHARACTERS!
    // Gathering of every variable from forms
    $name = db_quote($_POST['name']);
    $doeID = db_quote($_POST['doeID']);
    $birthDate = db_quote(date("Y-m-d", strtotime($_POST['birthDate']))); // Convert date to correct format
    $sire = db_quote($_POST['sire']);
    $dam = db_quote($_POST['dam']);
    $breedComp = db_quote($_POST['breedComp']);
    $geneticLine = db_quote($_POST['geneticLine']);
    $doeUse = db_quote($_POST['doeUse']);
    $parity = db_quote($_POST['parity']);
    $location = db_quote($_POST['location']);
    $kiddingDate = db_quote(date("Y-m-d", strtotime($_POST['kiddingDate']))); // Convert date to correct format
    $weaningDate = db_quote(date("Y-m-d", strtotime($_POST['weaningDate']))); // Convert date to correct format
    $breedDate = db_quote(date("Y-m-d", strtotime($_POST['breedDate']))); // Convert date to correct format
    $serviceSire = db_quote($_POST['serviceSire']);
    $dueDate = db_quote(date("Y-m-d", strtotime($_POST['dueDate']))); // Convert date to correct format
    $cullDate = db_quote(date("Y-m-d", strtotime($_POST['cullDate']))); // Convert date to correct format
    $cullReason = db_quote($_POST['cullReason']);

    $result = db_query("
    INSERT INTO doe_data 
    (name, doeID, birthDate, sire, dam, breedComp, geneticLine, doeUse, parity, location, kiddingDate, weaningDate, breedDate, serviceSire, dueDate, cullDate, cullReason) 
    VALUES 
    (" . $name . "," . $doeID . "," . $birthDate . "," . $sire . "," . $dam . "," . $breedComp . "," . $geneticLine . "," . $doeUse . "," . $parity . "," . $location . "," . $kiddingDate . "," . $weaningDate . "," . $breedDate . "," . $serviceSire . "," . $dueDate . "," . $cullDate . "," . $cullReason . ")
    ");

    if ($result === false) {
        echo "Unable to update database!";
        echo mysqli_error($connection);
    }

    mysqli_close($connection);
    header('Location: index.php') ;
}
?>


<!-- Remember to update links for css/scripts when changing directories! -->
<html>
    <head>
        <title>New Profile</title>
        <link rel="stylesheet" href="../css/bootstrap.css" >
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
                <h1>New Profile</h1>
                <p>This page is dedicated to the creation of a new entry into the database of does. Please ensure that you fill out every form correctly.</p>
            </div>
            <div class="row">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <fieldset class="form-group">
                        <div class="col-md-4 col-xs-12">
                            <label>Doe Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Billy Bob" required/>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <label>Doe ID</label>
                            <input type="text" class="form-control" name="doeID" placeholder="ID Number" required/>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Birth Date</label>
                            <input type="text" class="form-control" name="birthDate" data-provide="datepicker" placeholder="mm/dd/yyyy" required/>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Sire</label>
                            <input type="text" class="form-control" name="sire" placeholder="Mr. Bob" required/>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Dam</label>
                            <input type="text" class="form-control" name="dam" placeholder="Mrs. Bob" required/>
                        </div>
                        <div class="col-md-3 col-xs-12">    
                            <label>Breed Composition</label>
                            <input type="text" list="breedComp" class="form-control" name="breedComp" placeholder="Breed Composition" required />
                            <datalist id="breedComp">
                                <option selected="selected" value=""></option>
                                <option>Alpine</option>
                                <option>Angora</option>
                                <option>Boer</option>
                                <option>Boer Cross</option>
                                <option>Kiko</option>
                                <option>Kiko Cross</option>
                                <option>Kinder</option>
                                <option>Lamancha</option>
                                <option>Nigerian Drowf</option>
                                <option>Nubian</option>
                                <option>Nubian Cross</option>
                                <option>Oberhasli</option>
                                <option>Pygmy</option>
                                <option>Saanen</option>
                                <option>Savanna</option>
                                <option>Spanish</option>
                                <option>Tennessee Fainting</option>
                                <option>Toggenburg</option>
                                <option>Cross Bred</option>
                            </datalist>
                        </div>
                        <div class="col-md-3 col-xs-12">    
                            <label>Genetic Line</label>
                            <input type="text" class="form-control" name="geneticLine" placeholder="Genetic Line" required />
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <label>Use</label>
                            <select class="form-control" name="doeUse" required>
                                <option selected="selected" disabled="disabled" value="">Select an option</option>
                                <option>Meat</option>
                                <option>Dairy</option>
                            </select>
                        </div>
                        <div class="col-md-1 col-xs-12">
                            <label>Parity</label> <!-- number of litters had -->
                            <select class="form-control" name="parity" required>
                                <option selected="selected" value="" disabled="disabled"></option>
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
                            <input type="text" class="form-control" name="location" placeholder="Site Name" required/>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Latest Kidding Date</label>
                            <input type="text" class="form-control" name="kiddingDate" data-provide="datepicker" placeholder="mm/dd/yyyy" />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Latest Weaning Date</label>
                            <input type="text" class="form-control" name="weaningDate" data-provide="datepicker" placeholder="mm/dd/yyyy"  />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Latest Breed Date</label>
                            <input type="text" class="form-control" name="breedDate" data-provide="datepicker" placeholder="mm/dd/yyyy"  />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Service Sire</label>
                            <input type="text" class="form-control" name="serviceSire" placeholder="Which goat bred her?"  />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Next Due Date</label>
                            <input type="text" class="form-control" name="dueDate" data-provide="datepicker" placeholder="mm/dd/yyyy" />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Cull Date</label>
                            <input type="text" class="form-control" name="cullDate" data-provide="datepicker" placeholder="mm/dd/yyyy" />
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label>Cull Reason</label>
                            <input type="text" class="form-control" list="cullReason" name="cullReason">
                            <datalist id="cullReason">
                                <option selected="selected" value=""></option>
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
                            </datalist>
                        </div>
                        
                        <div class="col-xs-12">
                            <br /><input type="submit" name="submit" class="btn btn-warning pull-right"/>
                        </div>


                        
                    </fieldset>
                </form>
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