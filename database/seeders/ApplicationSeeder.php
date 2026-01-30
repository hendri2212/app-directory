<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apps = [
            [
                'name' => 'Siakrab',
                'short_desc' => 'Markeplace asli Kabupaten Kotabaru menawarkan berbagai produk dan layanan.',
                'image' => 'https://placehold.co/600x400?text=Siakrab',
                'description' => 'Siakrab adalah markeplace asli Kabupaten Kotabaru yang menawarkan berbagai produk dan layanan. Siakrab didukung oleh pemerintah Kabupaten Kotabaru.',
                'business_impact' => 'Mempermudah pelaku UMKM dalam menawarkan produk dan layanan mereka kepada masyarakat. Meningkatkan akses masyarakat terhadap berbagai produk dan layanan.',
                'local_integration' => 'Terintegrasi dengan database UMKM Kabupaten Kotabaru dan Bank BPD Kalsel untuk memfasilitasi transaksi.',
                'tech_stack' => ['Laravel', 'React', 'Tailwind CSS'],
                'features' => [
                    [
                        'title' => 'Real-time Inventory',
                        'description' => 'Track stock levels in real-time across multiple admin accounts.',
                        'screenshot' => 'https://placehold.co/600x400?text=Inventory+Dashboard',
                    ],
                    [
                        'title' => 'Automated Reporting',
                        'description' => 'Generate monthly sales and production reports with one click.',
                        'screenshot' => 'https://placehold.co/600x400?text=Reporting+Module',
                    ],
                    [
                        'title' => 'Multi-User Roles',
                        'description' => 'Granular access control for Admins, Managers, and Staff.',
                        'screenshot' => 'https://placehold.co/600x400?text=User+Management',
                    ],
                ],
            ],
            [
                'name' => 'Kotabaru Smart City',
                'short_desc' => 'One-stop portal for citizens.',
                'image' => 'https://placehold.co/600x400?text=Smart+City',
                'description' => 'Citizen portal for accessing public services.',
                'business_impact' => 'Improves citizen engagement by 60%.',
                'local_integration' => 'Direct connection to Civil Registry.',
                'tech_stack' => ['Golang', 'React'],
                'features' => [
                    [
                        'title' => 'Digital ID Card',
                        'description' => 'Access your KTP and other documents digitally.',
                        'screenshot' => 'https://placehold.co/600x400?text=Digital+ID',
                    ],
                    [
                        'title' => 'Public Service Complaint',
                        'description' => 'Report infrastructure issues directly to the city government.',
                        'screenshot' => 'https://placehold.co/600x400?text=Service+Complaint',
                    ],
                ],
            ],
            [
                'name' => 'Fish Market Tracker',
                'short_desc' => 'Real-time pricing for local markets.',
                'image' => 'https://placehold.co/600x400?text=Fish+Market',
                'description' => 'Track fish prices in real-time.',
                'business_impact' => 'Stabilizes market prices.',
                'local_integration' => 'Supports local fishery policies.',
                'tech_stack' => ['Node.js', 'Flutter'],
                'features' => [
                    [
                        'title' => 'Live Price Ticker',
                        'description' => 'See the latest fish prices from all major local markets.',
                        'screenshot' => 'https://placehold.co/600x400?text=Price+Ticker',
                    ],
                    [
                        'title' => 'Catch Logs',
                        'description' => 'Fishermen can log their daily tables for better tracking.',
                        'screenshot' => 'https://placehold.co/600x400?text=Catch+Logs',
                    ],
                ],
            ],
            [
                'name' => 'Tourism Kotabaru',
                'short_desc' => 'Discover hidden gems in Kotabaru.',
                'image' => 'https://placehold.co/600x400?text=Tourism',
                'description' => 'Promotes local tourism spots.',
                'business_impact' => 'Increases tourist footfall by 25%.',
                'local_integration' => 'Partnered with Tourism Board.',
                'tech_stack' => ['Laravel', 'Blade'],
                'features' => [
                    [
                        'title' => 'Interactive Map',
                        'description' => 'Explore tourist attractions on an interactive map.',
                        'screenshot' => 'https://placehold.co/600x400?text=Interactive+Map',
                    ],
                    [
                        'title' => 'Event Calendar',
                        'description' => 'Stay updated with upcoming cultural events and festivals.',
                        'screenshot' => 'https://placehold.co/600x400?text=Event+Calendar',
                    ],
                ],
            ],
        ];

        foreach ($apps as $appData) {
            $features = $appData['features'] ?? [];
            unset($appData['features']);

            $app = Application::create($appData);

            if (!empty($features)) {
                $app->features()->createMany($features);
            }
        }
    }
}
