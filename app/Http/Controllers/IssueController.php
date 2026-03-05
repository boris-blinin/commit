<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Issue;
use App\Models\Item;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('issues.index', [
            'issues' => Issue::with(['employee', 'item'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('issues.create', [
            'employees' => Employee::all(),
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'item_id' => 'required',
            'issue_date' => 'required|date'
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        return view('issues.edit', [
            'issue' => $issue,
            'employees' => Employee::all(),
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $issue->update($request->all());

        return redirect()->route('issues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();

        return redirect()->route('issues.index');
    }
}
