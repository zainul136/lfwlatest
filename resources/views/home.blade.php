@extends('main')
@section('title', $title ?? '')
@section('header')
    @include('layouts.header')
@endsection
<style>
    /* .card2-content .card2-top .images img{
        width: auto;
        height: auto;
        display: none;
        margin: auto;
        cursor: pointer;
        min-width: 500px !important;
        min-height: auto !important;
        max-width: 500px !important;
        max-height: 300px !important;
        object-fit : contain;
        border-radius: 5%;

    } */
    .card2-content .card2-top .images {
        max-height : 500px;
        justify-content: center;
    display: flex;
    }
    .card2-content .card2-top .images img{
        border-radius: 20px;
    width: auto !important;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    display : none;
    min-width: 50%;
    min-height: 50%;

    }
</style>
@section('content')
    <div class="container-fluid p-0" style="background-color: rgba(18, 32, 59, 0.09); padding: 30px 0px !important; min-height: 100vh;">
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            @include('home-sections.tags')
            <div class="row">
                @include('home-sections.left')
                <div class="col-sm-6 p-0">
                    @include('home-sections.writePost')

                    @include('home-sections.posts')
                </div>
                @include('home-sections.right')
            </div>
        </div>
    </div>
    @include('home-sections.homeJS')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
