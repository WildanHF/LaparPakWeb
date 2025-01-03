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

            return response()->json([
                'message' => 'Donation created successfully',
                'donation' => $donation,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create donation',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    // Mendapatkan semua donasi
    public function index()
    {
        $donations = Donation::with('campaign')->get();
        return response()->json($donations);
    }

    // Mendapatkan donasi berdasarkan ID
    public function show($id)
    {
        $donation = Donation::with('campaign')->find($id);

        if (!$donation) {
            return response()->json(['error' => 'Donation not found'], 404);
        }

        return response()->json($donation);
    }

    // Mengupdate donasi berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'campaign_id' => 'sometimes|exists:campaigns,id', // Jika campaign_id diupdate, harus valid
            'amount' => 'sometimes|numeric|min:0',
        ]);

        $donation = Donation::find($id);

        if (!$donation) {
            return response()->json(['error' => 'Donation not found'], 404);
        }

        try {
            $donation->update($request->only('campaign_id', 'amount'));

            return response()->json([
                'message' => 'Donation updated successfully',
                'donation' => $donation,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update donation',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    // Menghapus donasi berdasarkan ID
    public function destroy($id)
    {
        $donation = Donation::find($id);

        if (!$donation) {
            return response()->json(['error' => 'Donation not found'], 404);
        }

        try {
            $donation->delete();

            return response()->json(['message' => 'Donation deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete donation',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
