<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class WorkController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth')->except(['indexPublic', 'show']);
    }

    public function index()
    {
        $works = Work::latest()->paginate(10);
        $settings = Setting::first();
        return view('admin.works.index', compact('works', 'settings'));
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.works.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'salary_range' => 'required|string|max:255',
            'level' => 'required|in:internship,intermediate,expert,professional',
            'type' => 'required|in:remote,full_time,part_time,contract',
            'role' => 'required|string|max:255',
        ]);

        Work::create($request->all());

        return redirect()->route('admin.works.index')->with('success', 'Work created successfully.');
    }

    public function edit(Work $work)
    {
        $settings = Setting::first();
        return view('admin.works.edit', compact('work', 'settings'));
    }

    public function update(Request $request, Work $work)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'salary_range' => 'required|string|max:255',
            'level' => 'required|in:internship,intermediate,expert,professional',
            'type' => 'required|in:remote,full_time,part_time,contract',
            'role' => 'required|string|max:255',
        ]);

        $work->update($request->all());

        return redirect()->route('admin.works.index')->with('success', 'Work updated successfully.');
    }

    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.works.index')->with('success', 'Work deleted successfully.');
    }

    public function indexPublic()
    {
        $works = Work::latest()->paginate(10);
        $settings = Setting::first();
        return view('works.index', compact('works', 'settings'));
    }

    public function show(Work $work)
    {
        $settings = Setting::first();
        return view('works.show', compact('work', 'settings'));
    }
}