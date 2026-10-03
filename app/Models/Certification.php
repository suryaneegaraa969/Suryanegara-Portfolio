<?php
// app/Models/Certification.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title', 'slug', 'issuer', 'certificate_number', 'issued_date',
        'description', 'full_description', 'skills_covered', 'duration',
        'credential_url', 'certificate_file', 'sort_order',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function skillsArray(): array
    {
        return $this->skills_covered ? array_map('trim', explode(',', $this->skills_covered)) : [];
    }
}