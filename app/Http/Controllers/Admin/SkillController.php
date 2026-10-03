<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = SkillItem::orderBy('sort_order')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:beginner,intermediate,advanced,expert',
            'category' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        SkillItem::create($request->all());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully.');
    }

    public function edit(SkillItem $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, SkillItem $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:beginner,intermediate,advanced,expert',
            'category' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $skill->update($request->all());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(SkillItem $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
