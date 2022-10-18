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
            ဖန်တီးမည်
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $name }}</h4>
                </div><!-- end card header -->

                <!-- show message -->
                @include('components.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="/update/{{ $data->id }}" method="post">
                        {{ method_field("PUT")}}
                        @csrf
                        <label for="Name" class="form-label">
                            @if($data->type == 'about_2d' || $data->type == 'about_app')
                                ခေါင်းစဥ်ထည့်ပါ
                            @else
                                ဂဏန်းထည့်ပါ
                            @endif
                        </label>
    
                        <div class="mb-3">
                            <!-- Textarea -->
                            <div>
                                <textarea class="form-control" id="exampleFormControlTextarea5" name="content" rows="3">{{ $data->content }}</textarea>
                            </div>
                        </div>
                        <label for="Name" class="form-label">အကြောင်းအရာ</label>
                        
                        <div class="mb-3">
                            <!-- Textarea -->
                            <div>
                                <textarea class="form-control" id="exampleFormControlTextarea5" name="description" rows="3">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-dark">ပြင်မည်</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection

