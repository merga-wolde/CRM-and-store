@extends('layouts.client.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-10">
                    

                        <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
                            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                                <div class="container h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="card" style="border-radius: 15px;">
                                        <div class="card-body p-5">
                                        <h2 class="text-uppercase text-center mb-5">Add Category</h2>

                                        <form  role="form" method="POST" action="{{ route('client.updatecategory', $category->id) }}">
                                            
                                            @csrf
                
                                            <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                <div class="input-group input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                    </div>
                                                    <input class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Category') }}" type="text" name="product_category" value="{{ $category->category }}" required autofocus>
                                                </div>
                                                @if ($errors->has('category'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('category') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-4">{{ __('Update category') }}</button>
                                            </div>
                                        </form>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </section>



                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="separator separator-bottom separator-skew zindex-100">
            {{-- <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg> 
        </div> --}}
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
