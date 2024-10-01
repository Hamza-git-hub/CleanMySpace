<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassicService;
use App\Models\PlatinumService;
use App\Models\PremiumService;

class PaymentController extends Controller
{
    public function approvePayment($id, $type)
    {
        $service = $this->findServiceByType($id, $type);

        if (!$service) {
            return redirect()->back()->withErrors(['error' => 'Service not found.']);
        }

        $service->payment_status = 'Approved';
        $service->save();

        return redirect()->back()->with('success', 'Payment Approved');
    }

    public function rejectPayment($id, $type)
    {
        $service = $this->findServiceByType($id, $type);

        if (!$service) {
            return redirect()->back()->withErrors(['error' => 'Service not found.']);
        }

        $service->payment_status = 'Rejected';
        $service->save();

        return redirect()->back()->with('success', 'Payment Rejected');
    }

    private function findServiceByType($id, $type)
    {
        switch ($type) {
            case 'premium':
                return PremiumService::find($id);
            case 'classic':
                return ClassicService::find($id);
            case 'platinum':
                return PlatinumService::find($id);
            default:
                return null;
        }
    }
    }
