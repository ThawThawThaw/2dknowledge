@extends('layouts.master')

@section('title')
    @lang('translation.gallery')
@endsection

@section('posts')
    active
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            ပို့စ်များ
        @endslot
        @slot('title')
            ဖန်တီးမည်
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">ပို့စ်များ</h4>
                </div><!-- end card header -->

                <!-- show message -->
                @include('components.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="Name" class="form-label">
                            ဓာတ်ပုံထည့်ပါ
                        </label>
    
                        <div class="mb-3">
                            <!-- Textarea -->
                            <div>
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-dark">ထည့်မည်</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection
