<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Disease Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Disease Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $pID = $_POST['pID'];
    $dCode = $_POST['dCode'];
    $dSince = $_POST['dSince'];
    if (!empty($pID) and !empty($dCode) and !empty($dSince)){
        $sql_statement = "INSERT INTO Has (pID, dCode, dSince) VALUES ($pID, $dCode, '$dSince')";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - New patient disease information has been inserted to the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the patient disease.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Patient Disease Page</a></div>
        <div><a href="patient_diseases_insertion.php">Insert Another Patient Disease</a></div>
    </div>
</body>
