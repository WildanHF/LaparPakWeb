<!-- filepath: /v:/tubes/tubes/resources/views/admin/campaigns/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Edit Campaign</h1>
    <form action="{{ route('admin.campaigns.update', $campaign) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $campaign->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $campaign->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="goal_amount">Goal Amount</label>
            <input type="number" name="goal_amount" id="goal_amount" class="form-control" value="{{ $campaign->goal_amount }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsections