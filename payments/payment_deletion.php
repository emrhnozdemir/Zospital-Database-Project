<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Payment Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_payment.php" method="POST">
    <div><select name="ids">

    <?php

    $sql_command = "SELECT * FROM Pays";

    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult)) {
        $pID = $id_rows['pID']; 
        $bID = $id_rows['bID'];
        $pName = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        $pDate = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Pays WHERE bID = $bID"))["pDate"];
        $bDate = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Bills WHERE bID = $bID"))["bDate"];
        echo "<option value=$pID>$pName (Bill: $bDate, Payment: $pDate)</option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Payment Page</a></div>
        <div><a href="payment_selection.php">Filter Payments</a></div>
        <div><a href="payment_insertion.php">Insert a Payment</a></div>
    </div>
</body>
