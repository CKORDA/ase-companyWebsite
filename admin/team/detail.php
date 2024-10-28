<?php
require_once '../CSVHelper.php'; // Include the CSVHelper class

// Function to get a specific team member by their ID
function getTeamMember($id) {
    $team = CSVHelper::readCSV('team.csv');
    return isset($team[$id + 1]) ? $team[$id + 1] : null; // +1 to account for the header row
}

// Get the member ID from the query string
$memberId = $_GET['id'];
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
