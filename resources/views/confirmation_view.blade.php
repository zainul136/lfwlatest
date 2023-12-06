@extends('main')
@section('title', $title)
@section('header')
    @include('layouts.header')
@endsection
@section('content')
    <div class="container">
        <h1>Death Confirmation Details</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Confirmation ID: {{ $confirmation->id }}</h2>
                <p><strong>Date of Death:</strong> {{ $confirmation->date_of_death }}</p>
                <p><strong>Place of Death:</strong> {{ $confirmation->place_of_death }}</p>
                <!-- Add more details as needed -->

                <a href="{{ route('settings') }}" class="btn btn-primary">Back to Settings</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
