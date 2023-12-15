<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Prescription Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Prescription Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_prescription.php" method="POST">

    <div class= "inputI"><a>Select a Prescription:</a></div>
    <div class= "inputI"><select name="pIDmID">

    <?php

    $sql_command = "SELECT * FROM Takes";

    $result = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($result)) {
        $mID = $row["mID"];
        $pID = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Takes WHERE mID = $mID"))["pID"];
        $dose = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Takes WHERE mID = $mID"))["dose"];
        $mName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Medicine WHERE mID = $mID"))["mName"];
        $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        
        echo "<option value='$pID $mID'>$pName ($mName: $dose)</option>";
    }

    ?>

    </select></div>

    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Prescription Page</a></div>
        <div><a href="prescription_selection.php">Filter Prescriptions</a></div>
        <div><a href="prescription_insertion.php">Insert a Prescription</a></div>
    </div>
</body>
