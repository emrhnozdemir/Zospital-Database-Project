<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Payment Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $bID = $_POST['bID'];
    $pID = $_POST['pID'];
    $paymentType = $_POST['paymentType'];
    if (!empty($bID) and !empty($pID) and !empty($paymentType)){
        date_default_timezone_set("Europe/Istanbul");
        $pDate = date("Y-m-d");
        $sql_statement = "INSERT INTO Pays (pID, bID, pDate, paymentType) VALUES ($pID, $bID, '$pDate', '$paymentType')";
        $result = mysqli_query($db, $sql_statement);
        $sql_statement_update = "UPDATE Bills SET bStatus=1 WHERE bID=$bID";
        $result_update=mysqli_query($db, $sql_statement_update);
        if($result == 1) {
            echo "<a>Success - Bill with the ID $bID has been marked as paid in the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the payment.</a>";
    }
    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Payment Page</a></div>
        <div><a href="pay_insertion.php">Insert Another Payment</a></div>
    </div>
</body>
