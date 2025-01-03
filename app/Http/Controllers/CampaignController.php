<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    // Menambahkan campaign baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|numeric|min:0',
        ]);

        try {
            $campaign = Campaign::create($request->all());

            return response()->json([
                'message' => 'Campaign created successfully',
                'campaign' => $campaign,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create campaign',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    


    public function index()
    {
        $campaigns = Campaign::all(); // Fetch all campaigns from the database
        return view('homepagelogin', compact('campaigns')); // Pass the data to the view
    }

    // Menampilkan campaign berdasarkan ID
    public function show($id)
    {
        $campaign = Campaign::findOrFail($id); // Fetch the campaign by ID
        return view('opsiDonasi', compact('campaign')); // Pass the campaign data to the view
    }
}

   