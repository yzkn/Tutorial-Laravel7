@extends('layouts.app')

@php
$title = __('SubItems');
@endphp
@section('content')
<div class="container">
    <h1><a href="{{ url('subitem/') }}" class="text-dark">{{ $title }}</a></h1>
    <div class="card">
        <div class="card-header">
            {{ __('Details') }}
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-2">{{ __('Sub Title') }}</dt>
                <dd class="col-md-10">{{ $sub_item->subtitle }}</dd>
                <dt class="col-md-2">{{ __('Sub Content') }}</dt>
                <dd class="col-md-10">{{ $sub_item->subcontent }}</dd>
                <dt class="col-md-2">{{ __('Parent') }}</dt>
                <dd class="col-md-10"><a href="{{ url('item/'.$sub_item->item['id']) }}">{{ $sub_item->item['title'] }}</a></dd>
            </dl>
        </div>
        <div class="card-footer text-muted">
            <div class="edit">
                <a href="{{ url('subitem/'.$sub_item->id.'/edit') }}" class="btn btn-primary">
                    {{ __('Edit') }}
                </a>
                <form action="{{ url('subitem/'.$sub_item->id) }}" method="POST" enctype="multipart/form-data"
                    onSubmit="return window.confirm('削除しますか？')" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">{{ __('Delete')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved. --}}