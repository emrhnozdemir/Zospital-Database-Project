<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Employee Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if(!empty($_POST['ids']))
    {
        $eID = $_POST['ids'];
        $eName = mysqli_fetch_assoc(mysqli_query($db, "SELECT eName FROM Employees WHERE eID = $eID"))["eName"];
        
        $doctorCheck = mysqli_query($db, "SELECT * FROM Doctors WHERE dID = $eID");
        $nurseCheck = mysqli_query($db, "SELECT * FROM Nurses WHERE nID = $eID");
        if ($doctorCheck) {
            $result = mysqli_query($db, "SELECT aID FROM Gets WHERE dID = $eID");
            while ($row = mysqli_fetch_assoc($result)) {
                $aID = $row["aID"];
                $makesDeletion = mysqli_query($db, "DELETE FROM Makes WHERE aID = $aID");
                $getsDeletion = mysqli_query($db, "DELETE FROM Gets WHERE aID = $aID");
                $appointmentDeletion = mysqli_query($db, "DELETE FROM Appointments WHERE aID = $aID");
            }
            $doctorDeletion = mysqli_query($db, "DELETE FROM Doctors WHERE dID = $eID");
            $employeeDeletion = mysqli_query($db, "DELETE FROM Employees WHERE eID = $eID");
        } else if ($nurseCheck) {
            $nurseDeletion = mysqli_query($db, "DELETE FROM Nurses WHERE nID = $eID");
            $employeeDeletion = mysqli_query($db, "DELETE FROM Employees WHERE eID = $eID");
        }
        
        if(($doctorCheck or $nurseCheck)) {
            echo "<a>Success - " . $eName . " has been deleted from the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Employee Page</a></div>
    <div><a href="employee_deletion.php">Delete Another Employee</a></div>
    </div>
</body>
