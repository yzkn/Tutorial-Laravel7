@extends('layouts.app')

@php
$title = __('Items');
@endphp
@section('content')
<div class="container">
    <h1><a href="{{ url('item/') }}" class="text-dark">{{ $title }}</a></h1>
    <div class="card">
        <div class="card-header">
            {{ __('Details') }}
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-2">{{ __('Title') }}</dt>
                <dd class="col-md-10">{{ $item->title }}</dd>
                <dt class="col-md-2">{{ __('Content') }}</dt>
                <dd class="col-md-10">{{ $item->content }}</dd>
                <dt class="col-md-2">{{ __('Children') }}</dt>
                <dd class="col-md-10">
                    <ul>
                        @foreach($item->sub_items as $sub_item)
                        <li><a href="{{ url('subitem/'.$sub_item->id) }}">{{ $sub_item->subtitle }}</a></li>
                        @endforeach
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="card-footer text-muted">
            <div class="edit">
                <a href="{{ url('item/'.$item->id.'/edit') }}" class="btn btn-primary">
                    {{ __('Edit') }}
                </a>
                <form action="{{ url('item/'.$item->id) }}" method="POST" enctype="multipart/form-data"
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