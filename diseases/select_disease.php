<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Disease Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Disease Filtering Result ~</b></a></br></div>
    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
              <div class="item-col item-col-15"><b>Disease Code</b></div>
              <div class="item-col item-col-25"><b>Disease Name</b></div>
              <div class="item-col item-col-20"><b>Disease Risk</b></div>
              <div class="item-col item-col-25"><b>Disease Type</b></div>
            </li>
            <?php

            include "../config.php";

            $targetDRisk = $_POST['dRisk'];

            $sql_command = "SELECT dCode, dName, dType, risk FROM Diseases WHERE risk = '$targetDRisk'";

            $myresult = mysqli_query($db, $sql_command);

            while($row = mysqli_fetch_assoc($myresult)) {
                $dCode = $row['dCode'];
                $dName = $row['dName'];
                $dRisk = $row['risk'];
                $dType = $row['dType'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-15\" data-label=\"Disease Code\">" . $dCode . "</div><div class=\"item-col item-col-25\" data-label=\"Disease Name\">" . $dName . "</div><div class=\"item-col item-col-20\" data-label=\"Disease Risk\">" . $dRisk . "</div><div class=\"item-col item-col-25\" data-label=\"Disease Type\">" . $dType . "</div></li>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Disease Page</a></div>
        <div><a href="disease_selection.php">Filter Another Risk Group</a></div>
    </div>
</body>
