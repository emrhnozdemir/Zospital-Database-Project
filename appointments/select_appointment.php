<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Appointment Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $targetdID = $_POST['dids'];
        $dName=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Employees WHERE eID = $targetdID"))["eName"];
        $dTitle=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Doctors WHERE dID=$targetdID"))["title"];
       
        echo "<div style=\"margin-top: 2em;\"><a>The list of appointments of ".$dTitle." ".$dName. ".</a></div>";
    ?>
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
            
            $sql_statement = "SELECT * FROM Gets WHERE dID=$targetdID";

            $result = mysqli_query($db, $sql_statement);
            
            $counter = 0;
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
                $Appointmentresult = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Appointments WHERE aID = $aID"));
                $aDate=$Appointmentresult["aDate"];
                $price = $Appointmentresult['price'];
                $startTime = $Appointmentresult['startTime'];
                $endTime = $Appointmentresult['endTime'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $aID.
                "</div><div class=\"item-col item-col-20\" data-label=\"Appointment Date\">" . $aDate.
                "</div><div class=\"item-col item-col-10\" data-label=\"Start Time\">" . $startTime . 
                "</div><div class=\"item-col item-col-10\" data-label=\"End Time\">" . $endTime .
                "</div><div class=\"item-col item-col-30\" data-label=\"Doctor Name\"> ".$title." " . $dName . 
                "</div><div class=\"item-col item-col-20\" data-label=\"Patient Name\">" . $pName . 
                "</div><div class=\"item-col item-col-10\" data-label=\"Price\"> $" . $price . 
                "</div>
                </li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no doctor appointment for ".$dTitle." ".$dName. ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Appointment Page</a></div>
        <div><a href="appointment_selection.php">Filter Another Appointment</a></div>
    </div>
</body>
