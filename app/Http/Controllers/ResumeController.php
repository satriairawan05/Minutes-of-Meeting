<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use App\Models\Departemen;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function resume(Meet $meet, Issue $issue)
    {
        $meets = Meet::select('meet_xid')->latest('meet_xid')->pluck('meet_xid')->first();
        $issues = Issue::select('project')->leftJoin('meets', 'meets.meet_xid', '=', 'issues.project')->update(['project' => $meets]);

        return view('resume.index', [
            'meet' => $meet,
            'issues' => $issues,
            'issue' => Issue::get()
        ]);
    }

    public function create()
    {
        $formattedDate = date('mY');
        $prefix = "ISSUE-";
        $lastCount = Issue::select('issue_id')->latest('issue_id')->pluck('issue_id')->first();
        $count = $lastCount + 1;
        $id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;
        return view('resume.create', [
            'issue' => $id,
            'users' => User::get(),
            'meet' => Meet::latest()->first(),
            'depts' => Departemen::get()
        ]);
    }

    public function store(Request $request, Meet $meet, Issue $issue)
    {

    }
}
