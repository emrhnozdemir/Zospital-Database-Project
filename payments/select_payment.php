<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Payment Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $targetdate = $_POST['date'];

        echo "<div style=\"margin-top: 2em;\"><a>The list of payments whose date is later than " . $targetdate . ".</a></div>"
    ?>
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
            
            $sql_command = "SELECT * FROM Pays WHERE pDate > '$targetdate'";

            $myresult = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($myresult)) {
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
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no payments whose payment date is later than " . $targetdate . ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Payment Page</a></div>
        <div><a href="payment_selection.php">Filter Another Payment Date Group</a></div>
    </div>
</body>
