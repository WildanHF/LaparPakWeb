<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    // Menambahkan donasi baru
    public function store(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id', // campaign_id harus valid di tabel campaigns
            'amount' => 'required|numeric|min:0',
        ]);

        try {
            $donation = Donation::create([
                'campaign_id' => $request->input('campaign_id'),
                'amount' => $request->input('amount'),
            ]);

            return redirect()->route('payment.show', ['amount' => $donation->amount]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create donation',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}