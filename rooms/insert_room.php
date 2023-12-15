<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Room Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if (!empty($_POST['rBlock']) and !empty($_POST['rFloor']) and !empty($_POST['rCode']) and !empty($_POST['rCost']) and !empty($_POST['rType'])and !empty($_POST['availability'])){
        $rBlock = $_POST['rBlock'];
        $rFloor = $_POST['rFloor'];
        $rCode = $_POST['rCode'];
        $rCost = $_POST['rCost'];
        $rType = $_POST['rType'];
        $availability = $_POST['availability'];
        if($availability == "Not Available"){
            $availability = 0;
        }
        else{
            $availability = 1;
        }
        $sql_statement = "INSERT INTO Rooms (rBlock, rFloor, rCode, rCost, rType,availability) VALUES ('$rBlock', '$rFloor', '$rCode', '$rCost', '$rType','$availability')";

        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - Room with the code " . $rCode . " has been inserted to the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the room.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Room Page</a></div>
        <div><a href="room_insertion.php">Insert Another Room</a></div>
    </div>
</body>
