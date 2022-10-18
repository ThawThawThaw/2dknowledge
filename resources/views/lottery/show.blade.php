@extends('layouts.master')

@section('title')
    @lang('translation.gallery')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            {{ $name }}
        @endslot
        @slot('title')
            အသေးစိတ်ပြခြင်း
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        {{ $name }}
                    </h4>
                    <a href="/edit/{{ $data->type }}"> <button type="submit" class="btn btn-dark">ပြင်မည်</button></a>
                </div><!-- end card header -->

                <!-- show message -->
                @include('components.info')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="Name" class="form-label">
                            @if($data->type == 'about_2d' || $data->type == 'about_app')
                                ခေါင်းစဥ်
                            @else
                                ဂဏန်း
                            @endif
                        </label>
                        <p class="text-muted">{{ $data->content }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">အကြောင်းအရာ</label>
                        <p class="text-muted">{{ $data->description }}</p>
                    </div>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection

