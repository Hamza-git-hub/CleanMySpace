<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassicService;
use App\Models\PlatinumService;
use App\Models\PremiumService;

class ReportController extends Controller
{
    public function index()
    {
        $classicServices = ClassicService::all();
        $platinumServices = PlatinumService::all();
        $premiumServices = PremiumService::all();

        $approvedClassicServices = $classicServices->where('status', 'approved')->count();
        $rejectedClassicServices = $classicServices->where('status', 'rejected')->count();

        $approvedPlatinumServices = $platinumServices->where('status', 'approved')->count();
        $rejectedPlatinumServices = $platinumServices->where('status', 'rejected')->count();

        $approvedPremiumServices = $premiumServices->where('status', 'approved')->count();
        $rejectedPremiumServices = $premiumServices->where('status', 'rejected')->count();

        $approvedTotal = $approvedClassicServices + $approvedPlatinumServices + $approvedPremiumServices;
        $rejectedTotal = $rejectedClassicServices + $rejectedPlatinumServices + $rejectedPremiumServices;

        return view('admin.report', compact(
            'approvedClassicServices',
            'rejectedClassicServices',
            'approvedPlatinumServices',
            'rejectedPlatinumServices',
            'approvedPremiumServices',
            'rejectedPremiumServices',
            'approvedTotal',
            'rejectedTotal'
        ));
    }
}
