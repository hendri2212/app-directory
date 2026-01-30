<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

$apps = [
    [
        'id' => 1,
        'name' => 'Siakrab',
        'short_desc' => 'Sistem Integrasi & Administrasi Kerupuk Rumah Admin Bagus.',
        'image' => 'https://placehold.co/600x400?text=Siakrab',
        'description' => 'A comprehensive ERP system for Cracker Administration.',
        'business_impact' => 'Reduces admin time by 40%.',
        'local_integration' => 'Integrated with Kotabaru SME database.',
        'tech_stack' => ['Laravel', 'Vue'],
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
        'id' => 2,
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
        'id' => 3,
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
        'id' => 4,
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

Route::get('/', function () use ($apps) {
    return Inertia::render('Home', [
        'apps' => $apps
    ]);
})->name('home');

Route::get('/app/{id}', function ($id) use ($apps) {
    $app = collect($apps)->firstWhere('id', (int)$id);
    if (!$app) abort(404);
    
    return Inertia::render('AppDetail', [
        'app' => $app
    ]);
})->name('app.detail');

