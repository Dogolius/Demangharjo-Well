<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->username !== 'admin'){
            return view('dashboard.reports.index',[
            'reports' => Report::latest()->where('reporter_name', $user->name)->get()
        ]);
        }
        return view('dashboard.reports.index',[
            'reports' => Report::latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('dashboard.reports.show',[
            'report' => $report
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
        $rules = [
            'response' => 'required',
        ];
        $validatedData =  $request->validate($rules);

        Report::where('id', $report->id)->update($validatedData);

        return redirect('/dashboard/reports')->with('success', 'Report berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        if($report->image){
            $report_image = $report->image;
            unlink(storage_path('app/public/'.$report_image));
        }
        Report::destroy($report->id);
        return redirect('/dashboard/reports')->with('success', 'Report berhasil dihapus');
    }
}
