<?php
// app/Models/ProjectImage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = ['portfolio_project_id', 'image_path', 'caption', 'sort_order'];
}