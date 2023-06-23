<?php

namespace App\Http\Controllers;

use App\Models\ApprovalList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ApprovalListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $index = 'applist.index';
        $index2 = 'applist.index2';
        $index3 = 'applist.index3';
        $module = $request->module;
        $views = $index;
        $users = User::all();
        $data = [
            'module' => $module,
            'users' => $users,
            'applist' => ApprovalList::all()
        ];
        if($module){
            $views = $module == 'issues' ? $index2 : $index3;
        }
        return view($views)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'app_ordinal' => ['required'],
                'app_user' => ['required'],
                'app_module' => ['required'],
                'app_closer' => ['required']
            ]);

            ApprovalList::create($validate);

            return redirect('/approvallist?module='.$request->app_module)->with('success','Approver updated!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApprovalList $approvalList, String $app_list_id)
    {
        try {
            $validate = $request->validate([
                'app_ordinal' => ['required'],
                'app_user' => ['required'],
                'app_module' => ['required'],
                'app_closer' => ['required']
            ]);

            ApprovalList::where('app_list_id', '=', $app_list_id)->update($validate);

            return redirect('/approvallist?module='.$request->app_module)->with('success','Approver updated!');
        } catch(QueryException $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApprovalList $approvalList, String $app_list_id)
    {
        $app = ApprovalList::where('app_list_id','=',$app_list_id)->first();
        $module = $app->app_module;
        ApprovalList::destroy($app_list_id);
        return redirect('/approvallist?module='.$module)->with('success','Data deleted!');
    }
}
