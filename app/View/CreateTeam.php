<!DOCTYPE html>
<html>
<head>
    <title>Create Team</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Create Team</h2>
    <form method="post" action="create_team">
        <label>Team Name:</label>
        <input type="text" name="team_name" required><br>
        <input type="submit" value="Create Team">
    </form>
    <div id="team">
        <h3>Team</h3>
        <?php
        $xml = simplexml_load_file('../data/teams.xml');
            echo "<table>";
            echo "<tr><th>Team Name</th></tr>";
            foreach ($xml->team as $team) {
                    echo "<tr><td>{$team->name}</td></tr>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>
