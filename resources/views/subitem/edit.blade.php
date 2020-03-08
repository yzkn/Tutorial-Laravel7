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
    <form action="{{ url('subitem/'.$sub_item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$sub_item->id}}">
        <div class="card">
            <div class="card-header">
                {{ __('Edit') }}
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-2">{{ __('Title') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="subtitle" id="subtitle"
                            value="{{ $sub_item->subtitle }}"></dd>
                    <dt class="col-md-2">{{ __('Content') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="subcontent" id="subcontent"
                            value="{{ $sub_item->subcontent }}">
                    </dd>
                    <dt class="col-md-2">{{ __('Parent') }}</dt>
                    <dd class="col-md-10">
                        <select class="form-control" name="item_id" id="item_id">
                            <option value=""></option>
                            @foreach($items as $item)
                            <option value="{{ $item->id }}" {{ (($sub_item->item_id == $item->id)?' selected':'')
                                }}>{{$item->title}}</option>
                            @endforeach
                        </select>
                    </dd>
                </dl>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" type="submit">{{ __('Update')}}</button>
            </div>
        </div>
    </form>
</div>
@endsection