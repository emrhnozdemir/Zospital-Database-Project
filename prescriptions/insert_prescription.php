<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Prescription Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Prescription Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $pID = $_POST['pID'];
    $mID = $_POST['mID'];
    $dose = $_POST['dose'];
    $quantity = $_POST['quantity'];
    $expirationDate = $_POST['expirationDate'];
    if (!empty($pID) and !empty($mID) and !empty($dose) and !empty($quantity) and !empty($expirationDate)){
        $sql_statement = "INSERT INTO Takes (pID, mID, dose, quantity, expirationDate) VALUES ($pID, $mID, '$dose', $quantity, '$expirationDate')";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - New prescription information has been inserted to the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the prescription.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Prescription Page</a></div>
        <div><a href="prescription_insertion.php">Insert Another Prescription</a></div>
    </div>
</body>
