<?php
/**
 * Image Optimization Script for Laravel Portfolio
 * Run: php optimize-images.php
 * Requires: GD extension (usually built-in)
 */

$sourceDir = __DIR__ . '/public/images';
$quality = 80; // JPEG/WebP quality
$maxWidth = 1920; // Max width for large images
$maxProfileWidth = 800; // Max width for profile images

$results = [];

// Fungsi kompresi gambar
function optimizeImage($sourcePath, $destPath, $quality, $maxWidth, $convertToWebp = true) {
    $info = getimagesize($sourcePath);
    if (!$info) return ['error' => 'Invalid image'];

    $mime = $info['mime'];
    $width = $info[0];
    $height = $info[1];

    // Load image
    switch ($mime) {
        case 'image/jpeg': $src = imagecreatefromjpeg($sourcePath); break;
        case 'image/png': $src = imagecreatefrompng($sourcePath); break;
        case 'image/webp': $src = imagecreatefromwebp($sourcePath); break;
        default: return ['error' => "Unsupported format: $mime"];
    }

    if (!$src) return ['error' => 'Failed to load image'];

    // Resize if needed
    if ($width > $maxWidth) {
        $newHeight = intval($height * $maxWidth / $width);
        $dst = imagecreatetruecolor($maxWidth, $newHeight);
        if ($mime === 'image/png' || $mime === 'image/webp') {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $maxWidth, $newHeight, $width, $height);
        imagedestroy($src);
        $src = $dst;
        $width = $maxWidth;
        $height = $newHeight;
    }

    $originalSize = filesize($sourcePath);

    // Save optimized
    if ($convertToWebp) {
        $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $destPath);
        imagewebp($src, $webpPath, $quality);
        $newSize = filesize($webpPath);
        $saved = $originalSize - $newSize;
        $savedPct = round($saved / $originalSize * 100, 1);
        return [
            'original' => $originalSize,
            'optimized' => $newSize,
            'saved' => $saved,
            'saved_pct' => $savedPct,
            'format' => 'webp',
            'path' => $webpPath
        ];
    } else {
        // Save as original format
        switch ($mime) {
            case 'image/jpeg': imagejpeg($src, $destPath, $quality); break;
            case 'image/png': imagepng($src, $destPath, round($quality/10)); break;
        }
        $newSize = filesize($destPath);
        $saved = $originalSize - $newSize;
        $savedPct = round($saved / $originalSize * 100, 1);
        return [
            'original' => $originalSize,
            'optimized' => $newSize,
            'saved' => $saved,
            'saved_pct' => $savedPct,
            'format' => pathinfo($destPath, PATHINFO_EXTENSION),
            'path' => $destPath
        ];
    }
}

echo "=== IMAGE OPTIMIZATION STARTED ===\n\n";

// Profile images - special handling
$profileImages = ['profile.jpg', 'profile1.png'];
foreach ($profileImages as $img) {
    $src = $sourceDir . '/' . $img;
    if (file_exists($src)) {
        $result = optimizeImage($src, $src, 85, $maxProfileWidth, true);
        if (isset($result['error'])) {
            echo "❌ $img: {$result['error']}\n";
        } else {
            echo "✅ $img: {$result['original']} bytes → {$result['optimized']} bytes ({$result['saved_pct']}% saved) as {$result['format']}\n";
            $results[$img] = $result;
        }
    }
}

// Project images - larger max width
$projectImages = [
    'hero-bg-placeholder.JPG',
    'project-financial-dashboard.jpg',
    'project-financial-dashboard-2.jpg',
    'project-financial-dashboard-3.jpg',
    'project-financial-dashboard-4.jpg',
    'project-ecommerce-dashboard.jpg',
    'project-tb-home.jpg',
    'project-tb-about.jpg',
    'project-tb-login.jpg',
    'project-tb-dashboard.jpg',
    'project-tb-checkin.jpg',
    'project-intern-home.png',
    'project-intern-about.png',
    'project-intern-detail.png',
    'project-intern-dashboard.png',
    'project-intern-listings.png',
];

foreach ($projectImages as $img) {
    $src = $sourceDir . '/' . $img;
    if (file_exists($src)) {
        $result = optimizeImage($src, $src, 80, $maxWidth, true);
        if (isset($result['error'])) {
            echo "❌ $img: {$result['error']}\n";
        } else {
            echo "✅ $img: " . number_format($result['original']) . " bytes → " . number_format($result['optimized']) . " bytes ({$result['saved_pct']}% saved) as {$result['format']}\n";
            $results[$img] = $result;
        }
    }
}

// Icons - just compress, don't convert to WebP (small already)
$icons = ['certif-icon.png', 'skill-icon.png', 'project-icon.png'];
foreach ($icons as $img) {
    $src = $sourceDir . '/' . $img;
    if (file_exists($src)) {
        $result = optimizeImage($src, $src, 90, 100, false);
        if (isset($result['error'])) {
            echo "❌ $img: {$result['error']}\n";
        } else {
            echo "✅ $img: {$result['original']} bytes → {$result['optimized']} bytes ({$result['saved_pct']}% saved)\n";
            $results[$img] = $result;
        }
    }
}

echo "\n=== SUMMARY ===\n";
$totalOriginal = array_sum(array_column($results, 'original'));
$totalOptimized = array_sum(array_column($results, 'optimized'));
$totalSaved = $totalOriginal - $totalOptimized;
echo "Total original: " . number_format($totalOriginal) . " bytes\n";
echo "Total optimized: " . number_format($totalOptimized) . " bytes\n";
echo "Total saved: " . number_format($totalSaved) . " bytes (" . round($totalSaved/$totalOriginal*100, 1) . "%)\n";

// Show WebP files created
echo "\n=== WebP FILES CREATED ===\n";
$webpFiles = glob($sourceDir . '/*.webp');
foreach ($webpFiles as $f) {
    echo basename($f) . " (" . number_format(filesize($f)) . " bytes)\n";
}

echo "\n=== DONE ===\n";
echo "Note: Update your Blade views to use .webp versions where appropriate.\n";
echo "For fallback, keep original files or use <picture> element.\n";