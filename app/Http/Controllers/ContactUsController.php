<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\ContactUs;

// class ContactUsController extends Controller
// {
//     public function index()
//     {
//         return view('contact_us.index');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'first_name' => 'required|string|max:255',
//             'last_name' => 'required|string|max:255',
//             'email' => 'required|email|max:255',
//             'phone_number' => 'required|string|max:15',
//             'message' => 'required|string',
//         ]);

//         $contactUs = ContactUs::create($request->all());

//         return response()->json([
//             'message' => 'Message sent successfully',
//             'contact' => $contactUs,
//         ], 201);
//     }
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('ContactUs.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        ContactUs::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}