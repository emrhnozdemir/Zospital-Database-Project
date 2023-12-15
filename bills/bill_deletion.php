<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Bill Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_bill.php" method="POST">

    <div class= "inputI"><a>Select a bill to delete:</a></div>
    <div><select name="ids">

    <?php

    $sql_command = "SELECT * FROM Bills";

    $myresult = mysqli_query($db, $sql_command);

    while($id_row = mysqli_fetch_assoc($myresult)) {
        $bID = $id_row['bID'];
        $bDate = $id_row['bDate'];
        $medicalCost = $id_row['medicalCost'];
        $roomCost = $id_row['roomCost'];
        $otherCharges = $id_row['otherCharges'];
        if ($id_row['bStatus'] == 0) {
            $bstatus = "Not Paid";
        }
        else{
            $bstatus = "Paid";
        }
        $totalBill = $medicalCost + $roomCost + $otherCharges;
        echo "<option value='$bID'>$$totalBill ($bstatus) $bDate </option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Bill Page</a></div>
        <div><a href="bill_selection.php">Filter Bills</a></div>
        <div><a href="bill_insertion.php">Insert a Bill</a></div>
    </div>
</body>
