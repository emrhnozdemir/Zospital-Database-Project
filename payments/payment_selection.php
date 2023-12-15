<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Payment Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Payment Filtering ~</b></a></br></div>
    <div><form action="select_payment.php" method="POST">
        <div><a>Give a Date to Filter Payments Later:
        <input type="text" id="date" name="date"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Payment Page</a></div>
    <div><a href="payment_insertion.php">Insert a Payment</a></div>
    <div><a href="payment_deletion.php">Delete a Payment</a></div>
</div>
</body>
