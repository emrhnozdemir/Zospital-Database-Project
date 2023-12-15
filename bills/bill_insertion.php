<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Bill Insertion ~</b></a></br></div>
    <div><form action="insert_bill.php" method="POST">
        <div class= "inputI"><a> Bill Date:
        <input type="text" id="bDate" name="bDate" placeholder="YYYY-MM-DD"></a></div>
        <div class= "inputI"><a>Medical Cost:
        <input type="text" id="medicalCost" name="medicalCost" placeholder="in US$"></a></div>
        <div class= "inputI"><a>Room Cost:
        <input type="text" id="roomCost" name="roomCost" placeholder="in US$"></a></div>
        <div class= "inputI"><a>Other Charges:
        <input type="text" id="otherCharges" name="otherCharges" placeholder="in US$"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Bill Page</a></div>
        <div><a href="bill_selection.php">Filter Bills</a></div>
        <div><a href="bill_deletion.php">Delete a Bill</a></div>
    </div>
</body>
