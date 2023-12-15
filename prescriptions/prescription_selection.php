<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Prescription Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Prescription Filtering ~</b></a></br></div>
    <div><form action="select_prescription.php" method="POST">
        <div class= "inputI"><a>Select a Patient to Get His/Her Prescriptions:</a></div>
        <div class= "inputI"><select name="pID">

        <?php

        include "../config.php";

        $sql_command = "SELECT * FROM Patients";

        $result = mysqli_query($db, $sql_command);

        while($row = mysqli_fetch_assoc($result)) {
            $pID = $row["pID"];
            $pName = $row["pName"];
            $bloodType = $row["bloodType"];
            echo "<option value=$pID>$pName ($bloodType)</option>";
        }

        ?>

        </select></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Prescriptions Page</a></div>
    <div><a href="prescription_insertion.php">Insert a Prescription</a></div>
    <div><a href="prescription_deletion.php">Delete a Prescription</a></div>
</div>
</body>
