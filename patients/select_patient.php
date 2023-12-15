<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Patient Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Patient Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $age = $_POST['age'];

        echo "<div style=\"margin-top: 2em;\"><a>The list of patients whose age is greater than " . $age . " years.</a></div>"
    ?>
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
            
            $sql_command = "SELECT * FROM Patients WHERE age > '$age'";

            $myresult = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($myresult)) {
                $pID = $row['pID'];
                $pName = $row['pName'];
                $bloodType = $row['bloodType'];
                $age = $row['age'];
                $weight = $row['weight'];
                $height = $row['height'];
                $pPhoneNo = $row['pPhoneNo'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $pID . "</div><div class=\"item-col item-col-25\" data-label=\"Patient Name\">" . $pName . "</div><div class=\"item-col item-col-10\" data-label=\"Blood Type\">" . $bloodType . "</div><div class=\"item-col item-col-10\" data-label=\"Age\">" . $age . "</div><div class=\"item-col item-col-10\" data-label=\"Weight\">" . $weight . " kg</div><div class=\"item-col item-col-10\" data-label=\"Height\">" . $height . " cm</div><div class=\"item-col item-col-15\" data-label=\"Phone No\">" . $pPhoneNo . "</div></li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no patient whose age is greater than " . $age . " years.</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Patient Page</a></div>
        <div><a href="patient_selection.php">Filter Another Minimum Age Group</a></div>
    </div>
</body>
