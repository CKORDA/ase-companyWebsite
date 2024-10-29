<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $expertise = $_POST['expertise'];
    $description = $_POST['description'];

    // Logic to append to team.csv
    $file = fopen("team.csv", "a");
    fputcsv($file, [$name, $role, $expertise, $description]);
    fclose($file);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Team Member</title>
</head>
<body>
    <h1>Create Team Member</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Role:</label><br>
        <input type="text" name="role" required><br>
        <label>Expertise:</label><br>
        <input type="text" name="expertise" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
