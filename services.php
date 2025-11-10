<?php include 'includes/header.php'; ?>

<h1 class="text-3xl font-bold mb-8 text-center">Our Services</h1>

<div class="grid md:grid-cols-3 gap-8">
  <?php
  $services = [
    ["Web Design", "Beautiful and responsive websites for all devices."],
    ["Branding", "Helping you build a strong and recognizable identity."],
    ["SEO Optimization", "Improving visibility and driving organic traffic."]
  ];
  foreach ($services as $service): ?>
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg text-center">
      <h2 class="text-xl font-semibold mb-2 text-blue-600"><?= $service[0] ?></h2>
      <p class="text-gray-600"><?= $service[1] ?></p>
    </div>
  <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
