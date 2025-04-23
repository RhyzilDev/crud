<?php
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $class = mysqli_real_escape_string($mysqli, $_POST['class']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);

    $errors = [];

    if (empty($name)) $errors[] = "Name field is empty.";
    if (empty($address)) $errors[] = "Address field is empty.";
    if (empty($class)) $errors[] = "Class field is empty.";
    if (empty($phone)) $errors[] = "Phone field is empty.";

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Add Student</title>
        <script src='https://cdn.tailwindcss.com'></script>
    </head>
    <body class='bg-gray-100 font-sans'>
        <div class='max-w-xl mx-auto mt-16 p-8 bg-white rounded-lg shadow-lg'>";

    if (!empty($errors)) {
        echo "<div class='mb-4'>";
        foreach ($errors as $error) {
            echo "<p class='text-red-600 font-medium'>⚠️ $error</p>";
        }
        echo "<a href='javascript:self.history.back();' class='inline-block mt-4 text-blue-600 hover:underline'>← Go Back</a>";
        echo "</div>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO users (name, address, class, phone) VALUES ('$name', '$address', '$class', '$phone')");

        if ($result) {
            echo "<p class='text-green-600 font-semibold text-xl mb-4'>✅ Student added successfully!</p>";
            echo "<a href='index.php' class='text-blue-600 hover:underline'>← Back to Home</a>";
        } else {
            echo "<p class='text-red-600 font-medium'>❌ Failed to add student: " . mysqli_error($mysqli) . "</p>";
        }
    }

    echo "</div>
    </body>
    </html>";
}
?>
