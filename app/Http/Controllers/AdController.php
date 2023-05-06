<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads=Ad::all();
        return view('admin.ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'code'=>'required',
            'description'=>'required',
            'photopath'=>'required'
        ]);

        if($request->file('photopath'))
        {
            $photo=$request->file('photopath');
            $filename=$photo->getClientOriginalName();
            $photopath=time().'_'.$filename;
            $photo->move(public_path('/images/ad/'),$photopath);
            $data['photopath']=$photopath;

        }
        Ad::create($data);
        return redirect(route('ad.index'))->with('success','Ad Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('admin.ad.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        $data=$request->validate([
            'code'=>'required',
            'description'=>'required',
            'photopath'=>'nullable'
        ]);

        $data['photopath']=$request->oldpath;

        if($request->file('photopath'))
        {
            $photo=$request->file('photopath');
            $filename=$photo->getClientOriginalName();
            $photopath=time().'_'.$filename;
            $photo->move(public_path('/images/ad/'),$photopath);
            FacadesFile::delete(public_path('/images/gallery/'.$ad->photopath));/**File:: or Facades look up */
            $data['photopath']=$photopath;

        }

        $ad->update($data);
        return redirect(route('ad.index'))->with('success', 'Ad Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $ad = AD::find($request->dataid);
        FacadesFile::delete(public_path('/images/ad/'.$ad->photopath));
        $ad->delete();
        return redirect(route('ad.index'))->with('success','Ad Deleted Successfully');
    }
}
