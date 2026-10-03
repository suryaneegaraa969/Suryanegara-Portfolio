<?php
// app/Models/PortfolioProject.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'link', 'is_featured', 'sort_order',
        'role', 'duration', 'project_type', 'tools_used', 'full_description',
    ];

    // Laravel akan cari project berdasarkan 'slug', bukan 'id', saat route model binding
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    public function toolsArray(): array
    {
        return $this->tools_used ? array_map('trim', explode(',', $this->tools_used)) : [];
    }
}