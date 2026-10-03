<?php
// app/Models/SkillItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillItem extends Model
{
    protected $fillable = ['name', 'level', 'category', 'sort_order'];
}