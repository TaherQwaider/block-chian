@extends('layout/main')

@section('main-content')
    <div class="row">
        <div class="card card-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-2 bg-gradient-dark">
                            <img class="card-img-top" src="{{ asset('storage'.$certificate->file) }}" alt="Dist Photo 1">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title text-primary text-white">{{ $certificate->title }}</h5>
                                <p class="card-text text-white pb-2 pt-1">{{ $certificate->from }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <button class="btn btn-primary">Wait</button>
                    <button class="btn btn-success">Applove</button>
                    <button class="btn btn-danger">Decline</button>
                </div>
            </div>
        </div>
    </div>
@endsection
