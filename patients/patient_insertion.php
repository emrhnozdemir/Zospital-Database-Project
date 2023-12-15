<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
    <script>
        function changePatType(selectElt) {
            var selectedPatientType = selectElt.options[selectElt.selectedIndex].value;
            if (selectedPatientType == "inpatient") {
                document.getElementById('inpatient-div-1').setAttribute("style", "display: block");
                document.getElementById('inpatient-div-2').setAttribute("style", "display: block");
                document.getElementById('inpatient-div-3').setAttribute("style", "display: block");
            } else if (selectedPatientType == "outpatient") {
                document.getElementById('inpatient-div-1').setAttribute("style", "display: none");
                document.getElementById('inpatient-div-2').setAttribute("style", "display: none");
                document.getElementById('inpatient-div-3').setAttribute("style", "display: none");
            }
        }
    </script>
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <?php

    include "../config.php";

    ?>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Insertion ~</b></a></br></div>
    <div style="width=920px;"><form action="insert_patient.php" method="POST">

        <div class= "inputI">
        <div style="margin-bottom: 1em;"><a>Patient Type: </a></div>
        <select onChange="changePatType(this)" name="patientType">
            <option value="inpatient">Inpatient</option>
            <option value="outpatient">Outpatient</option>
        </select></div>
        <div class= "inputI"><a>Patient Name:
        <input type="text" id="pName" name="pName"></a></div>
        <div class= "inputI">
        <div style="margin-bottom: 1em;"><a>Blood Type: </a></div>
        <select name="bloodType">
            <option value="0 Rh+">0 Rh+</option>
            <option value="0 Rh-">0 Rh-</option>
            <option value="A Rh+">A Rh+</option>
            <option value="A Rh-">A Rh-</option>
            <option value="B Rh+">B Rh+</option>
            <option value="B Rh-">B Rh-</option>
            <option value="AB Rh+">AB Rh+</option>
            <option value="AB Rh-">AB Rh-</option>
        </select></div>
        <div class= "inputI"><a>Age:
        <input type="text" id="age" name="age"></a></div>
        <div class= "inputI"><a>Weight:
        <input type="text" id="weight" name="weight" placeholder="in kg"></a></div>
        <div class= "inputI"><a>Height:
        <input type="text" id="height" name="height" placeholder="in cm"></a></div>
        <div class= "inputI"><a>Phone No:
        <input type="text" id="pPhoneNo" name="pPhoneNo"></a></div>
        <div id="inpatient-div-1" style="display: block;" class="inputI"><a>Arrival Date:
        <input type="text" id="arrivalDate" name="arrivalDate" placeholder="YYYY-MM-DD"></a></div>
        <div id="inpatient-div-2" style="display: block;" class="inputI"><a>Leaving Date:
        <input type="text" id="leavingDate" name="leavingDate" placeholder="YYYY-MM-DD"></a></div>
        <div id="inpatient-div-3" style="display: block;" class= "inputI">
        <div style="margin-bottom: 1em;"><a>Select Room: </a></div>
        <select name="rID">
        <?php
            $result = mysqli_query($db, "SELECT * FROM Rooms");
            while($row = mysqli_fetch_assoc($result)) {
                $rAvailability = $row['availability'];
                if ($rAvailability == 1) {
                    $rID = $row['rID'];
                    $rBlock = $row['rBlock'];
                    $rCode = $row['rCode'];
                    $rType = $row['rType'];
                    echo "<option value='$rID'>$rBlock-$rCode ($rType)</option>";
                }
            }
        ?>
        </select></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Patient Page</a></div>
        <div><a href="patient_selection.php">Filter Patients</a></div>
        <div><a href="patient_deletion.php">Delete a Patient</a></div>
    </div>
</body>
