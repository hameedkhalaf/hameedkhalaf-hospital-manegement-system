<?php
namespace App\Repositories\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use App\Models\Doctor;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $sections = Section::all();
        return view('admin.departments.index',compact('sections'));
    }

    public function store($request)
    {
        Section::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        session()->flash('add');
        return redirect()->route('sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        session()->flash('edit');
        return redirect()->route('sections.index');
    }


    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('sections.index');
    }
    public function show($id)
    {
        $doctors =Section::findOrFail($id)->doctors;
        $section = Section::findOrFail($id);
        return view('admin.departments.show_doctors',compact('doctors','section'));
    }

}