<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProfileDataSeeder::class,
            PortfolioProjectSeeder::class,
            ProjectImageSeeder::class,
            SkillItemSeeder::class,
            CertificationSeeder::class,
        ]);
    }
}