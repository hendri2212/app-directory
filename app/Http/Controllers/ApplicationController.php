<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'apps' => Application::all()
        ]);
    }

    public function show($id)
    {
        $app = Application::with('features')->find($id);
        if (!$app) abort(404);

        return Inertia::render('AppDetail', [
            'app' => $app
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'apps' => Application::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/CreateApp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // 2MB Max
            'description' => 'required|string',
            'business_impact' => 'required|string',
            'local_integration' => 'required|string',
            'tech_stack' => 'required|string', // Comma separated
            'features' => 'array',
            'features.*.title' => 'required|string',
            'features.*.description' => 'required|string',
            'features.*.screenshot' => 'required|image|max:2048',
        ]);

        // Handle Main Image Upload
        $imagePath = $request->file('image')->store('apps', 'public');
        $imageUrl = Storage::url($imagePath);

        // Process Tech Stack
        $techStackArray = array_map('trim', explode(',', $request->tech_stack));

        $app = Application::create([
            'name' => $request->name,
            'short_desc' => $request->short_desc,
            'image' => $imageUrl,
            'description' => $request->description,
            'business_impact' => $request->business_impact,
            'local_integration' => $request->local_integration,
            'tech_stack' => $techStackArray,
        ]);

        // Process Features
        if ($request->has('features')) {
            foreach ($request->features as $featureData) {
                $screenshotPath = $featureData['screenshot']->store('features', 'public');
                $screenshotUrl = Storage::url($screenshotPath);

                $app->features()->create([
                    'title' => $featureData['title'],
                    'description' => $featureData['description'],
                    'screenshot' => $screenshotUrl,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Application created successfully.');
    }

    public function edit($id)
    {
        $app = Application::with('features')->findOrFail($id);
        return Inertia::render('Admin/EditApp', [
            'app' => $app
        ]);
    }

    public function update(Request $request, $id)
    {
        $app = Application::with('features')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:255',
            'image' => 'nullable', // Can be string (url) or file
            'description' => 'required|string',
            'business_impact' => 'required|string',
            'local_integration' => 'required|string',
            'tech_stack' => 'required|string',
            'features' => 'array',
            'features.*.title' => 'required|string',
            'features.*.description' => 'required|string',
            'features.*.screenshot' => 'nullable', // Can be string or file
        ]);

        // Handle Main Image
        if ($request->hasFile('image')) {
            // Delete old image
            if ($app->image) {
                $oldPath = str_replace('/storage/', '', $app->image);
                Storage::disk('public')->delete($oldPath);
            }
            $imagePath = $request->file('image')->store('apps', 'public');
            $app->image = Storage::url($imagePath);
        }

        $app->name = $request->name;
        $app->short_desc = $request->short_desc;
        $app->description = $request->description;
        $app->business_impact = $request->business_impact;
        $app->local_integration = $request->local_integration;
        $app->tech_stack = array_map('trim', explode(',', $request->tech_stack));
        $app->save();

        // Handle Features
        // 1. Get old screenshots to potentially clean up
        $oldScreenshots = $app->features->pluck('screenshot')->toArray();
        $newScreenshots = [];

        // 2. Delete existing feature records (we'll recreate them)
        $app->features()->delete();

        if ($request->has('features')) {
            foreach ($request->features as $featureData) {
                $screenshotUrl = null;

                if (isset($featureData['screenshot']) && $featureData['screenshot'] instanceof \Illuminate\Http\UploadedFile) {
                    // New file upload
                    $path = $featureData['screenshot']->store('features', 'public');
                    $screenshotUrl = Storage::url($path);
                } elseif (isset($featureData['screenshot']) && is_string($featureData['screenshot'])) {
                    // Existing URL
                    $screenshotUrl = $featureData['screenshot'];
                }

                if ($screenshotUrl) {
                    $newScreenshots[] = $screenshotUrl;
                    $app->features()->create([
                        'title' => $featureData['title'],
                        'description' => $featureData['description'],
                        'screenshot' => $screenshotUrl,
                    ]);
                }
            }
        }

        // 3. Clean up unused screenshots
        $screenshotsToDelete = array_diff($oldScreenshots, $newScreenshots);
        foreach ($screenshotsToDelete as $url) {
            $path = str_replace('/storage/', '', $url);
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('dashboard')->with('success', 'Application updated successfully.');
    }

    public function destroy($id)
    {
        $app = Application::with('features')->findOrFail($id);

        // Delete Main Image
        if ($app->image) {
            $imagePath = str_replace('/storage/', '', $app->image);
            Storage::disk('public')->delete($imagePath);
        }

        // Delete Feature Screenshots
        foreach ($app->features as $feature) {
            if ($feature->screenshot) {
                $screenshotPath = str_replace('/storage/', '', $feature->screenshot);
                Storage::disk('public')->delete($screenshotPath);
            }
        }

        $app->delete();

        return redirect()->route('dashboard')->with('success', 'Application deleted successfully.');
    }
}
