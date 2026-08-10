@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">Redirects</h4>
        <form method="POST" action="{{ route('admin.seo.redirects.store') }}" class="mb-4">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="source_url" class="form-control" placeholder="Source URL" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="destination_url" class="form-control" placeholder="Destination URL" required>
                </div>
                <div class="col-md-2">
                    <select name="redirect_type" class="form-select">
                        <option value="301">301</option>
                        <option value="302">302</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Save</button>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead><tr><th>Source</th><th>Destination</th><th>Type</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($redirects as $redirect)
                <tr>
                    <td>{{ $redirect->source_url }}</td>
                    <td>{{ $redirect->destination_url }}</td>
                    <td>{{ $redirect->redirect_type }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.seo.redirects.destroy', $redirect) }}" onsubmit="return confirm('Delete redirect?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
