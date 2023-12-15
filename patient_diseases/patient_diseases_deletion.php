<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Disease Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Disease Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_patient_diseases.php" method="POST">

    <div class= "inputI"><a>Select a Patient Disease:</a></div>
    <div class= "inputI"><select name="pIDdCode">

    <?php

    $sql_command = "SELECT * FROM Has";

    $result = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($result)) {
        $pID = $row["pID"];
        $dCode = $row["dCode"];
        $dSince = $row["dSince"];
        $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        $dName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Diseases WHERE dCode = $dCode"))["dName"];
        
        echo "<option value='$pID $dCode'>$pName ($dName, since $dSince)</option>";
    }

    ?>

    </select></div>

    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Prescription Page</a></div>
        <div><a href="patient_diseases_selection.php">Filter Patient Diseases</a></div>
        <div><a href="patient_diseases_insertion.php">Insert a Patient Disease</a></div>
    </div>
</body>
