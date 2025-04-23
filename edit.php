<?php
require_once("dbConnection.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = mysqli_prepare($mysqli, "SELECT * FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $address = $data['address'];
        $class = $data['class'];
        $phone = $data['phone'];
    } else {
        echo "No user found with ID = $id";
        exit;
    }
} else {
    echo "Invalid ID parameter.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

  <div class="bg-white w-full max-w-2xl rounded-xl shadow-lg p-8">
    <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Edit Student Info</h2>

    <form name="edit" method="post" action="editAction.php" class="space-y-6">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div>
        <label class="block text-gray-700 font-medium mb-1">Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"
          class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>"
          class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Class</label>
        <input type="text" name="class" value="<?php echo htmlspecialchars($class); ?>"
          class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Phone</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"
          class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div class="flex justify-between items-center pt-4">
        <a href="index.php" class="text-blue-600 hover:underline text-sm">← Back to Home</a>
        <button type="submit" name="update"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
          Update
        </button>
      </div>
    </form>
  </div>

</body>
</html>
