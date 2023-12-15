<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Disease Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Patient Disease Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $pID = $_POST['pID'];

        $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        
        echo "<div style=\"margin-top: 2em;\"><a>The list of diseases of " . $pName . ".</a></div>"
    ?>
    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-25"><b>Patient Name</b></div>
                <div class="item-col item-col-25"><b>Disease Name</b></div>
                <div class="item-col item-col-15"><b>Beginning Date</b></div>
            </li>
            <?php
            
            $sql_command = "SELECT * FROM Has WHERE pID=$pID";

            $result = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $pID = $row["pID"];
                $dCode = $row["dCode"];
                $dSince = $row["dSince"];
                $dName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Diseases WHERE dCode = $dCode"))["dName"];
                $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-25\" data-label=\"Patient Name\">" . $pName .
                "</div><div class=\"item-col item-col-25\" data-label=\"Disease Name\">" . $dName .
                "</div><div class=\"item-col item-col-15\" data-label=\"Beginning Date\">" . $dSince . "</div></li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no diseases of $pName.</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Patient Diseases Page</a></div>
        <div><a href="patient_disease_selection.php">Filter For Another Patient</a></div>
    </div>
</body>
