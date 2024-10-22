<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Create Employee</h2>
    <form method="post" action="create_employee">
        <label>Employee Name:</label>
        <input type="text" name="employee_name" required><br>
        <label>Team:</label>
        <select name="team_id" required>
            <?php
            $teams = simplexml_load_file('../data/teams.xml');
            foreach ($teams->team as $team) {
                echo "<option value='. $team->id . '^^' . urlencode($team->name) . '>{$team->name}</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Create Employee">
    </form>
    <div id="employee">
        <h3>Employee</h3>
        <?php
        $employees = simplexml_load_file('../data/employees.xml');
            echo "<table>";
            echo "<tr><th>Employee</th><th>Team</th></tr>";
            foreach ($employees->employee as $employee) {
                echo "<tr><td>{$employee->name}</td><td>{$employee->team_name}</td></tr>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>
