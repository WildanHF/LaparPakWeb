<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Campaign;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', ['payments' => $payments]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'campaign' => 'required',
            'status' => 'required',
            'amount' => 'required|numeric'
        ]);

        // Create payment record
        $payment = new Payment();
        $payment->campaign_id = $request->campaign;
        $payment->status = $request->status;
        $payment->amount = $request->amount;
        $payment->save();

        // Check payment status
        if($request->status === 'PAID') {
            return redirect()->route('success')->with('message', 'Payment successful!');
        }

        return back()->with('error', 'Payment failed. Please try again.');
    }

    public function success()
    {
        return view('success');
    }

    public function submitNominal(Request $request)
    {
        $validatedData = $request->validate([
            'nominal' => 'required|numeric',
            'campaign_id' => 'required|exists:campaigns,id',
        ]);

        $campaign = Campaign::findOrFail($validatedData['campaign_id']);

        // Create payment record
        $payment = new Payment();
        $payment->campaign_id = $campaign->id;
        $payment->status = 'NOT PAID';
        $payment->amount = $validatedData['nominal'];
        $payment->save();

        // Update current amount in campaign
        $campaign->current_amount += $validatedData['nominal'];
        $campaign->save();

        return view('payment', [
            'nominal' => $validatedData['nominal'],
            'campaign' => $campaign,
            'payment' => $payment
        ]);
    }

    public function getById($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment-details', ['payment' => $payment]);
    }

    public function updateStatus(Request $request)
{
    $payment = Payment::find($request->id);

    if ($payment) {
        $payment->status = $request->status;
        $payment->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}

}