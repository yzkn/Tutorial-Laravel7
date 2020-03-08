@extends('layouts.app')

@php
$title = __('SubItems');
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="table-responsive">
        <div id="subitems">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="6">
                            <input type="text" class="form-control search" placeholder="Search" />
                        </th>
                        <th>
                            <a href="{{ url('subitem/create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </th>
                    </tr>
                    <tr>
                        <th class="sort" data-sort="id">{{ __('ID') }}</th>
                        <th class="sort" data-sort="subtitle">{{ __('Sub Title') }}</th>
                        <th class="sort" data-sort="subcontent">{{ __('Sub Content') }}</th>
                        <th class="sort" data-sort="item_id">{{ __('Parent') }}</th>
                        <th class="sort" data-sort="created_at">{{ __('Created at') }}</th>
                        <th class="sort" data-sort="updated_at">{{ __('Updated at') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($sub_items as $sub_item)
                    <tr>
                        <td class="id"><a href="{{ url('subitem/'.$sub_item->id) }}">{{ $sub_item->id }}</a></td>
                        <td class="subtitle">{{ $sub_item->subtitle }}</td>
                        <td class="subcontent">{{ $sub_item->subcontent }}</td>
                        <td class="item_id">{{ $sub_item->item['title'] }}</td>
                        <td class="created_at">{{ $sub_item->created_at }}</td>
                        <td class="updated_at">{{ $sub_item->updated_at }}</td>
                        <td>
                            <a href="{{ url('subitem/'.$sub_item->id) }}" class="btn btn-secondary">
                                {{ __('Details') }}
                            </a>
                            <a href="{{ url('subitem/'.$sub_item->id.'/edit') }}" class="btn btn-primary">
                                {{ __('Edit') }}
                            </a>
                            <form action="{{ url('subitem/'.$sub_item->id) }}" method="POST"
                                enctype="multipart/form-data" onSubmit="return window.confirm('削除しますか？')"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('Delete')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection