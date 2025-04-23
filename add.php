<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New Student</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
	<script src="https://cdn.lordicon.com/lordicon.js"></script>
	<style>
		body { font-family: 'Inter', sans-serif; }
	</style>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-purple-100 min-h-screen flex items-center justify-center px-4">

	<div class="bg-white w-full max-w-lg rounded-3xl shadow-2xl p-10 transition duration-300">
		<div class="mb-8">
			<h2 class="text-3xl font-bold text-gray-800 text-center flex items-center justify-center gap-2">
				Add New Student
			</h2>
			<p class="text-center text-sm text-gray-500 mt-2">Fill in the details below to register a student</p>
		</div>

		<form action="addAction.php" method="post" class="space-y-6">
			<div>
				<label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
				<input type="text" name="name" id="name" required
					class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
			</div>

			<div>
				<label for="address" class="block text-gray-700 font-semibold mb-1">Address</label>
				<input type="text" name="address" id="address" required
					class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
			</div>

			<div>
				<label for="class" class="block text-gray-700 font-semibold mb-1">Class</label>
				<input type="text" name="class" id="class" required
					class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
			</div>

			<div>
				<label for="phone" class="block text-gray-700 font-semibold mb-1">Phone</label>
				<input type="tel" name="phone" id="phone" required
					class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
					pattern="[0-9]{10}" placeholder="1234567890">
			</div>

			<div class="flex items-center justify-between mt-6">
				<a href="index.php" class="text-sm text-blue-500 hover:underline">← Back to Home</a>
				<button type="submit" name="submit"
					class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-xl shadow-md transition-all duration-200">
					Add Student
				</button>
			</div>
		</form>
	</div>

	<style>
		@keyframes fadeIn {
			to { opacity: 1; }
		}
	</style>

</body>
</html>
