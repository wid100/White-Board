<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Year;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $latestIssue = Issue::where('status', 1)->latest()->first();
        $years = Year::all();
        $issues = Issue::where('status', 1)->get();
        $lastThreeYears = Year::orderBy('year', 'desc')->take(3)->get();
        $lastThreeYearsIssues = Issue::where('status', 1)
            ->whereIn('year_id', $lastThreeYears->pluck('id'))
            ->get()
            ->groupBy('year_id');

        // Initialize $yearIssues with the latest year's issues
        $yearModel = Year::orderBy('year', 'desc')->first();
        $yearIssues = Issue::where('year_id', $yearModel->id)
            ->where('status', 1)
            ->with('month')
            ->get();

        return view('issue', compact('latestIssue', 'years', 'issues', 'lastThreeYearsIssues', 'lastThreeYears', 'yearIssues', 'yearModel'));
    }


    public function getIssuesByYear($year)
    {
        $yearModel = Year::where('year', $year)->first();

        if (!$yearModel) {
            return response()->json(['status' => 'error', 'message' => 'No issues found for this year.']);
        }

        $yearIssues = Issue::where('year_id', $yearModel->id)
            ->where('status', 1)
            ->with('month')
            ->get();

        return response()->json(['status' => 'success', 'yearIssues' => $yearIssues]);
    }
}
