<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Medicine Insertion ~</b></a></br></div>
    <div><form action="insert_medicine.php" method="POST">
        <div class= "inputI"><a>Medicine Name:
        <input type="text" id="mName" name="mName"></a></div>
        <div class= "inputI"><a>Cost of Medicine:
        <input type="text" id="mCost" name="mCost" placeholder="in US$"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Medicine Page</a></div>
        <div><a href="medicine_selection.php">Filter Medicines</a></div>
        <div><a href="medicine_deletion.php">Delete a Medicine</a></div>
    </div>
</body>
