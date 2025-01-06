<!-- filepath: /v:/tubes/tubes/resources/views/admin/campaigns/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Create Campaign</h1>
    <form action="{{ route('admin.campaigns.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="goal_amount">Goal Amount</label>
            <input type="number" name="goal_amount" id="goal_amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection