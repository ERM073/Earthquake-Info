<!DOCTYPE html>
<html>
<head>
  <title>地震情報</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
  <center>
  <div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">地震情報</h1>
  </center>
<div class="flex justify-center">
  <?php
  $curlCommand = 'curl -s "https://api.freehostbox.net/earthquake/"';
  $response = shell_exec($curlCommand);
  $result = json_decode($response, true);

  if ($result) {
    echo '<div class="bg-gray-200 p-4 rounded-md">';
    echo '<p class="text-lg">' . $result['description'] . '</p>';
    echo '<h2 class="text-xl font-bold mt-4">' . $result['hypocenter_name'] . '</h2>';
    echo '<p>発生日時: ' . $result['origin_time'] . '</p>';
    echo '<p>最大震度: ' . $result['max_intensity'] . '</p>';
    echo '<p>津波情報: ' . $result['tsunami_info'] . '</p>';
    echo '<a href="https://tools.freehostbox.net" target="new" >' . $result['api-info'] . '</a>';
    echo '</div>';
  } else {
    echo '<p class="text-red-500">地震情報の取得中にエラーが発生しました。</p>';
  }
  ?>
</div>
</div>
  </div>
</body>
</html>
