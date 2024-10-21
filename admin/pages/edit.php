<?php
include_once 'pages.php';

$page = retrievePage($_GET['index']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $applications = json_decode($_POST['applications'], true);
    updatePage($_GET['index'], $name, $description, $applications);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Page</title>
</head>
<body>
    <h1>Edit Page</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $page['name']; ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" rows="5" required><?php echo $page['description']; ?></textarea><br><br>
        <label>Applications (JSON format):</label><br>
        <textarea name="applications" rows="10" required><?php echo json_encode($page['applications'], JSON_PRETTY_PRINT); ?></textarea><br><br>
        <button type="submit">Save Changes</button>
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
