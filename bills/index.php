<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Bill Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-10"><b>Bill ID</b></div>
                <div class="item-col item-col-20"><b>Bill Date</b></div>
                <div class="item-col item-col-15"><b>Medical Cost</b></div>
                <div class="item-col item-col-15"><b>Room Cost</b></div>
                <div class="item-col item-col-15"><b>Other Charges</b></div>
                <div class="item-col item-col-15"><b>Total Bill</b></div>
                <div class="item-col item-col-15"><b>Payment Status</b></div>
            </li>

            <?php

            include "../config.php";


            $sql_statement = "SELECT * FROM Bills";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $bID = $row['bID'];
                $bDate = $row['bDate'];
                $medicalCost = $row['medicalCost'];
                $roomCost = $row['roomCost'];
                $otherCharges = $row['otherCharges'];
                if ($row['bStatus'] == 0) {
                    $bstatus = "Not Paid";
                }
                else{
                    $bstatus = "Paid";
                }
                $totalBill = $medicalCost + $roomCost + $otherCharges;
                echo "<li class=\"item-row\"><div class=\"item-col item-col-10\" data-label=\"Bill ID\">" . $bID . 
                "</div><div class=\"item-col item-col-20\" data-label=\"Bill Date\">" . $bDate . 
                "</div><div class=\"item-col item-col-15\" data-label=\"Medical Cost\">$" . $medicalCost .
                "</div><div class=\"item-col item-col-15\" data-label=\"Room Cost\">$" . $roomCost .
                "</div><div class=\"item-col item-col-15\" data-label=\"Other Charges\">$" . $otherCharges .
                "</div><div class=\"item-col item-col-15\" data-label=\"Total Bill\">$" . $totalBill .
                "</div><div class=\"item-col item-col-15\" data-label=\"Payment Status\">" . $bstatus . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="bill_selection.php">Filter Bills</a></div>
        <div><a href="bill_deletion.php">Delete a Bill</a></div>
        <div><a href="bill_insertion.php">Insert a Bill</a></div>
    </div>
</body>
