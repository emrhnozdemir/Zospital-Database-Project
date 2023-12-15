<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Employee Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-5"><b>ID</b></div>
                <div class="item-col item-col-25"><b>Employee Name</b></div>
                <div class="item-col item-col-15"><b>Nationality</b></div>
                <div class="item-col item-col-20"><b>E-Mail</b></div>
                <div class="item-col item-col-20"><b>Phone No</b></div>
                <div class="item-col item-col-10"><b>Salary</b></div>
            </li>

            <?php

            include "../config.php";


            $sql_statement = "SELECT * FROM Employees";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $eID = $row['eID'];
                $eName = $row['eName'];
                $ePhoneNo = $row['ePhoneNo'];
                $eMail = $row['eMail'];
                $salary = $row['salary'];
                $nationality = $row['nationality'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $eID . "</div><div class=\"item-col item-col-25\" data-label=\"Employee Name\">" . $eName . "</div><div class=\"item-col item-col-15\" data-label=\"Nationality\">" . $nationality . "</div><div class=\"item-col item-col-20\" data-label=\"E-Mail\">" . $eMail . "</div><div class=\"item-col item-col-20\" data-label=\"Phone No\">" . $ePhoneNo . "</div><div class=\"item-col item-col-10\" data-label=\"Salary\">$" . $salary . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="employee_selection.php">Filter Employees</a></div>
        <div><a href="employee_deletion.php">Delete an Employee</a></div>
        <div><a href="employee_insertion.php">Insert an Employee</a></div>
    </div>
</body>
