<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Prescription Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Prescription Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $pIDmID = explode(" ", $_POST["pIDmID"]);
    $pID = $pIDmID[0];
    $mID = $pIDmID[1];
    if (!empty($pIDmID)){
        $sql_statement = "DELETE FROM Takes WHERE pID = $pID and mID =$mID";
        $result = mysqli_query($db, $sql_statement);
        $mName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Medicine WHERE mID = $mID"))["mName"];
        $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        if($result == 1) {
            echo "<a>Success - $mName has been deleted from the prescriptions of $pName in the database.</a>";
        } else {
            echo "<a>Error.</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Prescription Page</a></div>
    <div><a href="prescription_deletion.php">Delete Another Prescription</a></div>
    </div>
</body>
