<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Deletion Result ~</b></a></br></div>
    <div>

    <?php

    include "../config.php";

    if(!empty($_POST['ids']))
    {
        $pID = $_POST['ids'];
        $pName = mysqli_fetch_assoc(mysqli_query($db, "SELECT pName FROM Patients WHERE pID = $pID"))["pName"];
        
        $inCheck = mysqli_query($db, "SELECT * FROM Inpatients WHERE iID = $pID");
        $outCheck = mysqli_query($db, "SELECT * FROM Outpatient WHERE outID = $pID");
        $result_in = FALSE;
        $result_out = FALSE;
        $staysInDeletion = mysqli_query($db, "DELETE FROM Stays_in WHERE iID = $pID");
        $result_in = mysqli_query($db, "DELETE FROM Inpatients WHERE iID = $pID");

        $result = mysqli_query($db, "SELECT aID FROM Makes WHERE outID = $pID");
        while ($row = mysqli_fetch_assoc($result)) {
            $aID = $row["aID"];
            $makesDeletion = mysqli_query($db, "DELETE FROM Makes WHERE aID = $aID");
            $getsDeletion = mysqli_query($db, "DELETE FROM Gets WHERE aID = $aID");
            $appointmentDeletion = mysqli_query($db, "DELETE FROM Appointments WHERE aID = $aID");
        }
        $result_out = mysqli_query($db, "DELETE FROM Outpatients WHERE outID = $pID");
        $takes_result = mysqli_query($db, "DELETE FROM Takes WHERE pID = $pID");
        $has_result = mysqli_query($db, "DELETE FROM Has WHERE pID = $pID");
        $takes_result = mysqli_query($db, "DELETE FROM Pays WHERE pID = $pID");
        $patientDeletion = mysqli_query($db, "DELETE FROM Patients WHERE pID = $pID");
        
        if(($inCheck or $outCheck)) {
            echo "<a>Success - " . $pName . " has been deleted from the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Patient Page</a></div>
    <div><a href="patient_deletion.php">Delete Another Patient</a></div>
    </div>
</body>
