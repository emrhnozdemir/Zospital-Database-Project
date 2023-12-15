<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Appointment Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_appointment.php" method="POST">
    <div class= "inputI"><a>Select an Appointment:</a></div>
    <div class= "inputI"><select name="ids">

    <?php

    $sql_command_app = "SELECT * FROM Appointments";
    $myresult = mysqli_query($db, $sql_command_app);
    while($rows = mysqli_fetch_assoc($myresult)) {
        $aID = $rows['aID'];
        $dID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Gets WHERE aID = $aID"))["dID"];
        $oID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Makes WHERE aID = $aID"))["outID"]; //outpatient id aldık
        $dName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Employees WHERE eID = $dID"))["eName"]; //doctor name
        $title = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Doctors WHERE dID = $dID"))["title"]; //doctor title
        if($title=="Professor"){
            $title="Prof.";
        }
        if($title=="Associate Professor"){
            $title="Assoc. Prof.";
        }
        if($title=="Assistant Professor"){
            $title="Asst. Prof.";
        }
        $pName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Patients  WHERE pID = $oID"))["pName"]; //outpatient name
        $aDate = $rows['aDate'];
        $price = $rows['price'];
        $startTime = $rows['startTime'];
        $endTime = $rows['endTime'];
        echo "<option value=$aID>Dr. ". $dName .": ". $pName ." -  (" . $aDate . ", " . $startTime . "-" . $endTime . ")</option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Appointment Page</a></div>
        <div><a href="appointment_selection.php">Filter Appointments</a></div>
        <div><a href="appointment_insertion.php">Insert an Appointment</a></div>
    </div>
</body>
