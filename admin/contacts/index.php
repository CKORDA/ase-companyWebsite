<?php
// Include the contacts functions
include 'contacts.php';

// Retrieve all contacts
$contacts = getContacts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Requests</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Contact Requests</h1>
        
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['id']); ?></td>
                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo urlencode($contact['id']); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
