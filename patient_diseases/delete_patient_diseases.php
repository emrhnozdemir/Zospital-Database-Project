<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Disease Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Disease Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $pIDdCode = explode(" ", $_POST["pIDdCode"]);
    $pID = $pIDdCode[0];
    $dCode = $pIDdCode[1];
    if (!empty($pIDdCode)){
        $sql_statement = "DELETE FROM Has WHERE pID = $pID and dCode =$dCode";
        $result = mysqli_query($db, $sql_statement);
        $dName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Diseases WHERE dCode = $dCode"))["dName"];
        $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        if($result == 1) {
            echo "<a>Success - $dName has been deleted from the diseases of $pName in the database.</a>";
        } else {
            echo "<a>Error.</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Patient Disease Page</a></div>
    <div><a href="patient_diseases_deletion.php">Delete Another Patient Disease</a></div>
    </div>
</body>
