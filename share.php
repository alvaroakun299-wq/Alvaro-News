<?php
// Ambil slug dari URL yang dibagikan
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// GANTI DENGAN URL APPS SCRIPT ANDA
$api_url = "https://script.google.com/macros/s/AKfycbyx4tEBeWK63ilmVp409aH5FH_5sfk83ykucwOBQYIctYSgn8ffPjMOfUEECaDY6kka/exec?action=getArticles";

// Pengaturan bawaan jika artikel tidak ditemukan
$title = "Alvaro News";
$description = "Baca berita dan artikel terkini seputar Alvaro dan Vr Lovers.";
$image = "https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=500";
$target_url = "https://alvaronewss.my.id/artikel.html";

if ($slug !== '') {
    // Ambil data dari database Apps Script
    $json_data = file_get_contents($api_url);
    $response = json_decode($json_data, true);

    // Cocokkan slug untuk mencari thumbnail dan judul asli
    if ($response && isset($response['data'])) {
        foreach ($response['data'] as $article) {
            if ($article['Slug'] === $slug) {
                $title = $article['Title'] . " - Alvaro News";
                $description = $article['Summary'];
                $image = $article['Thumbnail'];
                $target_url = "https://alvaronewss.my.id/artikel.html?slug=" . $slug;
                break;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>

    <!-- Data yang dibaca oleh Bot WhatsApp, FB, Telegram -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:image" content="<?php echo $image; ?>">
    <meta property="og:url" content="<?php echo $target_url; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo $image; ?>">

    <!-- Skrip untuk langsung mengalihkan manusia ke halaman artikel asli -->
    <script>
        window.location.replace("<?php echo $target_url; ?>");
    </script>
</head>
<body>
    <p style="font-family: sans-serif; text-align: center; margin-top: 20vh;">
        Memuat artikel... Jika tidak dialihkan secara otomatis, <a href="<?php echo $target_url; ?>">klik di sini</a>.
    </p>
</body>
</html>
