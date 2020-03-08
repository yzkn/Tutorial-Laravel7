@extends('layouts.app')

@php
$title = __('Items');
@endphp
@section('content')
<div class="container">
    <h1><a href="{{ url('item/') }}" class="text-dark">{{ $title }}</a></h1>
    @if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ url('item/') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-2">{{ __('Title') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="title" id="title" value=""></dd>
                    <dt class="col-md-2">{{ __('Content') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="content" id="content" value="">
                    </dd>
                </dl>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" type="submit">{{ __('Create')}}</button>
            </div>
        </div>
    </form>
</div>
@endsection