<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodDonation;

class FoodDonationController extends Controller
{
    // Menambahkan food donation baru
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required|string|max:255',
            'food_description' => 'required|string',
            'donor_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $foodDonation = new FoodDonation([
            'food_name' => $request->get('food_name'),
            'food_description' => $request->get('food_description'),
            'donor_name' => $request->get('donor_name'),
            'phone_number' => $request->get('phone_number'),
            'city' => $request->get('city'),
            'subdistrict' => $request->get('subdistrict'),
            'address' => $request->get('address'),
        ]);

        $foodDonation->save();

        return response()->json(['message' => 'Food donation created successfully'], 201);
    }

    // Mendapatkan semua food donation
    public function index()
    {
        $foodDonations = FoodDonation::all();
        return response()->json($foodDonations);
    }

    // Mendapatkan food donation berdasarkan ID
    public function show($id)
    {
        $foodDonation = FoodDonation::find($id);
        if (!$foodDonation) {
            return response()->json(['message' => 'Food donation not found'], 404);
        }
        return response()->json($foodDonation);
    }

    // Menghapus food donation berdasarkan ID
    public function destroy($id)
    {
        $foodDonation = FoodDonation::find($id);
        if (!$foodDonation) {
            return response()->json(['message' => 'Food donation not found'], 404);
        }
        $foodDonation->delete();
        return response()->json(['message' => 'Food donation deleted successfully']);
    }
}