<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Medicine Filtering Result ~</b></a></br></div>
    <?php

        include "../config.php";

        $targetPrice = $_POST['price'];

        echo "<div style=\"margin-top: 2em;\"><a>The list of medicine whose price are higher than $" . $targetPrice . ".</a></div>"
    ?>
    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-10"><b>ID</b></div>
                <div class="item-col item-col-40"><b>Medicine Name</b></div>
                <div class="item-col item-col-30"><b>Cost</b></div>
            </li>
            <?php
            
            $sql_command = "SELECT * FROM Medicine WHERE mCost > '$targetPrice'";

            $myresult = mysqli_query($db, $sql_command);
            
            $counter = 0;
            while($row = mysqli_fetch_assoc($myresult)) {
                $mID = $row['mID'];
                $mName = $row['mName'];
                $mCost = $row['mCost'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-10\" data-label=\"ID\">" . $mID .
                "</div><div class=\"item-col item-col-40\" data-label=\"Medicine Name\">" . $mName .
                  "</div><div class=\"item-col item-col-30\" data-label=\"Cost\">$" . $mCost . "</div></li>";
                $counter++;
            }
            if($counter == 0) {
                echo "<div style=\"margin-top: 2em; color: #C9C9C9\"><a>There is no medicine whose price is higher than $" . $targetPrice . ".</a></div>";
            }

            ?>
        </ul>
    </div>

    <div id="navigator" style="margin-top: 1em;">
        <div><a href="index.php">Return to Medicine Page</a></div>
        <div><a href="medicine_selection.php">Filter Another Medicine Price Group</a></div>
    </div>
</body>
