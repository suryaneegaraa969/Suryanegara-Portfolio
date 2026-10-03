<?php
// database/seeders/PortfolioProjectSeeder.php
namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;

class PortfolioProjectSeeder extends Seeder
{
    public function run(): void
    {
        PortfolioProject::insert([
            [
                'title' => 'Financial Dashboard - Water Delivery Trucks',
                'slug' => 'financial-dashboard-water-delivery-trucks',
                'description' => 'Performed data preprocessing on a simulated real-case financial dataset (sourced from Kaggle) covering daily income and operational expenses of water delivery trucks in Indonesia. Built an interactive Tableau dashboard to visualize revenue patterns, costs, and driver performance.',
                'full_description' => "This project began with a raw financial dataset covering daily transactions of a refillable water delivery business, including driver names, vehicle plate numbers, order sources, delivery volume, income, and expenses.\n\nThe workflow started in Google Colab using Python. Key libraries such as pandas, numpy, matplotlib, seaborn, and plotly were used to explore and clean the data. Several data quality issues were identified: missing values in the Date, Driver, and Plate Number columns, and dash ('-') placeholders in the Volume column that needed to be converted into proper numeric values.\n\nAfter cleaning, the dataset was aggregated on a monthly basis to calculate total income, total expenses, and net profit. An interactive Plotly chart was built to visualize these trends across 2024, revealing that the business remained profitable every month except April, which stood out as an anomaly with lower revenue and higher expenses.\n\nFurther exploration included analyzing average delivery volume per vehicle, comparing maintenance frequency versus cost per truck, and mapping delivery locations using Folium to understand geographic distribution across the Yogyakarta region.\n\nThe final step was building a polished, interactive dashboard in Tableau that consolidates all these insights — income vs expenses trends, driver performance, delivery volume by location, and monthly profit — into a single, easy-to-read view for non-technical stakeholders.",
                'role' => 'Data Analyst',
                'duration' => 'Jun 2025 – Jul 2025',
                'project_type' => 'Course Project — Data Visualization',
                'tools_used' => 'Python, Pandas, Google Colab, Plotly, Folium, Tableau',
                'image' => '/images/project-financial-dashboard.jpg',
                'link' => '#',
                'is_featured' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'E-Commerce Product Dashboard',
                'slug' => 'ecommerce-product-dashboard',
                'description' => 'Analyzed a product-level e-commerce dataset (pricing, ratings, review counts, and categories) using Python for data preprocessing. Designed an interactive Tableau dashboard to visually communicate pricing trends and consumer behavior insights.',
                'full_description' => "Unlike the previous project, this one involved working with a relatively clean e-commerce product dataset containing product IDs, categories, prices, ratings, review counts, and stock information across multiple cities.\n\nUsing Python in Google Colab, the dataset was preprocessed to handle missing values, remove duplicate entries, and normalize inconsistent category labels. The main objective was to uncover relevant business insights: which product categories had the highest stock counts, how average ratings varied by city, and how pricing correlated with customer ratings and review volume.\n\nThe cleaned data was then visualized through an interactive Tableau dashboard featuring a treemap of stock distribution by category, a bar chart comparing average ratings across cities, a price-bin histogram, and a scatter plot exploring the relationship between price and rating. The dashboard also includes filters for product category and city, allowing viewers to explore the data interactively without needing direct access to the raw dataset.",
                'role' => 'Data Analyst',
                'duration' => 'Jul 2–9, 2025',
                'project_type' => 'Individual Project — Data Visualization Practicum',
                'tools_used' => 'Python, Pandas, Google Colab, Tableau',
                'image' => '/images/project-ecommerce-dashboard.jpg',
                'link' => '#',
                'is_featured' => false,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Counseling Website for TB Patients',
                'slug' => 'counseling-website-tb-patients',
                'description' => 'Designed user interface components using Figma with a focus on usability and accessibility, and implemented front-end features with Laravel and Tailwind CSS for symptom tracking and daily medication input.',
                'full_description' => "This team project aimed to build a web-based counseling platform to support tuberculosis patients in tracking their symptoms and daily medication adherence.\n\nAs the UI/UX designer, wireframes and interface mockups were created in Figma with a strong emphasis on accessibility, simple navigation, and clear visual hierarchy — important considerations given the target users may include patients with limited technical experience.\n\nOn the development side, the front-end was implemented using Laravel and Tailwind CSS, focusing on the symptom tracking form and daily medication logging interface. Alongside the design and development work, the role of project secretary was held, responsible for documenting meeting notes, tracking action items, and coordinating communication within the team throughout the course of the Information Technology Project Management (MPTI) course.",
                'role' => 'UI/UX Designer & Front-End Developer',
                'duration' => 'Feb 2025 – Sep 2025',
                'project_type' => 'Course Project — Information Technology Project Management (MPTI)',
                'tools_used' => 'Figma, Laravel, Tailwind CSS',
                'image' => '/images/project-tb-home.jpg',
                'link' => '#',
                'is_featured' => false,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Internship Application Information System',
                'slug' => 'internship-application-information-system',
                'description' => 'Developed a web-based Internship Application Information System to support the digitization of internship registration and management processes.',
                'full_description' => "During the internship at Balai Besar Standardisasi dan Pelayanan Jasa Industri Kerajinan dan Batik Yogyakarta, the main assignment was to develop a web-based Internship Application Information System.\n\nThe goal of the system is to digitize what was previously a manual, paper-based internship registration process — allowing prospective interns to submit applications online, and allowing staff to review, approve, and manage internship records through a centralized dashboard.\n\nResponsibilities on this project covered the full development cycle: analyzing the existing manual workflow to identify requirements, designing the relational database structure to store applicant data and internship records, creating the UI/UX layout, and implementing the front-end and back-end functionality according to the institution's requirements.",
                'role' => 'Web Development Intern',
                'duration' => 'Oct 2025 – Jan 2026',
                'project_type' => 'Apprenticeship Project',
                'tools_used' => 'Laravel, Tailwind CSS, MySQL, Figma',
                'image' => '/images/project-intern-home.png',
                'link' => '#',
                'is_featured' => false,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}