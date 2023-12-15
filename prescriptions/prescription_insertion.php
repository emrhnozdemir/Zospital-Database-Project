<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Prescription Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Prescription Insertion ~</b></a></br></div>
    <?php

    include "../config.php";

    ?>
    <div><form action="insert_prescription.php" method="POST">
    <div class= "inputI"><a>Select a Patient:</a></div>
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

    <div class= "inputI"><a>Select a Medicine:</a></div>
    <div class= "inputI"><select name="mID">

    <?php

    $sql_command = "SELECT * FROM Medicine";

    $result = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($result)) {
        $mID = $row["mID"];
        $mName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Medicine WHERE mID = $mID"))["mName"];
        $mCost = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Medicine WHERE mID = $mID"))["mCost"];
        
        echo "<option value=$pID>$mName ($$mCost)</option>";
    }

    ?>

    </select></div>

    <div style="margin-bottom: 1em;"><a>Select a Dose: </a></div>
    <select name="dose">
        <option value="Once a Day">Once a Day</option>
        <option value="Twice a Day">Twice a Day</option>
        <option value="Once a Week">Once a Week</option>
        <option value="Twice a Week">Twice a Week</option>
        <option value="Once a Month">Once a Month</option>
        <option value="Twice a Month">Twice a Month</option>
    </select></div>

    <div class= "inputI"><a>Quantity:
    <input type="text" id="quantity" name="quantity"></a></div>

    <div class= "inputI"><a>Expiration Date:
    <input type="text" id="expirationDate" name="expirationDate" placeholder="YYYY-MM-DD"></a></div>

    <input class="button" type="submit" value="Submit">
    </form>
</div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Prescription Page</a></div>
        <div><a href="prescription_selection.php">Filter Prescriptions</a></div>
        <div><a href="prescription_deletion.php">Delete a Prescription</a></div>
    </div>
</body>
