<?php
// database/seeders/ProfileDataSeeder.php
namespace Database\Seeders;

use App\Models\ProfileData;
use Illuminate\Database\Seeder;

class ProfileDataSeeder extends Seeder
{
    public function run(): void
    {
        ProfileData::create([
            'name' => 'Ahmad Barroq Suryanegara',
            'title' => 'Data Analyst | Informatics Student',
            'short_bio' => 'I am an undergraduate Informatics student at Ahmad Dahlan University with a strong interest in data analytics and evidence-based decision making. I have hands-on experience in data preprocessing, analysis, and insight generation using Python via Google Colab, as well as creating interactive dashboards and visualizations with Tableau. I actively explore topics in statistics, machine learning, and data storytelling to strengthen my analytical capabilities.',
            'resume_url' => '/storage/resume/CV_Ahmad_Barroq_Suryanegara.pdf',
            'profile_image' => '/images/profile.jpg',
            'background_image' => '/images/hero-bg-placeholder.jpg',
            'email' => 'ahmadbarroq123@gmail.com',
            'phone' => '+62 877-4949-4136',
        ]);
    }
}