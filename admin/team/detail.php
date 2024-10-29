<?php
require_once '../CSVHelper.php'; // Include the CSVHelper class

// Function to get a specific team member by their ID
function getTeamMember($id) {
    $team = CSVHelper::readCSV('team.csv');
    return isset($team[$id]) ? $team[$id] : null; // No +1 needed; access directly
}

// Get the member ID from the query string and validate it
$memberId = isset($_GET['id']) ? intval($_GET['id']) : null; // Use intval to sanitize input
$member = getTeamMember($memberId);

if (!$member) {
    echo "Team member not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($member[0]); ?> - Details</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($member[0]); ?></h1>
    <p><strong>Role:</strong> <?php echo htmlspecialchars($member[1]); ?></p>
    <p><strong>Expertise:</strong> <?php echo htmlspecialchars($member[2]); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($member[3]); ?></p>
    <a href="edit.php?id=<?php echo $memberId; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $memberId; ?>">Delete</a>
    <a href="index.php">Back to List</a>
</body>
</html>
