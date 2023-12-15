<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
    <script>
        function changeEmpType(selectElt) {
            var selectedProfession = selectElt.options[selectElt.selectedIndex].value;
            if (selectedProfession == "doctor") {
                document.getElementById('doctor-div-1').setAttribute("style", "display: block");
                document.getElementById('doctor-div-2').setAttribute("style", "display: block");
                document.getElementById('nurse-div').setAttribute("style", "display: none");
            } else if (selectedProfession == "nurse") {
                document.getElementById('doctor-div-1').setAttribute("style", "display: none");
                document.getElementById('doctor-div-2').setAttribute("style", "display: none");
                document.getElementById('nurse-div').setAttribute("style", "display: block");
            }
        }
    </script>
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Employee Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Employee Insertion ~</b></a></br></div>
    <div style="width=920px;"><form action="insert_employee.php" method="POST">

        <div class= "inputI">
        <div style="margin-bottom: 1em;"><a>Profession: </a></div>
        <select onChange="changeEmpType(this)" name="profession">
            <option value="doctor">Doctor</option>
            <option value="nurse">Nurse</option>
        </select></div>
        <div class= "inputI"><a>Full Name:
        <input type="text" id="eName" name="eName"></a></div>
        <div class= "inputI"><a>Nationality:
        <input type="text" id="nationality" name="nationality"></a></div>
        <div class= "inputI"><a>E-Mail Address:
        <input type="text" id="eMail" name="eMail"></a></div>
        <div class= "inputI"><a>Phone No:
        <input type="text" id="ePhoneNo" name="ePhoneNo"></a></div>
        <div class= "inputI"><a>Salary:
        <input type="text" id="salary" name="salary"></a></div>

        <div id="doctor-div-1" style="display: block;" class="inputI"><a>Doctor's Title:
        <input type="text" id="dTitle" name="dTitle"></a></div>
        <div id="doctor-div-2" style="display: block;" class="inputI"><a>Doctor's Department:
        <input type="text" id="dDepartment" name="dDepartment"></a></div>
        <div id="nurse-div" style="display: none;" class="inputI"><a>Nurse's Patient Count:
        <input type="text" id="nPCount" name="nPCount"></a></div>

        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Employee Page</a></div>
        <div><a href="employee_selection.php">Filter Employees</a></div>
        <div><a href="employee_deletion.php">Delete an Employee</a></div>
    </div>
</body>
