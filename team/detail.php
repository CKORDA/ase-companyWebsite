<?php


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

$memberId = $_GET['id'];
$member = getTeamMember($memberId);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($member['Name']); ?> - Details</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($member['Name']); ?></h1>
    <p><strong>Role:</strong> <?php echo htmlspecialchars($member['Role']); ?></p>
    <p><strong>Expertise:</strong> <?php echo htmlspecialchars($member['Expertise']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($member['Description']); ?></p>
    <a href="edit.php?id=<?php echo $memberId; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $memberId; ?>">Delete</a>
    <a href="index.php">Back to List</a>
</body>
</html>
