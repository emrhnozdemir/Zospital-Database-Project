<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_patient.php" method="POST">
    <div class= "inputI"><a>Select a Patient:</a></div>
    <div class= "inputI"><select name="ids">

    <?php

    $sql_command = "SELECT * FROM Patients";

    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult)) {
        $pID = $id_rows['pID'];
        $pName = $id_rows['pName'];
        $bloodType = $id_rows['bloodType'];
        $age = $id_rows['age'];
        echo "<option value=$pID> $pName ($age) $bloodType</option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Patient Page</a></div>
        <div><a href="patient_selection.php">Filter Patients</a></div>
        <div><a href="patient_insertion.php">Insert a Patient</a></div>
    </div>
</body>
