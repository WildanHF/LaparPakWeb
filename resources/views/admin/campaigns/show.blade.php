<!-- filepath: /v:/tubes/tubes/resources/views/admin/campaigns/show.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>{{ $campaign->name }}</h1>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $campaign->description }}</p>
        <p class="card-text"><strong>Goal Amount:</strong> {{ $campaign->goal_amount }}</p>
        <p class="card-text"><strong>Start Date:</strong> {{ $campaign->start_date }}</p>
        <p class="card-text"><strong>End Date:</strong> {{ $campaign->end_date }}</p>
        <p class="card-text"><strong>Status:</strong> {{ $campaign->status }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.campaigns.index') }}" class="btn btn-secondary">Back to Campaigns</a>
    </div>
</div>
@endsection