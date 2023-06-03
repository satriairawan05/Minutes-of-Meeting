<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Issue::where('status','=','Closed')->get();
        return dd($data);

        return view('doc.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'doc_document' => ['required','mimes:pdf']
        ]);

        if($request->file('document'))
        {
            $validate['doc_document'] = $request->file('doc_document')->store('documents');
        }

        Document::create($validate);

        return redirect('/document')->with('success','Added Document Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('doc.edit',[
            'doc' => $document
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $rules = [
            'doc_document' => ['required','mimes:pdf']
        ];

        $validate = $request->validate($rules);

        if($request->file('doc_document'))
        {
            if($request->oldDocument)
            {
                Storage::delete([$request->oldDocument]);
            }
            $validate['doc_document'] = $request->file('doc_document')->store('documents');
        }

        Document::where('id',$document->id)->update($validate);

        return redirect('/document')->with('success','Updated Document Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Document::destroy($document->id);

        if($document->document){
            Storage::delete([$document->document]);
        }

        return redirect('/document')->with('success','Deleted Document Successfully');
    }
}
