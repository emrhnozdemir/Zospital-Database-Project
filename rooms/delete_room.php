<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Room Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if(!empty($_POST['ids']))
    {
        $rID = $_POST['ids'];
        $sql_for_name = "SELECT rCode, rBlock FROM Rooms WHERE rID = $rID";
        $rCode = mysqli_fetch_assoc(mysqli_query($db, $sql_for_name))["rCode"];
        $rBlock = mysqli_fetch_assoc(mysqli_query($db, $sql_for_name))["rBlock"];
        $sql_statement = "DELETE FROM Stays_in WHERE rID = $rID";
        $result = mysqli_query($db, $sql_statement);
        $sql_statement = "DELETE FROM Rooms WHERE rID = $rID";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - Room with the code $rCode in the block $rBlock has been deleted from the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Room Page</a></div>
    <div><a href="room_deletion.php">Delete Another Room</a></div>
    </div>
</body>
