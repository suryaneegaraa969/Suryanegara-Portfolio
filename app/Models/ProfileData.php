<?php
// app/Models/ProfileData.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileData extends Model
{
    protected $table = 'profile_data';

    protected $fillable = [
        'name', 'title', 'short_bio', 'resume_url',
        'profile_image', 'background_image', 'email', 'phone',
    ];
}