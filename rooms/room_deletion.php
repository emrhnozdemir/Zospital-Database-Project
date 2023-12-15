<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Room Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_room.php" method="POST">
    <div><select name="ids">

    <?php

    $sql_command = "SELECT * FROM Rooms";

    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult)) {
        $rID = $id_rows['rID'];
        $rBlock = $id_rows['rBlock'];
        $rFloor = $id_rows['rFloor'];
        $rCode = $id_rows['rCode'];
        $rType = $id_rows['rType'];
        echo "<option value=$rID>Block $rBlock Floor $rFloor Room $rCode ($rType)</option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Room Page</a></div>
        <div><a href="room_selection.php">Filter Rooms</a></div>
        <div><a href="room_insertion.php">Insert a Room</a></div>
    </div>
</body>
