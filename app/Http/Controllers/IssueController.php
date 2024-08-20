<?php

namespace App\Http\Controllers;


use App\Models\Issue;
use App\Models\Year;

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

        return view('issue', compact('latestIssue', 'years', 'issues', 'lastThreeYearsIssues', 'lastThreeYears'));
    }
}
