<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $patientType = $_POST['patientType'];
    $inpatientCheck = TRUE;
    $arrivalDate = "";
    $leavingDate = "";
    $rID = "";
    if ($patientType == "inpatient") {
        $arrivalDate = $_POST['arrivalDate'];
        $leavingDate = $_POST['leavingDate'];
        $rID = $_POST['rID'];
        $inpatientCheck = TRUE;
    } else if ($patientType == "outpatient") {
        $inpatientCheck = FALSE;
    }
    $pName = $_POST['pName'];
    $bloodType = $_POST['bloodType'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $pPhoneNo = $_POST['pPhoneNo'];
    if (!empty($pName) and !empty($bloodType) and !empty($age) and !empty($weight) and !empty($height) and (($inpatientCheck and !empty($arrivalDate) and !empty($leavingDate) and !empty($rID)) or (!$inpatientCheck))) {
        
        $sql_statement = "INSERT INTO Patients (pName, bloodType, age, weight, height, pPhoneNo) VALUES ('$pName', '$bloodType', $age, $weight, $height, '$pPhoneNo')";
        $result = mysqli_query($db, $sql_statement);
        $result_inpatient = FALSE;
        $result_outpatient = FALSE;
        if ($inpatientCheck) {
            $iID = mysqli_fetch_assoc(mysqli_query($db, "SELECT LAST_INSERT_ID()"))["LAST_INSERT_ID()"];
            $sql_statement_doctors = "INSERT INTO Inpatients (iID, arrivalDate, leavingDate) VALUES ($iID, '$arrivalDate', '$leavingDate')";
            $result_inpatient = mysqli_query($db, $sql_statement_doctors);
            $sql_statement_doctors = "INSERT INTO Stays_in (iID, rID, sSince) VALUES ($iID, $rID, '$arrivalDate')";
            $result_inpatient = mysqli_query($db, $sql_statement_doctors);
        } else {
            $outID = mysqli_fetch_assoc(mysqli_query($db, "SELECT LAST_INSERT_ID()"))["LAST_INSERT_ID()"];
            $sql_statement_nurses = "INSERT INTO Outpatients (outID, aCount) VALUES ($outID, 0)";
            $result_outpatient = mysqli_query($db, $sql_statement_nurses);
        }
        
        if($result == 1 and ($result_inpatient or $result_outpatient)) {
            echo "<a>Success - " . $pName . " has been inserted to the database as an " . $patientType . ".</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the patient.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Patient Page</a></div>
        <div><a href="patient_insertion.php">Insert Another Patient</a></div>
    </div>
</body>
