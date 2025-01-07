<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('ContactUs');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        Log::info('Validated Data:', $validatedData);

        $contactUs = ContactUs::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Contact form submitted successfully',
        ]);
    }
}