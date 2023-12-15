<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Appointment Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $aID = $_POST['ids'];
    if(!empty($aID))
    {
        $dID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Gets WHERE aID = $aID"))["dID"];
        $outID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Makes WHERE aID = $aID"))["outID"]; //outpatient id aldık
        $dName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Employees WHERE eID = $dID"))["eName"]; //doctor name
        $title = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Doctors WHERE dID = $dID"))["title"]; //doctor title
        $pName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Patients  WHERE pID = $outID"))["pName"]; //outpatient name
        $aDate = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Appointments WHERE aID=$aID"))["aDate"];
        $sql_statement_gets = "DELETE FROM Gets WHERE aID = $aID AND dID=$dID";
        $sql_statement_makes = "DELETE FROM Makes WHERE aID = $aID AND outID=$outID";
        $sql_statement_app = "DELETE FROM Appointments WHERE aID = $aID";
        $result_gets = mysqli_query($db, $sql_statement_gets);
        $result_makes= mysqli_query($db, $sql_statement_makes);
        $result_app = mysqli_query($db, $sql_statement_app);
        if($result_app == 1 and $result_gets==1 and $result_makes==1) {
            echo "<a>Success - $title $dName - Patient: $pName -  (Date: $aDate)</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Appointment Page</a></div>
    <div><a href="appointment_deletion.php">Delete Another Appointment</a></div>
    </div>
</body>
