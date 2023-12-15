<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Employee Deletion ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <form action="delete_employee.php" method="POST">
    <div class= "inputI"><a>Select an Employee:</a></div>
    <div class= "inputI"><select name="ids">

    <?php

    $sql_command = "SELECT * FROM Employees";

    $myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult)) {
        $eID = $id_rows['eID'];
        $eName = $id_rows['eName'];
        $eMail = $id_rows['eMail'];
        echo "<option value=$eID>$eName ($eMail)</option>";
    }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Employee Page</a></div>
        <div><a href="employee_selection.php">Filter Employees</a></div>
        <div><a href="employee_insertion.php">Insert an Employee</a></div>
    </div>
</body>
