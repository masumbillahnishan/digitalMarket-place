<?php
// You should fetch new notifications from your database here
// Replace this with your actual database query

// Simulated new notifications
$newNotifications = [
    "New product added: Product A",
    "New hire request from User B",
];

foreach ($newNotifications as $notification) {
    // Output the notification as HTML
    echo '<div class="notification p-2 bg-cyan-500 text-white rounded-lg cursor-pointer">' . $notification . '</div>';
}
?>
