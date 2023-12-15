<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Patient Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-5"><b>ID</b></div>
                <div class="item-col item-col-25"><b>Patient Name</b></div>
                <div class="item-col item-col-10"><b>Blood Type</b></div>
                <div class="item-col item-col-10"><b>Age</b></div>
                <div class="item-col item-col-10"><b>Weight</b></div>
                <div class="item-col item-col-10"><b>Height</b></div>
                <div class="item-col item-col-15"><b>Phone No</b></div>
            </li>

            <?php

            include "../config.php";

            $sql_statement = "SELECT * FROM Patients";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $pID = $row['pID'];
                $pName = $row['pName'];
                $bloodType = $row['bloodType'];
                $age = $row['age'];
                $weight = $row['weight'];
                $height = $row['height'];
                $pPhoneNo = $row['pPhoneNo'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $pID . "</div><div class=\"item-col item-col-25\" data-label=\"Patient Name\">" . $pName . "</div><div class=\"item-col item-col-10\" data-label=\"Blood Type\">" . $bloodType . "</div><div class=\"item-col item-col-10\" data-label=\"Age\">" . $age . "</div><div class=\"item-col item-col-10\" data-label=\"Weight\">" . $weight . " kg</div><div class=\"item-col item-col-10\" data-label=\"Height\">" . $height . " cm</div><div class=\"item-col item-col-15\" data-label=\"Phone No\">" . $pPhoneNo . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="patient_selection.php">Filter Patients</a></div>
        <div><a href="patient_deletion.php">Delete a Patient</a></div>
        <div><a href="patient_insertion.php">Insert a Patient</a></div>
    </div>
</body>
