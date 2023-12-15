<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Room Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $roomType = $_POST['rooms'];

        echo "<div style=\"margin-top: 2em;\"><a>The list of rooms which is a/an " . $roomType . ".</a></div>"
    ?>
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
            
            $sql_command = "SELECT * FROM Rooms WHERE rType = '$roomType'";

            $myresult = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($myresult)) {
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
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no room whose type is" . $targetSalary . ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Room Page</a></div>
        <div><a href="room_selection.php">Filter Another Room Type</a></div>
    </div>
</body>
