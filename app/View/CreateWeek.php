<!DOCTYPE html>
<html>
<head>
    <title>Create Week</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Create Week</h2>
    <form method="post" action="create_week">
        <label>Week Name:</label>
        <input type="text" name="week_name" required><br>
        <label>From Date:</label>
        <input type="date" name="from_date" required><br>
        <label>To Date:</label>
        <input type="date" name="to_date" required><br>
        <input type="submit" value="Create Week">
    </form>
    <div id="week">
        <h3>Week</h3>
        <?php
        $xml = simplexml_load_file('../data/weeks.xml');
            echo "<table>";
            echo "<tr><th>Week Name</th><th>From Date</th><th>To Date</th></tr>";
            foreach ($xml->week as $week) {
                echo '<tr><td>' . $week->name . '</td><td>' . $week->from_date . '</td><td>' . $week->to_date . '</td></tr>';
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>
