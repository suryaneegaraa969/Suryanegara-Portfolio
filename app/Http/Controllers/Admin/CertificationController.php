<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::latest()->paginate(10);
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:certifications,slug',
            'issuer' => 'required|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'issued_date' => 'nullable|date',
            'description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'skills_covered' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'certificate_file' => 'nullable|file|max:10240', // 10MB
        ]);

        $data = $request->except(['certificate_file']);
        $data['slug'] = Str::slug($request->slug);

        $certification = Certification::create($data);

        if ($request->hasFile('certificate_file')) {
            $path = $request->file('certificate_file')->store('certificates', 'public');
            $certification->certificate_file = $path;
            $certification->save();
        }

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification created successfully.');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:certifications,slug,' . $certification->id,
            'issuer' => 'required|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'issued_date' => 'nullable|date',
            'description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'skills_covered' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'certificate_file' => 'nullable|file|max:10240',
        ]);

        $data = $request->except(['certificate_file']);
        $data['slug'] = Str::slug($request->slug);

        $certification->update($data);

        if ($request->hasFile('certificate_file')) {
            if ($certification->certificate_file && Storage::disk('public')->exists($certification->certificate_file)) {
                Storage::disk('public')->delete($certification->certificate_file);
            }
            $path = $request->file('certificate_file')->store('certificates', 'public');
            $certification->certificate_file = $path;
            $certification->save();
        }

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification updated successfully.');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->certificate_file && Storage::disk('public')->exists($certification->certificate_file)) {
            Storage::disk('public')->delete($certification->certificate_file);
        }

        $certification->delete();

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification deleted successfully.');
    }
}
