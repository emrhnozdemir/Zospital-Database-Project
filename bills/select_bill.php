<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Bill Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $paymentStatus = $_POST['bills'];
        $paymentStatusBool = $paymentStatus;

        if ($paymentStatus == 0) {
            $paymentStatus = "Not Paid";
        } else {
            $paymentStatus = "Paid";
        }
        echo "<div style=\"margin-top: 2em;\"><a>The list of bills which are <a style='font-weight: 700;'>" . $paymentStatus . "</a>.</a></div>"
    ?>
    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-10"><b>Bill ID</b></div>
                <div class="item-col item-col-20"><b>Bill Date</b></div>
                <div class="item-col item-col-15"><b>Medical Cost</b></div>
                <div class="item-col item-col-15"><b>Room Cost</b></div>
                <div class="item-col item-col-15"><b>Other Charges</b></div>
                <div class="item-col item-col-15"><b>Total Bill</b></div>
            </li>
            <?php
            
            $sql_command = "SELECT * FROM Bills WHERE bStatus = $paymentStatusBool";

            $myresult = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($myresult)) {
                $bID = $row['bID'];
                $bDate = $row['bDate'];
                $medicalCost = $row['medicalCost'];
                $roomCost = $row['roomCost'];
                $otherCharges = $row['otherCharges'];
                $totalBill = $medicalCost + $roomCost + $otherCharges;
                echo "<li class=\"item-row\"><div class=\"item-col item-col-10\" data-label=\"Bill ID\">" . $bID . 
                "</div><div class=\"item-col item-col-20\" data-label=\"Bill Date\">" . $bDate . 
                "</div><div class=\"item-col item-col-15\" data-label=\"Medical Cost\">" . $medicalCost .
                "</div><div class=\"item-col item-col-15\" data-label=\"Room Cost\">" . $roomCost . 
                "</div><div class=\"item-col item-col-15\" data-label=\"Other Charges\">" . $otherCharges .
                "</div><div class=\"item-col item-col-15\" data-label=\"Total Bill\">$" . $totalBill . "</div></li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no bill which is " . $paymentStatus . ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Bill Page</a></div>
        <div><a href="bill_selection.php">Filter Another Bill Group</a></div>
    </div>
</body>
