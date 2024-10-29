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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated values from the form
    $name = $_POST['name'];
    $role = $_POST['role'];
    $expertise = $_POST['expertise'];
    $description = $_POST['description'];

    // Prepare the updated member data
    $updatedMember = [$name, $role, $expertise, $description];

    // Update the CSV file using CSVHelper
    CSVHelper::updateCSV('team.csv', $memberId, $updatedMember); // +1 for the header row

    // Redirect back to the index page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Team Member</title>
</head>
<body>
    <h1>Edit Team Member</h1>
    <?php if ($member): ?>
        <form method="POST">
            <label>Name:</label><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($member[0]); ?>" required><br>
            <label>Role:</label><br>
            <input type="text" name="role" value="<?php echo htmlspecialchars($member[1]); ?>" required><br>
            <label>Expertise:</label><br>
            <input type="text" name="expertise" value="<?php echo htmlspecialchars($member[2]); ?>" required><br>
            <label>Description:</label><br>
            <textarea name="description" required><?php echo htmlspecialchars($member[3]); ?></textarea><br>
            <input type="submit" value="Save Changes">
        </form>
    <?php else: ?>
        <p>Team member not found.</p>
    <?php endif; ?>
    <a href="index.php">Back to List</a>
</body>
</html>
