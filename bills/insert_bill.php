<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Bill Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if (!empty($_POST['bDate']) and !empty($_POST['medicalCost']) and !empty($_POST['roomCost']) and !empty($_POST['otherCharges'])) {
        $bDate = $_POST['bDate'];
        $medicalCost = $_POST['medicalCost'];
        $roomCost = $_POST['roomCost'];
        $otherCharges = $_POST['otherCharges'];
        $bStatus = 0;
        $sql_statement = "INSERT INTO Bills (bDate, medicalCost, roomCost, otherCharges, bStatus) VALUES (' $bDate', $medicalCost, $roomCost, $otherCharges, '$bStatus')";

        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - Bill with the date " . $bDate . " has been inserted to the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the bill.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Bill Page</a></div>
        <div><a href="bill_insertion.php">Insert Another Bill</a></div>
    </div>
</body>
