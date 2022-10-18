@extends('layouts.master')

@section('title')
    @lang('translation.gallery')
@endsection

@section('calendar')
    active
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            ပြက္ခဒိန်
        @endslot
        @slot('title')
            ပြင်မည်
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">ပြက္ခဒိန်</h4>
                </div><!-- end card header -->

                <!-- show message -->
                @include('components.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{!! route('calendar.store',$data->id) !!}" method="post" autocomplete="off">
                        @csrf
                        <label for="Name" class="form-label">နေ့ ရွေးပါ</label>
                        <input type="text" maxlength="2" class="form-control dateFilter" id="Name" name="created_at" value="{{ $data->created_at }}">
                        <br>

                        <label for="Name" class="form-label">အချိန် ရွေးပါ</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="time">
                            <option value="12:00 PM" {{ $data->time == "12:00 PM" ? "selected" : "" }}>12:00 PM</option>
                            <option value="4:00 PM" {{ $data->time == "4:00 PM" ? "selected" : "" }}>4:00 PM</option>
                        </select>

                        <div class="mb-3">
                            <div>
                                <label for="Name">ဂဏန်း အသစ် ထည့်ပါ</label> 
                            </div>
                            <input
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                             type="number" maxlength="2" class="form-control lottery_number" id="Name" name="number" value="{{ $data->number }}">
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

@section('script')
    <script src="{{ URL::asset('/assets/js/jquery-ui.min.js') }}"></script>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.dateFilter').datepicker({
                dateFormat: "yy-mm-dd",
            });
        });
    </script>
@endsection