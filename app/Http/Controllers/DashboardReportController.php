<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class DashboardReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reports.index',[
            'reports' => Report::all()
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Report::destroy($report->id);
        return redirect('/dashboard/reports')->with('success', 'Report berhasil dihapus');
    }
}
