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
            အသေးစိတ်ပြခြင်း
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        ပို့စ်များ
                    </h4>
                    <a href="{{ route('posts.create') }}"> <button type="submit" class="btn btn-dark">အသစ်ထည့်မည်</button></a>
                </div><!-- end card header -->

                <!-- show message -->
                @include('components.info')

                <div class="card-body">
                    <!-- show sub sectors -->
                    <div class="row gallery-wrapper">
                        @foreach($posts as $post)
                            <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"  data-category="designing development">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ asset('storage/'.$post->photo) }}" title="">
                                            <img class="gallery-img photo_design" src="{{ asset('storage/'.$post->photo) }}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption"></h5>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-1">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate"></a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0 shadow-none"></button>
                                                    <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0 shadow-none"></button>
                                                    <a href="{!! route('posts.edit',$post->id) !!}" class="edit_button"><i class="bx bx-edit-alt fs-22"></i></a>
                                                    <form action="{!! route('posts.destroy',$post->id) !!}" method="POST">
                                                        {{ method_field("DELETE")}}
                                            			{{ csrf_field()}}
                                                        <button class="delete_button" type="submit" onClick="return confirm('Are you sure?')"><i class="bx bx-trash fs-22"></i></button>
                                                    </form>                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- end sub sectors -->

                    <div
                        class="align-items-center mt-4 pt-2 justify-content-between d-flex">
                        <div class="flex-shrink-0"></div>
                        {{ $posts->links('components.pagination') }}
                    </div>

                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection

