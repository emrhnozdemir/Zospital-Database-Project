<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Disease Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Patient Disease Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-25"><b>Patient Name</b></div>
                <div class="item-col item-col-25"><b>Disease Name</b></div>
                <div class="item-col item-col-15"><b>Beginning Date</b></div>
            </li>

            <?php

            include "../config.php";

            $sql_statement = "SELECT * FROM Has";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $pID = $row["pID"];
                $dCode = $row["dCode"];
                $dSince = $row["dSince"];
                $dName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Diseases WHERE dCode = $dCode"))["dName"];
                $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-25\" data-label=\"Patient Name\">" . $pName .
                "</div><div class=\"item-col item-col-25\" data-label=\"Disease Name\">" . $dName .
                "</div><div class=\"item-col item-col-15\" data-label=\"Beginning Date\">" . $dSince . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="patient_diseases_selection.php">Filter Patient Diseases</a></div>
        <div><a href="patient_diseases_deletion.php">Delete a Patient Disease</a></div>
        <div><a href="patient_diseases_insertion.php">Insert a Patient Disease</a></div>
    </div>
</body>
