<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<main class="container mx-auto py-10">
  <h1 class="text-3xl font-bold mb-6 text-center">Latest Articles</h1>

  <div class="grid md:grid-cols-3 gap-6">
    <?php
    $query = "SELECT post_id, title, slug, image, LEFT(content, 150) AS excerpt, created_at 
                  FROM posts WHERE status='published' 
                  ORDER BY created_at DESC LIMIT 6";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="uploads/' . $row['image'] . '" alt="" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">' . htmlspecialchars($row['title']) . '</h2>
                        <p class="text-gray-600 text-sm mb-3">' . htmlspecialchars($row['excerpt']) . '...</p>
                        <a href="post.php?slug=' . urlencode($row['slug']) . '" class="text-blue-600 hover:underline">Read more →</a>
                    </div>
                </div>';
      }
    } else {
      echo '<p class="text-center text-gray-500">No articles yet.</p>';
    }
    ?>
  </div>
</main>

<?php include 'includes/footer.php'; ?>