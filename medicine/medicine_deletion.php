<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Medicine Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_medicine.php" method="POST">
    <div class= "inputI"><a>Select a medicine to delete:</a></div>
    <div><select name="ids">

    <?php

    $sql_command = "SELECT * FROM Medicine";

    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult)) {
        $mID = $id_rows['mID'];
        $mName = $id_rows['mName'];
        $mCost = $id_rows['mCost'];
        echo "<option value=$mID>". $mName . " ("."$" . $mCost . ")</option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Medicine Page</a></div>
        <div><a href="medicine_selection.php">Filter Medicines</a></div>
        <div><a href="medicine_insertion.php">Insert a Medicine</a></div>
    </div>
</body>
