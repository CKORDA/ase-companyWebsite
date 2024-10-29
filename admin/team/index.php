<?php
require_once '../CSVHelper.php'; // Include the CSVHelper class

// Function to retrieve all team members using CSVHelper
function getTeamMembers() {
    $filePath = 'team.csv';
    return CSVHelper::readCSV($filePath);
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
            <?php if ($key == 0) continue; // Skip the header if present ?>
            <tr>
                <td><?php echo htmlspecialchars($member[0]); ?></td>
                <td><?php echo htmlspecialchars($member[1]); ?></td>
                <td><?php echo htmlspecialchars($member[2]); ?></td>
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
