@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">404 Monitor</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Referrer</th>
                    <th>Hits</th>
                    <th>Last Seen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->requested_url }}</td>
                    <td>{{ $log->referrer }}</td>
                    <td>{{ $log->hit_count }}</td>
                    <td>{{ $log->last_seen }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $logs->links() }}
    </div>
</div>
@endsection
