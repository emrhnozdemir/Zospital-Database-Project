<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Prescription Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Prescription Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $pID = $_POST['pID'];

        $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
        
        echo "<div style=\"margin-top: 2em;\"><a>The list of prescriptions of " . $pName . ".</a></div>"
    ?>
    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-25"><b>Patient Name</b></div>
                <div class="item-col item-col-15"><b>Medicine Name</b></div>
                <div class="item-col item-col-25"><b>Dose</b></div>
                <div class="item-col item-col-20"><b>Expiration Date</b></div>
            </li>
            <?php
            
            $sql_command = "SELECT * FROM Takes WHERE pID=$pID";

            $result = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $mID = $row['mID'];
                $mName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Medicine WHERE mID = $mID"))["mName"];
                $pID = $row['pID'];
                $pName = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM Patients WHERE pID = $pID"))["pName"];
                $dose = $row['dose'];
                $expirationDate = $row['expirationDate'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-25\" data-label=\"Patient Name\">" . $pName .
                "</div><div class=\"item-col item-col-15\" data-label=\"Medicine Name\">" . $mName .
                "</div><div class=\"item-col item-col-25\" data-label=\"Dose\">" . $dose .
                "</div><div class=\"item-col item-col-20\" data-label=\"Expiration Date\">" . $expirationDate . "</div></li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no expiration date which is before " . $targetdate . ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Prescriptions Page</a></div>
        <div><a href="prescription_selection.php">Filter For Another Patient</a></div>
    </div>
</body>
