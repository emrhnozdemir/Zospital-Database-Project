<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Appointment Insertion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <div><form action="insert_appointment.php" method="POST">
        <div class= "inputI"><a>Select the Doctor:</a></div>
        <div class= "inputI"><select name="dids">

        <?php

        $sql_command = "SELECT * FROM Doctors";

        $myresult = mysqli_query($db, $sql_command);

        while($id_rows = mysqli_fetch_assoc($myresult)) {
            $dID = $id_rows['dID'];
            $dName=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Employees WHERE eID = $dID"))["eName"];
            $dTitle=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Doctors WHERE dID=$dID"))["title"];
            echo "<option value=$dID>". $dName . " (". $dTitle . ")</option>";
        }

        ?>

        </select></div>
        <div class= "inputI"><a>Select the Patient:</a></div>
        <div class= "inputI"><select name="pids">

        <?php

        $sql_command = "SELECT * FROM outpatients";

        $myresult = mysqli_query($db, $sql_command);

        while($id_rows = mysqli_fetch_assoc($myresult)) {
            $outID = $id_rows['outID'];
            $pName=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM patients WHERE pID = $outID"))["pName"];
            echo "<option value=$outID>". $pName . "</option>";
        }

        ?>

        </select></div>

        <div class= "inputI"><a>Appointment Date:
        <input type="text" id="aDate" name="aDate" placeholder="YYYY-MM-DD"></a></div>
        <div class= "inputI"><a>Price:
        <input type="text" id="price" name="price" placeholder="in $US"></a></div>
        <div class= "inputI"><a>Start Time:
        <input type="text" id="startTime" name="startTime" placeholder="hh:mm"></a></div>
        <div class= "inputI"><a>End Time:
        <input type="text" id="endTime" name="endTime" placeholder="hh:mm"></a></div>
        <div class= "inputI"><a>Approval Status:</a></div>
        <div class= "inputI">
            <select name="apprStatus">
                <option value='1'>Approved</option>
                <option value='0'>Not Approved</option>
            </select>
        </div>
        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Appointment Page</a></div>
        <div><a href="appointment_selection.php">Filter Appointments</a></div>
        <div><a href="appointment_deletion.php">Delete an Appointment</a></div>
    </div>
</body>
