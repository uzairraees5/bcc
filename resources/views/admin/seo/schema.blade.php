@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-1">Schema Management</h4>
        <p class="text-muted">Manage global JSON-LD schemas. Enter valid JSON-LD objects. Leave unused types empty.</p>
        <form method="POST" action="{{ route('admin.seo.schema.store') }}">
            @csrf
            @foreach([
                'schema_organization'=>'Organization','schema_website'=>'Website','schema_local_business'=>'Local Business','schema_service'=>'Service','schema_product'=>'Product','schema_breadcrumb'=>'Breadcrumb','schema_custom'=>'Custom JSON-LD'
            ] as $field=>$label)
                <div class="mb-4">
                    <label class="form-label fw-semibold">{{ $label }}</label>
                    <textarea name="{{ $field }}" class="form-control font-monospace" rows="7" placeholder='{"@context":"https://schema.org","@type":"{{ $label }}"}'>{{ old($field, $settings->{$field}) }}</textarea>
                </div>
            @endforeach
            <button class="btn btn-primary">Save Schema Settings</button>
        </form>
    </div>
</div>
@endsection
