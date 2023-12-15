<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Disease Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Disease Deletion Result ~</b></a></br></div>
    <div>
    <?php

    include "../config.php";

    $dCode = $_POST['ids'];
    if(!empty($dCode))
    {
        $sql_statement = "DELETE FROM Has WHERE dCode = $dCode";
        $result = mysqli_query($db, $sql_statement);
        $sql_statement = "DELETE FROM Diseases WHERE dCode = $dCode";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Disease Page</a></div>
    <div><a href="disease_deletion.php">Delete Another Disease</a></div>
    </div>
</body>
