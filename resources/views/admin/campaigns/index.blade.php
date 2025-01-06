<!-- filepath: /v:/tubes/tubes/resources/views/admin/campaigns/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Campaigns</h1>
    <a href="{{ route('admin.campaigns.create') }}" class="btn btn-primary">Create Campaign</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Goal Amount</th>
                <th>Current Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->name }}</td>
                    <td>{{ $campaign->description }}</td>
                    <td>{{ $campaign->goal_amount }}</td>
                    <td>{{ $campaign->current_amount }}</td>
                    <td>
                        <a href="{{ route('admin.campaigns.edit', ['campaign' => $campaign->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.campaigns.destroy', ['campaign' => $campaign->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection