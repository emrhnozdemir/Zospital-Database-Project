<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Employee Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $targetSalary = $_POST['salary'];

        echo "<div style=\"margin-top: 2em;\"><a>The list of employees whose salary is greater than $" . $targetSalary . ".</a></div>"
    ?>
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
            
            $sql_command = "SELECT * FROM Employees WHERE salary > '$targetSalary'";

            $myresult = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($myresult)) {
                $eID = $row['eID'];
                $eName = $row['eName'];
                $ePhoneNo = $row['ePhoneNo'];
                $eMail = $row['eMail'];
                $salary = $row['salary'];
                $nationality = $row['nationality'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-5\" data-label=\"ID\">" . $eID . "</div><div class=\"item-col item-col-25\" data-label=\"Employee Name\">" . $eName . "</div><div class=\"item-col item-col-15\" data-label=\"Nationality\">" . $nationality . "</div><div class=\"item-col item-col-20\" data-label=\"E-Mail\">" . $eMail . "</div><div class=\"item-col item-col-20\" data-label=\"Phone No\">" . $ePhoneNo . "</div><div class=\"item-col item-col-10\" data-label=\"Salary\">$" . $salary . "</div></li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no employee whose salary is greater than $" . $targetSalary . ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Employee Page</a></div>
        <div><a href="employee_selection.php">Filter Another Minimum Salary Group</a></div>
    </div>
</body>
