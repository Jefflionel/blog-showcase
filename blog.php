<?php
// Include the database connection and shared header
include 'includes/db.php';
include 'includes/header.php';

// --- Pagination logic ---
// How many posts per page
$posts_per_page = 6;

// Get the current page number from URL (default = 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

// Get total number of published posts (for pagination)
$total_posts_result = $conn->query("SELECT COUNT(*) AS total FROM posts WHERE status='published'");
$total_posts_row = $total_posts_result->fetch_assoc();
$total_posts = $total_posts_row['total'];

// Calculate total pages
$total_pages = ceil($total_posts / $posts_per_page);

// Fetch the posts for the current page
$query = "SELECT post_id, title, slug, image, LEFT(content, 200) AS excerpt, created_at
          FROM posts WHERE status='published'
          ORDER BY created_at DESC
          LIMIT $posts_per_page OFFSET $offset";
$result = $conn->query($query);
?>

<main class="container mx-auto py-10">
  <h1 class="text-3xl font-bold mb-6 text-center">All Blog Articles</h1>

  <div class="grid md:grid-cols-3 gap-6">
    <?php
    // If there are posts, loop through and display them
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
          <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="" class="w-full h-48 object-cover">
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($row['title']); ?></h2>
            <p class="text-gray-600 text-sm mb-3">
              <?php echo htmlspecialchars($row['excerpt']); ?>...
            </p>
            <a href="post.php?slug=<?php echo urlencode($row['slug']); ?>" class="text-blue-600 hover:underline">Read more →</a>
          </div>
        </div>
    <?php
      }
    } else {
      echo '<p class="text-center text-gray-500">No articles yet.</p>';
    }
    ?>
  </div>

  <!-- Pagination links -->
  <div class="mt-10 text-center">
    <?php if ($page > 1): ?>
      <a href="?page=<?php echo $page - 1; ?>" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Previous</a>
    <?php endif; ?>

    <span class="px-4 py-2 text-gray-700">Page <?php echo $page; ?> of <?php echo $total_pages; ?></span>

    <?php if ($page < $total_pages): ?>
      <a href="?page=<?php echo $page + 1; ?>" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Next</a>
    <?php endif; ?>
  </div>
</main>

<?php include 'includes/footer.php'; ?>