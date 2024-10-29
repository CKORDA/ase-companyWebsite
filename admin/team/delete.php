<?php


// Function to retrieve a specific team member by ID
function getTeamMember($id) {
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
    return isset($team[$id]) ? $team[$id] : null;
}

// Get the member ID from the URL
$memberId = $_GET['id'];
$member = getTeamMember($memberId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logic to remove from team.csv
    $rows = [];
    if (($handle = fopen("team.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $rows[] = $data;
        }
        fclose($handle);
    }

    unset($rows[$memberId + 1]); // +1 to account for header row
    $rows = array_values($rows); // Reindex array

    $file = fopen("team.csv", "w");
    foreach ($rows as $row) {
        fputcsv($file, $row);
    }
    fclose($file);

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
    <p>Are you sure you want to delete <?php echo htmlspecialchars($member['Name']); ?>?</p>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $memberId; ?>">
        <input type="submit" value="Confirm Deletion">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
