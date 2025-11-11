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

class ApplicantController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'allApplicants']);
    }

    public function index(Work $work)
    {
        $applicants = $work->applicants()->paginate(10);
        $settings = Setting::first();
        return view('admin.applicants.index', compact('work', 'applicants', 'settings'));
    }

    public function allApplicants()
    {
        $applicants = Applicant::with('work')->paginate(10);
        $settings = Setting::first();
        return view('admin.applicants.all', compact('applicants', 'settings'));
    }

    public function create(Work $work)
    {
        $settings = Setting::first();
        return view('applicants.create', compact('work', 'settings'));
    }

    public function store(Request $request, Work $work)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf,jpeg|max:5120',
        ]);

        $data = $request->all();
        $data['work_id'] = $work->id;

        if ($request->hasFile('cv')) {
            $data['cv_path'] = $request->file('cv')->store('cvs', 'public');
        }

        Applicant::create($data);

        return redirect()->route('works.show', $work)->with('success', 'Application submitted successfully.');
    }
}