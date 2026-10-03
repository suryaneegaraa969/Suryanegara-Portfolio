#!/bin/bash
# Image Optimization Script using ImageMagick
# Run: chmod +x optimize-images.sh && ./optimize-images.sh
# Requires: ImageMagick (brew install imagemagick / apt install imagemagick)

SOURCE_DIR="public/images"
QUALITY=80
MAX_WIDTH=1920
MAX_PROFILE_WIDTH=800

echo "=== IMAGE OPTIMIZATION STARTED ==="
echo ""

# Check ImageMagick
if ! command -v magick &> /dev/null && ! command -v convert &> /dev/null; then
    echo "❌ ImageMagick not found. Install first:"
    echo "  macOS: brew install imagemagick"
    echo "  Ubuntu/Debian: sudo apt install imagemagick"
    echo "  Windows: Download from https://imagemagick.org/script/download.php"
    exit 1
fi

# Use 'magick' for IM v7, 'convert' for v6
if command -v magick &> /dev/null; then
    IMG_CMD="magick"
else
    IMG_CMD="convert"
fi

echo "Using ImageMagick: $IMG_CMD"
echo ""

# Profile images
echo "📸 Optimizing profile images..."
for img in profile.jpg profile1.png; do
    if [ -f "$SOURCE_DIR/$img" ]; then
        echo "  Processing $img..."
        magick "$SOURCE_DIR/$img" -resize "${MAX_PROFILE_WIDTH}x>" -quality 85 -strip "${img%.*}.webp"
        echo "  ✅ $img → ${img%.*}.webp"
    fi
done

# Project images
echo ""
echo "🖼️  Optimizing project images..."
project_images=(
    "hero-bg-placeholder.JPG"
    "project-financial-dashboard.jpg"
    "project-financial-dashboard-2.jpg"
    "project-financial-dashboard-3.jpg"
    "project-financial-dashboard-4.jpg"
    "project-ecommerce-dashboard.jpg"
    "project-tb-home.jpg"
    "project-tb-about.jpg"
    "project-tb-login.jpg"
    "project-tb-dashboard.jpg"
    "project-tb-checkin.jpg"
    "project-intern-home.png"
    "project-intern-about.png"
    "project-intern-detail.png"
    "project-intern-dashboard.png"
    "project-intern-listings.png"
)

for img in "${project_images[@]}"; do
    if [ -f "$SOURCE_DIR/$img" ]; then
        echo "  Processing $img..."
        magick "$SOURCE_DIR/$img" -resize "${MAX_WIDTH}x>" -quality 80 -strip "${img%.*}.webp"
        echo "  ✅ $img → ${img%.*}.webp"
    fi
done

# Icons - just compress
echo ""
echo "🔧 Compressing icons..."
for img in certif-icon.png skill-icon.png project-icon.png; do
    if [ -f "$SOURCE_DIR/$img" ]; then
        magick "$SOURCE_DIR/$img" -quality 90 -strip "$SOURCE_DIR/$img"
        echo "  ✅ $img compressed"
    fi
done

echo ""
echo "=== SUMMARY ==="
echo "WebP files created:"
ls -lh "$SOURCE_DIR"/*.webp 2>/dev/null | awk '{print "  " $9 " (" $5 ")"}'

echo ""
echo "=== MANUAL STEPS FOR BLADE VIEWS ==="
echo "1. Update <img> tags to use .webp with <picture> fallback:"
echo ""
echo '   <picture>'
echo '       <source srcset="{{ asset('"'"'images/profile.webp'"'"') }}" type="image/webp">'
echo '       <img src="{{ asset('"'"'images/profile.jpg'"'"') }}" alt="..." loading="lazy">'
echo '   </picture>'
echo ""
echo "2. Add loading='lazy' to images below the fold"
echo "3. Hero image (first viewport) should keep loading='eager' (default)"
echo ""
echo "=== DONE ==="