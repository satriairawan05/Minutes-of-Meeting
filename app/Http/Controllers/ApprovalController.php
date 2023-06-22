<?php

namespace App\Http\Controllers;

use App\Models\ApprovalList;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('approval.index',[
            'approval_list' => ApprovalList::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('approval.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        } catch(QueryException $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ApprovalList $approvalList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApprovalList $approvalList)
    {
        return view('approval.edit',[
            'approval_list' => $approvalList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApprovalList $approvalList)
    {
        try {

        } catch(QueryException $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApprovalList $approvalList)
    {
        try {

        } catch(QueryException $e){
            return $e->getMessage();
        }
    }
}
