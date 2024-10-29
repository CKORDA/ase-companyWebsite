<?php
// Include the contacts functions
include 'contacts.php';

// Check if the ID is provided
if (isset($_GET['id'])) {
    $contact = getContact($_GET['id']);
    if (!$contact) {
        echo "Contact not found!";
        exit;
    }
} else {
    echo "No contact ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
</head>
<body>
    <h1>Contact Details</h1>
    
    <p><strong>ID:</strong> <?php echo htmlspecialchars($contact['id']); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($contact['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
    <p><strong>Message:</strong> <?php echo htmlspecialchars($contact['message']); ?></p>
    
    <a href="index.php">Back to Contact List</a>
</body>
</html>
