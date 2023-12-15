<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Room Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-5"><b>ID</b></div>
                <div class="item-col item-col-15"><b>Room Block</b></div>
                <div class="item-col item-col-15"><b>Room Floor</b></div>
                <div class="item-col item-col-15"><b>Room Code</b></div>
                <div class="item-col item-col-15"><b>Room Cost</b></div>
                <div class="item-col item-col-20"><b>Room Type</b></div>
                <div class="item-col item-col-10"><b>Availability</b></div>
            </li>

            <?php

            include "../config.php";


            $sql_statement = "SELECT * FROM Rooms";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $rID = $row['rID'];
                $rBlock = $row['rBlock'];
                $rFloor = $row['rFloor'];
                $rCode = $row['rCode'];
                $rCost = $row['rCost'];
                $rType = $row['rType'];
                if($row['availability'] == 1)
                {
                    $availability = "Available";
                }
                else{
                    $availability = "Not Available";
                }
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $rID .
                "</div><div class=\"item-col item-col-15\" data-label=\"Room Block\">" . $rBlock .
                "</div><div class=\"item-col item-col-15\" data-label=\"Room Floor\">" . $rFloor .
                "</div><div class=\"item-col item-col-15\" data-label=\"Room Code\">" . $rCode .
                "</div><div class=\"item-col item-col-15\" data-label=\"Room Cost\">$" . $rCost .
                "</div><div class=\"item-col item-col-20\" data-label=\"Room Type\">" . $rType .
                "</div><div class=\"item-col item-col-10\" data-label=\"Availability\">" . $availability . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="room_selection.php">Filter Rooms</a></div>
        <div><a href="room_deletion.php">Delete a Room</a></div>
        <div><a href="room_insertion.php">Insert a Room</a></div>
    </div>
</body>
