<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = PortfolioProject::with('images')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolio_projects,slug',
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'featured_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['featured_image', 'images']);
        $data['slug'] = Str::slug($request->slug);

        $project = PortfolioProject::create($data);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('projects/featured', 'public');
            $project->featured_image = $path;
            $project->save();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                ProjectImage::create([
                    'portfolio_project_id' => $project->id,
                    'image_path' => $path,
                    'caption' => '',
                    'sort_order' => 0,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(PortfolioProject $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, PortfolioProject $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolio_projects,slug,' . $project->id,
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'featured_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['featured_image', 'images']);
        $data['slug'] = Str::slug($request->slug);

        $project->update($data);

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image && Storage::disk('public')->exists($project->featured_image)) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $path = $request->file('featured_image')->store('projects/featured', 'public');
            $project->featured_image = $path;
            $project->save();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                ProjectImage::create([
                    'portfolio_project_id' => $project->id,
                    'image_path' => $path,
                    'caption' => '',
                    'sort_order' => 0,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(PortfolioProject $project)
    {
        // Delete featured image
        if ($project->featured_image && Storage::disk('public')->exists($project->featured_image)) {
            Storage::disk('public')->delete($project->featured_image);
        }

        // Delete gallery images
        foreach ($project->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
