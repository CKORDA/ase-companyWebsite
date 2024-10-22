<?php
include_once 'pages.php';

$pageIndex = $_GET['index']; // Get the index from the URL
$page = retrievePage($pageIndex);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $applications = json_decode($_POST['applications'], true);

    // Ensure applications is an array
    if (!is_array($applications)) {
        $applications = [];
    }

    // Update the page using the pageIndex
    if (updatePage($pageIndex, $name, $description, $applications)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error saving changes.";
    }
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
        <input type="text" name="name" value="<?php echo htmlspecialchars($page['name']); ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" rows="5" required><?php echo htmlspecialchars($page['description']); ?></textarea><br><br>
        <label>Applications (JSON format):</label><br>
        <textarea name="applications" rows="10" required><?php echo json_encode($page['applications'], JSON_PRETTY_PRINT); ?></textarea><br><br>
        <button type="submit">Save Changes</button>
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
