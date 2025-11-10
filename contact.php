<?php include 'includes/header.php'; ?>

<h1 class="text-3xl font-bold mb-6 text-center">Contact Us</h1>

<form class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
  <div class="mb-4">
    <label class="block mb-1 font-semibold">Name</label>
    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500" placeholder="Your name">
  </div>
  <div class="mb-4">
    <label class="block mb-1 font-semibold">Email</label>
    <input type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-blue-500" placeholder="you@example.com">
  </div>
  <div class="mb-4">
    <label class="block mb-1 font-semibold">Message</label>
    <textarea class="w-full border border-gray-300 rounded px-3 py-2 h-32 focus:outline-green-500" placeholder="Your message..."></textarea>
  </div>
  <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Send Message</button>
</form>

<?php include 'includes/footer.php'; ?>

