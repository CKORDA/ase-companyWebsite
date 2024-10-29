<?php


// Function to retrieve all team members
function getTeamMembers() {
    // Logic to read from team.csv or a database
    $team = [];
    if (($handle = fopen("team.csv", "r")) !== FALSE) {
        fgetcsv($handle); // Skip the header
        while (($data = fgetcsv($handle)) !== FALSE) {
            $team[] = [
                'Name' => $data[0],
                'Role' => $data[1],
                'Expertise' => $data[2],
                'Description' => $data[3],
            ];
        }
        fclose($handle);
    }
    return $team;
}

// Display all team members
$teamMembers = getTeamMembers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Members</title>
</head>
<body>
    <h1>Team Members</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Expertise</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($teamMembers as $key => $member): ?>
            <tr>
                <td><?php echo htmlspecialchars($member['Name']); ?></td>
                <td><?php echo htmlspecialchars($member['Role']); ?></td>
                <td><?php echo htmlspecialchars($member['Expertise']); ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $key; ?>">View</a>
                    <a href="edit.php?id=<?php echo $key; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $key; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="create.php">Create New Member</a>
</body>
</html>
