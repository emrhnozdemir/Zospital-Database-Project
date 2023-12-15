<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Appointment Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-5"><b>ID</b></div>
                <div class="item-col item-col-20"><b>Appointment Date</b></div>
                <div class="item-col item-col-10"><b>Start Time</b></div>
                <div class="item-col item-col-10"><b>End Time</b></div>
                <div class="item-col item-col-30"><b>Doctor Name</b></div>
                <div class="item-col item-col-20"><b>Patient Name</b></div>
                <div class="item-col item-col-10"><b>Price</b></div>
            </li>

            <?php

            include "../config.php";


            $sql_statement = "SELECT * FROM Appointments";

            $result = mysqli_query($db, $sql_statement);
            while($rows = mysqli_fetch_assoc($result)) {
                $aID = $rows['aID'];
                $dID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Gets WHERE aID = $aID"))["dID"];
                $outID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Makes WHERE aID = $aID"))["outID"]; //outpatient id aldık
                $dName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Employees WHERE eID = $dID"))["eName"]; //doctor name
                $title = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Doctors WHERE dID = $dID"))["title"]; //doctor title
                if($title=="Professor"){
                    $title="Prof.";
                }
                else if($title=="Associate Professor"){
                    $title="Assoc. Prof.";
                }
                else if($title=="Assistant Professor"){
                    $title="Asst. Prof.";
                }
                $pName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Patients WHERE pID = $outID"))["pName"]; //outpatient name
                $aDate = $rows['aDate'];
                $price = $rows['price'];
                $startTime = $rows['startTime'];
                $endTime = $rows['endTime'];
                
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $aID.
                "</div><div class=\"item-col item-col-20\" data-label=\"Appointment Date\">" . $aDate.
                "</div><div class=\"item-col item-col-10\" data-label=\"Start Time\">" . $startTime . 
                "</div><div class=\"item-col item-col-10\" data-label=\"End Time\">" . $endTime .
                "</div><div class=\"item-col item-col-30\" data-label=\"Doctor Name\"> ".$title." " . $dName . 
                "</div><div class=\"item-col item-col-20\" data-label=\"Patient Name\">" . $pName . 
                "</div><div class=\"item-col item-col-10\" data-label=\"Price\"> $" . $price . 
                "</div>
                </li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="appointment_selection.php">Filter Appointments</a></div>
        <div><a href="appointment_deletion.php">Delete an Appointment</a></div>
        <div><a href="appointment_insertion.php">Insert an Appointment</a></div>
    </div>
</body>
