@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    {!! $c_menu->description !!}
    @includeIf('templates.slider', ['contents' => $sliders])
    @includeIf('templates.contact_1', ['contents' => null])
    @includeIf('templates.contact_2', ['contents' => $sliders])
    @includeIf('templates.feature_3', ['contents' => null])
    @includeif('templates.about_2', ['contents' => null])
    @includeIf('templates.service_1', ['contents' => $services])
    @includeIf('templates.work_process', ['contents' => null])
@endsection