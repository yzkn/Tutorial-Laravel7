@extends('layouts.app')

@php
$title = __('Items');
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="table-responsive">
        <div id="items">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="4">
                            <form class="form-inline" method="GET" action="{{url('/item')}}">
                                @foreach ($request as $key=>$value)
                                    @if ($key!="q")
                                        <input type="hidden" name="{{$key}}" value="{{$value}}" />
                                    @endif
                                @endforeach
                                <div class="form-group">
                                    <input type="text" name="q" value="{{$request['q'] ?? ''}}" class="form-control" placeholder="{{ __('Search') }}">
                                </div>
                                <input type="submit" value="{{ __('Search') }}" class="btn btn-info">
                                <select class="custom-select" name="perpage" onchange="this.form.submit()">
                                    <option value="10" {{($request["perpage"] ?? "")==10?"selected":""}}>10</option>
                                    <option value="20" {{($request["perpage"] ?? "")==20?"selected":""}}>20</option>
                                    <option value="50" {{($request["perpage"] ?? "")==50?"selected":""}}>50</option>
                                    <option value="100" {{($request["perpage"] ?? "")==100?"selected":""}}>100</option>
                                </select>
                            </form>
                        </th>
                        <th>
                        </th>
                        <th>
                            <a href="{{ url('item/create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </th>
                    </tr>
                    <tr>
                        <th class="sort" data-sort="id">{{ __('ID') }}</th>
                        <th class="sort" data-sort="title">{{ __('Title') }}</th>
                        <th class="sort" data-sort="content">{{ __('Content')
                            }}</th>
                        <th class="sort" data-sort="created_at">{{ __('Created at') }}</th>
                        <th class="sort" data-sort="updated_at">{{ __('Updated at') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($items as $item)
                    <tr>
                        <td class="id"><a href="{{ url('item/'.$item->id) }}">{{ $item->id }}</a></td>
                        <td class="title">{{ $item->title }}</td>
                        <td class="content">{{ $item->content }}</td>
                        <td class="created_at">{{ $item->created_at }}</td>
                        <td class="updated_at">{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ url('item/'.$item->id) }}" class="btn btn-secondary">
                                {{ __('Details') }}
                            </a>
                            <a href="{{ url('item/'.$item->id.'/edit') }}" class="btn btn-primary">
                                {{ __('Edit') }}
                            </a>
                            <form action="{{ url('item/'.$item->id) }}" method="POST" enctype="multipart/form-data"
                                onSubmit="return window.confirm('削除しますか？')" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('Delete')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="6" class="center-block">
                            {{ $items->links() }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

{{-- Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved. --}}