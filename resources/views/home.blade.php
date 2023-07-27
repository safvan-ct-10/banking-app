@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-capitalize">Welcome {{ auth()->user()->name }}</h3>
                            </div>

                            <div class="card-header row">
                                <div class="col-4">YOUR ID</div>
                                <div class="col-8"> {{ auth()->user()->email }}</div>
                            </div>

                            <div class="card-header row">
                                <div class="col-4">YOUR BALANCE</div>
                                <div class="col-8"> {{ auth()->user()->balance }} INR</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
