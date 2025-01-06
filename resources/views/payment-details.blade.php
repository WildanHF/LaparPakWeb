<!-- filepath: /v:/tubes/tubes/resources/views/payment-details.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Payment Details</h1>
    <p>Campaign ID: {{ $payment->campaign_id }}</p>
    <p>Status: {{ $payment->status }}</p>
    <p>Amount: {{ $payment->amount }}</p>
@endsection