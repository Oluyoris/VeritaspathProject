<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Applicant;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalWorks = Work::count();
        $totalApplicants = Applicant::count();
        $settings = Setting::first();
        return view('admin.dashboard', compact('totalWorks', 'totalApplicants', 'settings'));
    }

    public function allApplicants()
    {
        $applicants = Applicant::whereNotNull('work_id')
            ->whereExists(function ($query) {
                $query->select('id')
                      ->from('works')
                      ->whereColumn('works.id', 'applicants.work_id');
            })
            ->with('work')
            ->paginate(12);
        return view('admin.applicants.all', compact('applicants'));
    }

    public function showSettingsForm()
    {
        $settings = Setting::first();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1000',
            'seo_keywords' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:512',
        ]);

        $settings = Setting::firstOrCreate(['id' => 1]);

        $data = [
            'site_name' => $request->site_name,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ];

        if ($request->hasFile('logo')) {
            if ($settings->logo_path) {
                Storage::disk('public')->delete($settings->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon_path) {
                Storage::disk('public')->delete($settings->favicon_path);
            }
            $data['favicon_path'] = $request->file('favicon')->store('favicons', 'public');
        }

        $settings->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Settings updated successfully.');
    }
}
