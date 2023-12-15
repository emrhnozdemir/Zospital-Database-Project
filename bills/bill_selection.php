<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Bill Filtering ~</b></a></br></div>
    <div>
        <div style="margin-bottom: 1.5em;"><a>Choose to display paid or not paid bills:</a></div>
        <form action="select_bill.php" method="POST">
            <div><select name="bills">
                <option value="1">Paid</option>
                <option value="0">Not Paid</option>
            </select></div>
            <div><button class="button">SUBMIT</button></div>
        </form>
    </div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Return to Bills Page</a></div>
        <div><a href="bill_insertion.php">Insert a Bill</a></div>
        <div><a href="bill_deletion.php">Delete a Bill</a></div>
    </div>
</body>
