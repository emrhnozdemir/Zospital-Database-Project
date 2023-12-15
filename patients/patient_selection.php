<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Patient Filtering ~</b></a></br></div>
    <div><form action="select_patient.php" method="POST">
        <div class= "inputI"><a>Give a Minimum Age to be Filtered:
        <input type="text" id="age" name="age"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Patient Page</a></div>
    <div><a href="patient_insertion.php">Insert an Patient</a></div>
    <div><a href="patient_deletion.php">Delete an Patient</a></div>
</div>
</body>
