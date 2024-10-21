<?php
include_once 'pages.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $applications = json_decode($_POST['applications'], true);
    createPage($name, $description, $applications);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create New Page</title>
</head>
<body>
    <h1>Create New Page</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" rows="5" required></textarea><br><br>
        <label>Applications (JSON format):</label><br>
        <textarea name="applications" rows="10" required></textarea><br><br>
        <button type="submit">Create</button>
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>