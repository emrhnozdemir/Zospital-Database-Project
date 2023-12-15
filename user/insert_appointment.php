<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Appointment Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";
    $aApproval = 1;
    $aDate = $_POST['aDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $price = "50";
    $pName = $_POST['pName'];
    $bloodType = $_POST['bloodType'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $pPhoneNo = $_POST['pPhoneNo'];
    $doctorID = $_POST['dids'];
    if (!empty($aDate) and !empty($price) and !empty($startTime) and !empty($endTime) and
      !empty($pName) and !empty($bloodType) and !empty($age) and !empty($weight ) and 
      !empty($height) and !empty($pPhoneNo) and !empty($doctorID) ){
        $sql_statement_app = "INSERT INTO Appointments (aDate, price, startTime, endTime, aApproval) VALUES ('$aDate', $price, '$startTime', '$endTime', $aApproval)";
        $result_app = mysqli_query($db, $sql_statement_app);
        if($result_app == 1){
            echo "<a>Updated database </a>";
            $search=mysqli_query($db, "SELECT LAST_INSERT_ID()");
            $aID=mysqli_fetch_assoc($search)["LAST_INSERT_ID()"];
            $sql_statement_gets = "INSERT INTO Gets (dID,aID) VALUES ($doctorID, $aID)";
            $result_gets = mysqli_query($db, $sql_statement_gets);
            date_default_timezone_set("Europe/Istanbul");
            $currentDate=date("Y-m-d");
            $currentTime = date("H:i:s");

            $sql_statement = "INSERT INTO Patients (pName, bloodType, age, weight, height, pPhoneNo) VALUES ('$pName', '$bloodType', $age, $weight, $height, '$pPhoneNo')";
            $result = mysqli_query($db, $sql_statement);
            $outID = mysqli_fetch_assoc(mysqli_query($db, "SELECT LAST_INSERT_ID()"))["LAST_INSERT_ID()"];
            $sql_statement_nurses = "INSERT INTO Outpatients (outID, aCount) VALUES ($outID, 0)";
            $result_outpatient = mysqli_query($db, $sql_statement_nurses);

            $sql_statement_makes = "INSERT INTO Makes (rMomentD, outID, aID, rMomentT) VALUES ('$currentDate', $outID, $aID, '$currentTime')";
            $result_makes= mysqli_query($db, $sql_statement_makes);
            
            if($result_app == 1 and $result_gets==1 and $result_makes==1) {
                echo "<a>Success - Appointment " . $aDate . " " . $startTime . " -" . $endTime . " has been inserted to the database.</a>";
            } else {
                echo "<a>Error</a>";
            }
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the appointment.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Appointment Page</a></div>
    </div>
</body>
