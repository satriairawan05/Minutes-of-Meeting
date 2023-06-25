<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\ApprovalList;
use App\Models\Departemen;
use App\Models\GroupPage;
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
        $page_name = "Approval List";
        $pages = GroupPage::leftJoin('pages','pages.page_id','=','group_pages.page_id')
            ->where('pages.page_name','=',$page_name)
            ->where('group_pages.group_id','=',auth()->user()->group_id)
            ->get();

        $index = 'applist.index';
        $index2 = 'applist.index2';
        $index3 = 'applist.index3';
        $index4 = 'applist.index4';
        $module = $request->module;
        $departemen = $request->departemen;
        $views = $index;
        $users = User::all();
        $data = [
            'pages' => $pages,
            'module' => $module,
            'users' => $users,
            'applist' => ApprovalList::where('app_module','=','issues')->get(),
            'applist_dwm' => ApprovalList::where('app_module','=','dwm')->get(),
            'departemen' => Departemen::all(),
            'depart' => $request->departemen
        ];
        if($module){
            if($module=='issues'){
                $views = $index2;
            }else{
                if($departemen){
                    $views = $index4;
                }else{
                    $views = $index3;
                }
            }
            
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
                'app_departemen' => ['required']
            ]);

            ApprovalList::create($validate);

            $url = '/approvallist?module='.$request->app_module;

            if($request->app_departemen){
                $url = '/approvallist?module='.$request->app_module.'&departemen='.$request->app_departemen;
            }

            return redirect($url)->with('success','Approver updated!');
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
                'app_departemen' => ['required']
            ]);

            ApprovalList::where('app_list_id', '=', $app_list_id)->update($validate);

            $url = '/approvallist?module='.$request->app_module;

            if($request->app_departemen){
                $url = '/approvallist?module='.$request->app_module.'&departemen='.$request->app_departemen;
            }

            return redirect($url)->with('success','Approver updated!');
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
