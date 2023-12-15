<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Payment Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-5"><b>Bill ID</b></div>
                <div class="item-col item-col-25"><b>Patient Name</b></div>
                <div class="item-col item-col-20"><b>Billing Date</b></div>
                <div class="item-col item-col-20"><b>Payment Date</b></div>
                <div class="item-col item-col-15"><b>Payment Type</b></div>
            </li>

            <?php

            include "../config.php";


            $sql_statement = "SELECT * FROM Pays";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $bID = $row['bID'];
                $bDate = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Bills WHERE bID = $bID"))["bDate"];
                $pID = $row['pID'];
                $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
                $pDate = $row['pDate'];
                $paymentType = $row['paymentType'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"Bill ID\">" . $bID .
                "</div><div class=\"item-col item-col-25\" data-label=\"Patient Name\">" . $pName .
                "</div><div class=\"item-col item-col-20\" data-label=\"Billing Date\">" . $bDate .
                "</div><div class=\"item-col item-col-20\" data-label=\"Payment Date\">" . $pDate .
                "</div><div class=\"item-col item-col-15\" data-label=\"Payment Type\">" . $paymentType . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="payment_selection.php">Filter Payments</a></div>
        <div><a href="payment_deletion.php">Delete a Payment</a></div>
        <div><a href="payment_insertion.php">Insert a Payment</a></div>
    </div>
</body>
