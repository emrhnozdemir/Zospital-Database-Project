<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Payment Insertion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <div><form action="insert_payment.php" method="POST">

    <div class= "inputI"><a>Select a Bill to Pay:</a></div>
    <div class= "inputI"><select name="bID">

    <?php

    $sql_command = "SELECT * FROM Bills WHERE bStatus = 0";

    $result = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($result)) {
        $bID = $row["bID"];
        $bDate = $row["bDate"];
        echo "<option value=$bID>Bill ID: $bID (Date: $bDate)</option>";
    }

    ?>

    </select></div>

    <div class= "inputI"><a>Select the Patient Paying:</a></div>
    <div class= "inputI"><select name="pID">

    <?php

    $sql_command = "SELECT * FROM Patients";

    $result = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($result)) {
        $pID = $row["pID"];
        $pName = $row["pName"];
        $bloodType = $row["bloodType"];
        echo "<option value=$pID>$pName ($bloodType)</option>";
    }

    ?>

    </select></div>

    <div style="margin-bottom: 1em;"><a>Select a Payment Method: </a></div>
    <select name="paymentType">
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
        <option value="Cash">Cash</option>
    </select></div>

    <input class="button" type="submit" value="Submit">
    </form>
</div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Payment Page</a></div>
        <div><a href="payment_selection.php">Filter Payments</a></div>
        <div><a href="payment_deletion.php">Delete a Payment</a></div>
    </div>
</body>
