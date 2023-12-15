<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Medicine Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    if(!empty($_POST['ids']))
    {
        $mID = $_POST['ids'];
        $sql_for_name = "SELECT mName FROM Medicine WHERE mID = $mID";
        $mName = mysqli_fetch_assoc(mysqli_query($db, $sql_for_name))["mName"];
        $sql_statement = "DELETE FROM Takes WHERE mID = $mID";
        $result = mysqli_query($db, $sql_statement);
        $sql_statement = "DELETE FROM Medicine WHERE mID = $mID";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success - " . $mName . " has been deleted from the database.</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Medicine Page</a></div>
    <div><a href="medicine_deletion.php">Delete Another Medicine</a></div>
    </div>
</body>
