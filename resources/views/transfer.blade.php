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
                                <h3 class="card-title">Transfer Money</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Email</div>
                                    <input type="email" name="input-mask" class="form-control"
                                        placeholder="Enter email" autocomplete="off" />
                                </div>

                                <div class="mb-3">
                                    <div class="form-label">Amount</div>
                                    <input type="text" name="input-mask" class="form-control"
                                        placeholder="Enter amount to transfer" autocomplete="off" />
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn btn-primary w-100">Transfer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
