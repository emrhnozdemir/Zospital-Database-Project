<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Bill Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Bill Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if(!empty($_POST['ids']))
    {
        $bID = $_POST['ids'];
        $sql_for_name = "SELECT bDate FROM Bills WHERE bID = $bID";
        $bDate = mysqli_fetch_assoc(mysqli_query($db, $sql_for_name))["bDate"];
        $sql_statement = "DELETE FROM Pays WHERE bID = $bID";
        $result = mysqli_query($db, $sql_statement);
        $sql_statement = "DELETE FROM Bills WHERE bID = $bID";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - Bill with the date of " . $bDate . " has been deleted from the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Bill Page</a></div>
    <div><a href="bill_deletion.php">Delete Another Bill</a></div>
    </div>
</body>
