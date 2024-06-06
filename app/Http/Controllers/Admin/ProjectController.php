<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = project::all();
        // dd($project);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title'=>'required|max:200',
        //     'content'=>'required',
        // ]);
        $form_data = $this->validation($request->all());

        // $form_data = $request->all();
        $new_project = new project();
        $new_project->title = $form_data['title'];
        $new_project->content = $form_data['content'];
        $new_project->slug = Project::generateSlug($new_project->title);
        $new_project->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $form_data = $this->validation($request->all());
       
        // $form_data = $request->all();
        $project->title = $form_data['title'];
        $project->content = $form_data['content'];
        $project->slug = Project::generateSlug($project->title);
        $project->update();
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function validation($data){

       
        $validator = Validator::make($data, [
            'title'=>'required|max:200',
            'content'=>'required',
        ],[
            'title.required'=>'il titolo è obbligatorio',
            'title.max'=>'il titolo deve avere massimo 200 caratteri',
            'content.required'=>'il contenuto è obbligatorio',
        ])->validate();

         return $validator;

        
    }
}
