<?php
// database/seeders/CertificationSeeder.php
namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        Certification::insert([
            [
                'title' => 'Associate Data Scientist - Professional Competency Certificate (BNSP)',
                'slug' => 'associate-data-scientist-bnsp',
                'issuer' => 'Lembaga Sertifikasi Profesi (LSP) Informatika, Badan Nasional Sertifikasi Profesi (BNSP)',
                'certificate_number' => '14309979',
                'issued_date' => '2025',
                'duration' => 'Valid for 3 years',
                'description' => 'National competency certification for the Associate Data Scientist profession, assessing mastery of data science fundamentals including data preprocessing, statistical analysis, machine learning principles, and applied data interpretation.',
                'full_description' => "This certification is issued by the Indonesian Professional Certification Authority (BNSP) through Lembaga Sertifikasi Profesi (LSP) Informatika, Ahmad Dahlan Professional Certification Institution.\n\nThe certification verifies competency in the Associate Data Scientist qualification, assessed through a standardized national competency assessment covering nine core units: collecting data, analyzing data, validating data, defining a data object, clearing data, constructing data, specifying data labels, building the model, and evaluating modeling results.\n\nThis credential confirms national-level professional readiness in applying structured, data-driven approaches to real-world business and industrial problems, following the official competency scheme established by Indonesia's National Professional Certification Authority.",
                'skills_covered' => 'Data Collection, Data Validation, Data Preprocessing, Statistical Analysis, Model Building, Model Evaluation',
                'certificate_file' => '/storage/certificates/sertifikat-profesi-bnsp.pdf',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Associate Data Scientist - Digital Talent Scholarship VSGA 2025',
                'slug' => 'associate-data-scientist-vsga-2025',
                'issuer' => 'BPSDMP Kominfo Yogyakarta',
                'certificate_number' => '193107791110-12/VSGA/BLSDM.Komdigi/2025',
                'issued_date' => 'August 2025',
                'duration' => '24 hours (Aug 5–6, 2025)',
                'description' => 'Completed a 24-hour intensive training program covering data science fundamentals, data collection & cleaning, and model building & evaluation using Python.',
                'full_description' => "This training was delivered under the Vocational School Graduate Academy (VSGA) program, part of the Digital Talent Scholarship 2025 initiative organized by Komdigi (Ministry of Communication and Digital Affairs) in partnership with BPSDMP Kominfo Yogyakarta and Ahmad Dahlan University.\n\nOver 24 hours of intensive training, the curriculum covered the full data science workflow: understanding core data science concepts, using common data science tools, collecting and reviewing data, validating and defining data objects, cleaning and constructing datasets, labeling data, and finally building and evaluating machine learning models using Python.\n\nThe program emphasized real-world applications of data-driven decision making within a vocational learning setting, bridging academic knowledge with practical, industry-relevant skills.",
                'skills_covered' => 'Data Science Fundamentals, Data Collection & Cleaning, Python, Model Building, Model Evaluation',
                'certificate_file' => '/storage/certificates/sertifikat-vsga-2025.pdf',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Internship Certificate - Data and Information Division',
                'slug' => 'internship-data-information-division',
                'issuer' => 'Balai Besar Standardisasi dan Pelayanan Jasa Industri Kerajinan dan Batik Yogyakarta',
                'certificate_number' => 'B/173/BBSPJIKB/KP/I/2026',
                'issued_date' => 'January 2026',
                'duration' => 'Oct 6, 2025 – Jan 7, 2026',
                'description' => 'Completed an apprenticeship in the Data and Information Division, carried out in cooperation with Ahmad Dahlan University.',
                'full_description' => "This certificate confirms the completion of a three-month apprenticeship program at Balai Besar Standardisasi dan Pelayanan Jasa Industri Kerajinan dan Batik (BBSPJIKB) Yogyakarta, a technical implementation unit under the Ministry of Industry of the Republic of Indonesia.\n\nThe internship was carried out in the Data and Information Division, in official cooperation with Ahmad Dahlan University as part of the Informatics study program's practical field experience requirement.\n\nDuring the apprenticeship, responsibilities included developing a web-based Internship Application Information System, covering requirements analysis, database design, UI/UX implementation, and front-end and back-end development — contributing directly to the digitization of the institution's internship registration process.",
                'skills_covered' => 'System Analysis, Database Design, Laravel, UI/UX Implementation, Web Development',
                'certificate_file' => '/storage/certificates/sertifikat-magang.pdf',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Introduction to Digital Mindset 1: Transforming Your Future with a Digital Mindset',
                'slug' => 'introduction-digital-mindset-1',
                'issuer' => 'Pusat Pengembangan Literasi Digital, Kementerian Komunikasi dan Digital (Komdigi)',
                'certificate_number' => '2299815850-12007/MS/BLSDM.Komdigi/2025',
                'issued_date' => 'August 2025',
                'duration' => '2 hours',
                'description' => 'Completed a micro-skill training under the Digital Talent Scholarship 2025 program, covering the fundamentals of digital mindset and strategies for building a digital-first mindset.',
                'full_description' => "This micro-skill training was delivered under the Digital Talent Scholarship 2025 program, organized by Pusat Pengembangan Literasi Digital (Digital Literacy Development Center) under Komdigi (Ministry of Communication and Digital Affairs) of the Republic of Indonesia.\n\nOver a 2-hour session, the training covered an introduction to digital mindset, what digital mindset means in today's context, why it matters for personal and professional growth, the key elements that form a digital mindset, and practical strategies for building one.\n\nAs a foundational micro-skill credential, this certificate reflects proactive engagement with continuous learning in digital literacy — a core competency increasingly relevant across all technology-driven professions, including data analytics and software development.",
                'skills_covered' => 'Digital Literacy, Digital Mindset, Adaptability, Continuous Learning',
                'certificate_file' => '/storage/certificates/sertifikat-mindset-digital.pdf',
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}