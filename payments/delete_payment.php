<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Payment Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if(!empty($_POST['ids']))
    {
        $pID = $_POST['ids'];
        $sql_for_name = "SELECT pName FROM Patients WHERE pID = $pID";
        $pName = mysqli_fetch_assoc(mysqli_query($db, $sql_for_name))["pName"];
        $bID = mysqli_fetch_assoc(mysqli_query($db, "SELECT bID FROM Pays WHERE pID = $pID"))["bID"];
        $sql_statement = "DELETE FROM Pays WHERE pID = $pID";
        $result = mysqli_query($db, $sql_statement);
        $sql_statement_update="UPDATE Bills SET bStatus=0 WHERE bID=$bID";
        $result_update=mysqli_query($db, $sql_statement_update);
        if($result == 1) {
            echo "<a>Success - " . $pName . "'s payment with the payment ID " . $pID . " has been deleted from the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Payment Page</a></div>
    <div><a href="payment_deletion.php">Delete Another Payment</a></div>
    </div>
</body>
