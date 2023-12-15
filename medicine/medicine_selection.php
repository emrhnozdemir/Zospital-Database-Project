<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Medicine Filtering ~</b></a></br></div>
    <div><form action="select_medicine.php" method="POST">
        <div><a>Give a Minimum Price of the Medicine to be Filtered:
        <input type="text" id="price" name="price"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Medicine Page</a></div>
    <div><a href="medicine_insertion.php">Insert a Medicine</a></div>
    <div><a href="medicine_deletion.php">Delete a Medicine</a></div>
</div>
</body>
