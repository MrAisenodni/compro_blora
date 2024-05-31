@extends('layouts.main')

@section('title', 'Dashboard')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    @includeIf('templates.slider', ['contents' => $sliders])
    @includeIf('templates.contact_info', ['contents' => $contact_infos])
    @includeif('templates.about_2', ['content' => null])
    @includeIf('templates.service_1', ['contents' => $services])
    @includeIf('templates.work_process', ['contents' => null])
@endsection