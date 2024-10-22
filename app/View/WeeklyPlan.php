<!DOCTYPE html>
<html>
<head>
    <title>Plan for the Week</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../js/assets/scripts.js"></script>
</head>
<body>
    <h2>Plan for the Week</h2>
    <form method="post" action="save_plan">
        <label>Select Week:</label>
        <select name="week_id" id="week_id" onchange="fetchDetails()" required>
            <?php
            $weeks = simplexml_load_file('../data/weeks.xml');
            foreach ($weeks->week as $week) {
                echo "<option value='{$week->id}'>{$week->name} ({$week->from_date} to {$week->to_date})</option>";
            }
            ?>
        </select><br>

        <div id="teamDetails">
            <h3>Team Details</h3>
            <?php
            $teams = simplexml_load_file('../data/teams.xml');
            $employees = simplexml_load_file('../data/employees.xml');
            foreach ($teams->team as $team) {
                echo "<h4>{$team->name}</h4>";
                echo "<table>";
                echo "<tr><th>Employee</th><th>Hours</th></tr>";
                foreach ($employees->employee as $employee) {
                    if ($employee->team_id == $team->id) {
                        echo "<tr><td>{$employee->name}</td><td><input type='number' name='hours[{$employee->id}]' value='8'></td></tr>";
                    }
                }
                echo "</table>";
            }
            ?>
        </div>
        <input type="submit" value="Save Plan">
    </form>
</body>
</html>
