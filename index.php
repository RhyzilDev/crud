<?php
require_once("dbConnection.php");

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($mysqli, $_GET['search']);
    $query = "SELECT * FROM users WHERE name LIKE '%$search%' OR address LIKE '%$search%' OR class LIKE '%$search%' OR phone LIKE '%$search%' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM users ORDER BY id DESC";
}

$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        Student List
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
        </svg>
      </h2>
      <a href="add.php" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
        Add New Student
      </a>
    </div>

    <!-- Stylish Search Form -->
    <form method="GET" class="flex items-center max-w-lg mx-auto mb-6">
      <label class="sr-only" for="voice-search">Search</label>
      <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <input
          type="text"
          name="search"
          id="voice-search"
          value="<?php echo htmlspecialchars($search); ?>"
          required
          placeholder="Search students..."
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
        />
        <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
          <svg class="w-4 h-4 text-gray-500 hover:text-gray-900" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 7v3a5.006 5.006 0 0 1-5 5H6a5.006 5.006 0 0 1-5-5V7m7 9v3m-3 0h6M7 1h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Z"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      <button
        type="submit"
        class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
      >
        <svg class="w-4 h-4 me-2" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Search
      </button>
    </form>

    <!-- Student Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead>
          <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Name</th>
            <th class="py-3 px-6 text-left">Address</th>
            <th class="py-3 px-6 text-left">Class</th>
            <th class="py-3 px-6 text-left">Phone</th>
            <th class="py-3 px-6 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
          <?php while ($res = mysqli_fetch_assoc($result)) { ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($res['id']); ?></td>
              <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($res['name']); ?></td>
              <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($res['address']); ?></td>
              <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($res['class']); ?></td>
              <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($res['phone']); ?></td>
              <td class="py-3 px-6 text-center">
                <a href="edit.php?id=<?php echo $res['id']; ?>" class="text-indigo-600 hover:text-indigo-800 font-medium mr-4">Edit</a>
                <a href="delete.php?id=<?php echo $res['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="text-red-500 hover:text-red-700 font-medium">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
