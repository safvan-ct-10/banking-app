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
                                <h3 class="card-title">Deposit Money</h3>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form action="{{ route('depositPost') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="form-label">Amount</div>
                                        <input type="text" class="form-control" placeholder="Enter amount to deposit"
                                            autocomplete="off" name="amount" value="{{ old('amount') }}" />

                                        @if ($errors->has('amount'))
                                            <p class="text-danger">{{ $errors->first('amount') }}</p>
                                        @endif
                                    </div>

                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary w-100">Deposit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
