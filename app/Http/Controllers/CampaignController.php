<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Payment;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        return view('admin.campaigns.show', compact('campaign'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'goal_amount' => 'required|numeric',
        ]);

        $validatedData['current_amount'] = 0; // Set default current amount to 0

        Campaign::create($validatedData);
        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign created successfully');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'goal_amount' => 'required|numeric',
        ]);

        // Only update current_amount if provided
        if ($request->has('current_amount')) {
            $validatedData['current_amount'] = $request->input('current_amount');
        } else {
            unset($validatedData['current_amount']);
        }

        $campaign->update($validatedData);
        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign updated successfully');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign deleted successfully');
    }

    public function index1()
    {
        $campaigns = Campaign::all(); // Fetch all campaigns from the database

        // Fetch total donations for each campaign
        $campaigns = $campaigns->map(function ($campaign) {
            $campaign->total_donations = Payment::where('campaign_id', $campaign->id)
                                                ->where('status', 'PAID')
                                                ->sum('amount');
            return $campaign;
        });

        return view('homepagelogin', compact('campaigns')); // Pass the data to the view
    }

    public function show1($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('opsiDonasi', compact('campaign'));
    }
}

