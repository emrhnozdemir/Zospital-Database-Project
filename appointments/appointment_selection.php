<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>
<?php

    include "../config.php";

?>
<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Appointment Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Appointment Filtering ~</b></a></br></div>
    <div><form action="select_appointment.php" method="POST">
        <div><a>Give the doctor's name to be filtered:
        
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
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Appointment  Page</a></div>
    <div><a href="appointment_insertion.php">Insert an Appointment </a></div>
    <div><a href="appointment_deletion.php">Delete an Appointment </a></div>
</div>
</body>
