@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', $c_menu->description)

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
  <h1 style="display: none">{{ $provider->title }}</h1>
  <div style="display: none">{{ $c_menu->descrtiption }}</div>
  
  <!-- ========================
  page title 
  =========================== -->
  <section class="page-title page-title-layout5">
    <div class="bg-img"><img src="{{ asset('/images/backgrounds/6.jpg') }}" alt="background"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="pagetitle__heading">{{ $c_menu->title }}</h1>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $c_menu->title }}</li>
            </ol>
          </nav>
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.page-title -->

  @includeIf('templates.service_2', ['contents' => $services])
@endsection