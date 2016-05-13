@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection

@section('tt')
<p>tttt</p>
@endsection

{{!! $name !!}}
{{!! $age or '20' !!}}

@hasSection('tt')
    @yield('title') -- app name
@else
    app name
@endif
