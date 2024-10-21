<?php
include_once 'pages.php';

$pages = retrieveAllPages();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Pages</title>
</head>
<body>
    <h1>Pages</h1>
    <a href="create.php">Create New Page</a>
    <table border="1">
        <tr>
            <th>Index</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($pages as $index => $page): ?>
        <tr>
            <td><?php echo $index; ?></td>
            <td><?php echo $page['name']; ?></td>
            <td>
                <a href="detail.php?index=<?php echo $index; ?>">View</a>
                <a href="edit.php?index=<?php echo $index; ?>">Edit</a>
                <a href="delete.php?index=<?php echo $index; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
