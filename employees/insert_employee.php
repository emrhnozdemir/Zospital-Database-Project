<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Employee Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $profession = $_POST['profession'];
    $doctorCheck = TRUE;
    $dTitle = "";
    $dDepartment = "";
    $nPCount = "";
    if ($profession == "doctor") {
        $dTitle = $_POST['dTitle'];
        $dDepartment = $_POST['dDepartment'];
        $doctorCheck = TRUE;
    } else if ($profession == "nurse") {
        $nPCount = $_POST['nPCount'];
        $doctorCheck = FALSE;
    }
    $eName = $_POST['eName'];
    $nationality = $_POST['nationality'];
    $eMail = $_POST['eMail'];
    $ePhoneNo = $_POST['ePhoneNo'];
    $salary = $_POST['salary'];
    if (!empty($eName) and !empty($nationality) and !empty($eMail) and !empty($ePhoneNo) and !empty($salary) and (($doctorCheck and !empty($dTitle) and !empty($dDepartment)) or (!$doctorCheck and !empty($nPCount)))) {
        
        $sql_statement = "INSERT INTO Employees (eName, ePhoneNo, eMail, nationality, salary) VALUES ('$eName', '$ePhoneNo', '$eMail', '$nationality', $salary)";
        $result = mysqli_query($db, $sql_statement);
        $result_doctor = FALSE;
        $result_nurse = FALSE;
        if ($doctorCheck) {
            $dID = mysqli_fetch_assoc(mysqli_query($db, "SELECT LAST_INSERT_ID()"))["LAST_INSERT_ID()"];
            $sql_statement_doctors = "INSERT INTO Doctors (dID, title, department) VALUES ($dID, '$dTitle', '$dDepartment')";
            $result_doctor = mysqli_query($db, $sql_statement_doctors);
        } else {
            $nID = mysqli_fetch_assoc(mysqli_query($db, "SELECT LAST_INSERT_ID()"))["LAST_INSERT_ID()"];
            $sql_statement_nurses = "INSERT INTO Nurses (nID, pCount) VALUES ($nID, $nPCount)";
            $result_nurse = mysqli_query($db, $sql_statement_nurses);
        }
        
        if($result == 1 and ($result_doctor or $result_nurse)) {
            echo "<a>Success - " . $eName . " has been inserted to the database as a " . $profession . ".</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the employee.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Employee Page</a></div>
        <div><a href="employee_insertion.php">Insert Another Employee</a></div>
    </div>
</body>
