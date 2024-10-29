<?php
require_once '../CSVHelper.php'; // Include the CSVHelper class

// Function to get a specific team member by ID
function getTeamMember($id) {
    $team = CSVHelper::readCSV('team.csv');
    return isset($team[$id]) ? $team[$id] : null; // No more +1 offset
}

// Get the member ID from the URL and validate it
$memberId = isset($_GET['id']) ? intval($_GET['id']) : null;
$member = getTeamMember($memberId);

if (!$member) {
    echo "Team member not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logic to remove the team member from team.csv
    CSVHelper::deleteCSV('team.csv', $memberId); // Correctly pass the $memberId without offset

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Team Member</title>
</head>
<body>
    <h1>Delete Team Member</h1>
    <p>Are you sure you want to delete <?php echo htmlspecialchars($member[0]); ?>?</p>
    <form method="POST">
        <input type="submit" value="Confirm Deletion">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
