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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $expertise = $_POST['expertise'];
    $description = $_POST['description'];

    // Logic to update team.csv (simple method)
    $rows = [];
    if (($handle = fopen("team.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $rows[] = $data;
        }
        fclose($handle);
    }

    $rows[$memberId + 1] = [$name, $role, $expertise, $description]; // +1 to account for header row
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
    <title>Edit Team Member</title>
</head>
<body>
    <h1>Edit Team Member</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($member['Name']); ?>" required><br>
        <label>Role:</label><br>
        <input type="text" name="role" value="<?php echo htmlspecialchars($member['Role']); ?>" required><br>
        <label>Expertise:</label><br>
        <input type="text" name="expertise" value="<?php echo htmlspecialchars($member['Expertise']); ?>" required><br>
        <label>Description:</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($member['Description']); ?></textarea><br>
        <input type="submit" value="Save Changes">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
