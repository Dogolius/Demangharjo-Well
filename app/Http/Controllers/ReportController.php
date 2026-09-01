<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Post;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room', [
            'title' => "Bilik Aduan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'body' => 'required'
        ]);

        if($request->file('image')){
            // possible code for production
            // $imagePath = $request->file('image')->store('public/report-images');
            // $validatedData['image'] = preg_replace('[public/]', '', $imagePath);

            // alternatively, you can use Storage facade to get the URL
            $imagePath = $request->file('image')->store('report-images', 'public');
            $validatedData['image'] = preg_replace('[public/]', '', $imagePath);
        }

        $validatedData['reporter_name'] = auth()->user()->name;
        Report::create($validatedData);

        return redirect('/room')->with('success', 'Aduan berhasil disampaikan');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createdata()
    {
        $totalReports = Report::count();
        $respondedReports = Report::whereNotNull('response')->where('response', '!=', '')->count();
        $pendingReports = $totalReports - $respondedReports;
        $responsePercentage = $totalReports > 0 ? round(($respondedReports / $totalReports) * 100, 1) : 0;

        $startMonth = \Carbon\Carbon::now()->startOfMonth()->subMonths(11);
        $monthBuckets = [];

        for ($i = 0; $i < 12; $i++) {
            $month = $startMonth->copy()->addMonths($i);
            $monthBuckets[$month->format('Y-m')] = 0;
        }

        $monthlyPosts = Post::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month_key')
            ->selectRaw('COUNT(*) as total')
            ->where('created_at', '>=', $startMonth->copy()->startOfMonth())
            ->groupBy('month_key')
            ->orderBy('month_key')
            ->get();

        foreach ($monthlyPosts as $post) {
            if (isset($monthBuckets[$post->month_key])) {
                $monthBuckets[$post->month_key] = (int) $post->total;
            }
        }

        $postMonthLabels = [];
        $postMonthData = [];

        foreach ($monthBuckets as $monthKey => $count) {
            $postMonthLabels[] = \Carbon\Carbon::createFromFormat('Y-m', $monthKey)->translatedFormat('M Y');
            $postMonthData[] = (int) $count;
        }

        return view('data', [
            'title' => 'Data Desa',
            'totalReports' => $totalReports,
            'respondedReports' => $respondedReports,
            'pendingReports' => $pendingReports,
            'responsePercentage' => $responsePercentage,
            'postMonthLabels' => $postMonthLabels,
            'postMonthData' => $postMonthData,
        ]);
    }
}
