@extends('layouts.app')

@php
$title = __('SubItems');
@endphp
@section('content')
<div class="container">
    <h1><a href="{{ url('subitem/') }}" class="text-dark">{{ $title }}</a></h1>
    @if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ url('subitem/') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-2">{{ __('Title') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="subtitle" id="subtitle"
                            value=""></dd>
                    <dt class="col-md-2">{{ __('Content') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="subcontent" id="subcontent"
                            value="">
                    </dd>
                    <dt class="col-md-2">{{ __('Parent') }}</dt>
                    <dd class="col-md-10">
                        <select class="form-control" name="item_id" id="item_id">
                            <option value=""></option>
                            @foreach($items as $item)
                            <option value="{{ $item->id }}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </dd>
                    <dt class="col-md-2">{{ __('File') }}</dt>
                    <dd class="col-md-10">
                        <input type="file" class="form-control" name="filepath"  id="filepath" />
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

{{-- Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved. --}}