<?php
// database/seeders/ProjectImageSeeder.php
namespace Database\Seeders;

use App\Models\PortfolioProject;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProjectImageSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProjectImage::truncate();
        Schema::enableForeignKeyConstraints();

        $financial = PortfolioProject::where('slug', 'financial-dashboard-water-delivery-trucks')->first();

        if ($financial) {
            ProjectImage::insert([
                [
                    'portfolio_project_id' => $financial->id,
                    'image_path' => '/images/project-financial-dashboard.jpg',
                    'caption' => 'Full Tableau dashboard overview',
                    'sort_order' => 1,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $financial->id,
                    'image_path' => '/images/project-financial-dashboard-2.jpg',
                    'caption' => 'Monthly income vs expenses (interactive Plotly chart)',
                    'sort_order' => 2,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $financial->id,
                    'image_path' => '/images/project-financial-dashboard-3.jpg',
                    'caption' => 'Vehicle usage frequency vs maintenance cost',
                    'sort_order' => 3,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $financial->id,
                    'image_path' => '/images/project-financial-dashboard-4.jpg',
                    'caption' => 'Delivery location heatmap across Yogyakarta',
                    'sort_order' => 4,
                    'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        $ecommerce = PortfolioProject::where('slug', 'ecommerce-product-dashboard')->first();

        if ($ecommerce) {
            ProjectImage::insert([
                [
                    'portfolio_project_id' => $ecommerce->id,
                    'image_path' => '/images/project-ecommerce-dashboard.jpg',
                    'caption' => 'Full Tableau dashboard overview',
                    'sort_order' => 1,
                    'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        $tbCounseling = PortfolioProject::where('slug', 'counseling-website-tb-patients')->first();

        if ($tbCounseling) {
            ProjectImage::insert([
                [
                    'portfolio_project_id' => $tbCounseling->id,
                    'image_path' => '/images/project-tb-home.jpg',
                    'caption' => 'Homepage — TBC awareness news and activities',
                    'sort_order' => 1,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $tbCounseling->id,
                    'image_path' => '/images/project-tb-login.jpg',
                    'caption' => 'Login page for registered patients',
                    'sort_order' => 2,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $tbCounseling->id,
                    'image_path' => '/images/project-tb-about.jpg',
                    'caption' => 'Educational page about Tuberculosis (TBC)',
                    'sort_order' => 3,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $tbCounseling->id,
                    'image_path' => '/images/project-tb-dashboard.jpg',
                    'caption' => 'Patient dashboard — identity and treatment status',
                    'sort_order' => 4,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $tbCounseling->id,
                    'image_path' => '/images/project-tb-checkin.jpg',
                    'caption' => 'Daily check-in form for symptom and medication tracking',
                    'sort_order' => 5,
                    'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        $internship = PortfolioProject::where('slug', 'internship-application-information-system')->first();

                $internship = PortfolioProject::where('slug', 'internship-application-information-system')->first();

        if ($internship) {
            ProjectImage::insert([
                [
                    'portfolio_project_id' => $internship->id,
                    'image_path' => '/images/project-intern-home.png',
                    'caption' => 'Homepage — introduction to the internship program',
                    'sort_order' => 1,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $internship->id,
                    'image_path' => '/images/project-intern-about.png',
                    'caption' => 'About Us — organizational profile page',
                    'sort_order' => 2,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $internship->id,
                    'image_path' => '/images/project-intern-listings.png',
                    'caption' => 'Internship listings with search and filter functionality',
                    'sort_order' => 3,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $internship->id,
                    'image_path' => '/images/project-intern-detail.png',
                    'caption' => 'Detailed job description for a specific internship position',
                    'sort_order' => 4,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'portfolio_project_id' => $internship->id,
                    'image_path' => '/images/project-intern-dashboard.png',
                    'caption' => 'Applicant dashboard — application status and history',
                    'sort_order' => 5,
                    'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }
    }
}