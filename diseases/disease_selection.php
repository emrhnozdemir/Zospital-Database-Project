<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Disease Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Disease Filtering ~</b></a></br></div>
    <div><form action="select_disease.php" method="POST">
        <div><a>Risk Group to be Filtered:
        <input type="text" id="dRisk" name="dRisk"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Diseases Page</a></div>
    <div><a href="disease_insertion.php">Insert a Disease</a></div>
    <div><a href="disease_deletion.php">Delete a Disease</a></div>
</div>
</body>
