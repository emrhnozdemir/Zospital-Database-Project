<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Disease Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Disease Insertion ~</b></a></br></div>
    <?php

    include "../config.php";

    ?>

    <div><form action="insert_patient_diseases.php" method="POST">
    <div class= "inputI"><a>Select a Patient:</a></div>
    <div class= "inputI"><select name="pID">

    <?php

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

    <div class= "inputI"><a>Select a Disease:</a></div>
    <div class= "inputI"><select name="dCode">

    <?php

    $sql_command = "SELECT * FROM Diseases";

    $result = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($result)) {
        $dCode = $row["dCode"];
        $dName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Diseases WHERE dCode = $dCode"))["dName"];
        $dType = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Diseases WHERE dCode = $dCode"))["dType"];
        
        echo "<option value=$dCode>$dName ($dType)</option>";
    }

    ?>

    </select></div>

    <div class= "inputI"><a>Beginning Date:
    <input type="text" id="dSince" name="dSince" placeholder="YYYY-MM-DD"></a></div>

    <input class="button" type="submit" value="Submit">
    </form>
</div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Patient Disease Page</a></div>
        <div><a href="patient_diseases_selection.php">Filter Patient Diseases</a></div>
        <div><a href="patient_diseases_deletion.php">Delete a Patient Disease</a></div>
    </div>
</body>
