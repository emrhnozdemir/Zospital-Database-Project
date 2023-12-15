<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Employee Filtering ~</b></a></br></div>
    <div><form action="select_employee.php" method="POST">
        <div class= "inputI"><a>Give a Minimum Salary to be Filtered:
        <input type="text" id="salary" name="salary" placeholder="in US$"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Employee Page</a></div>
    <div><a href="employee_insertion.php">Insert an Employee</a></div>
    <div><a href="employee_deletion.php">Delete an Employee</a></div>
</div>
</body>
