<?php
$contactsFile = '../../data/contacts.json';

// Retrieve all contacts
function getContacts() {
    global $contactsFile;
    $contacts = json_decode(file_get_contents($contactsFile), true);
    return $contacts['contacts'] ?? [];
}

// Retrieve a specific contact by ID
function getContact($id) {
    $contacts = getContacts();
    foreach ($contacts as $contact) {
        if ($contact['id'] == $id) {
            return $contact;
        }
    }
    return null;
}

// Create a new contact
function createContact($data) {
    global $contactsFile;
    $contacts = getContacts();
    $data['id'] = uniqid(); // Generate a unique ID for the new contact
    $contacts[] = $data;
    file_put_contents($contactsFile, json_encode(['contacts' => $contacts], JSON_PRETTY_PRINT));
}

// Update an existing contact by ID
function updateContact($id, $data) {
    global $contactsFile;
    $contacts = getContacts();
    foreach ($contacts as &$contact) {
        if ($contact['id'] == $id) {
            $contact = array_merge($contact, $data);
            break;
        }
    }
    file_put_contents($contactsFile, json_encode(['contacts' => $contacts], JSON_PRETTY_PRINT));
}

// Delete a contact by ID
function deleteContact($id) {
    global $contactsFile;
    $contacts = getContacts();
    $contacts = array_filter($contacts, function ($contact) use ($id) {
        return $contact['id'] != $id;
    });
    file_put_contents($contactsFile, json_encode(['contacts' => $contacts], JSON_PRETTY_PRINT));
}
?>
