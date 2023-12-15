<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Medicine Insertion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if (!empty($_POST['mName']) and !empty($_POST['mCost'])){
        $mName = $_POST['mName'];
        $mCost = $_POST['mCost'];
        $sql_statement = "INSERT INTO Medicine (mName, mCost) VALUES (' $mName', '$mCost')";

        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - " . $mName . " has been inserted to the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter at least one of the information about the medicine.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Medicine Page</a></div>
        <div><a href="medicine_insertion.php">Insert Another Medicine</a></div>
    </div>
</body>
