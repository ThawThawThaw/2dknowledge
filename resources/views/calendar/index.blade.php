@extends('layouts.master')

@section('title')
    @lang('translation.gallery')
@endsection

@section('calendar')
    active
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            ပြက္ခဒိန်
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
                        ပြက္ခဒိန်
                    </h4>
                    <a href="{{ route('calendar.create') }}"> <button type="submit" class="btn btn-dark">အသစ်ထည့်မည်</button></a>
                </div><!-- end card header -->

                <!-- show message -->
                @include('components.info')

                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">12:00 PM</th>
                                                <th scope="col">4:00 PM</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($numbers as $number)
                                                <tr>
                                                    <td class="fw-medium">{{ $number->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $number->twelve_hr }}</td>
                                                    <td>{{ $number->four_hr }}</td>
                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="{!! route('calendar.edit',$number->id) !!}" class="buttons"
                                                            >    
                                                                <i class="bx bx-pencil fs-20"></i>
                                                            </a>
                                                            <form action="{!! route('calendar.destroy',$number->id) !!}" method="POST">
                                                                {{ method_field("DELETE") }}
                                                                {{ csrf_field()}}
                                                                <button class="calendar_edit_button" type="submit" onClick="return confirm('Are you sure?')"><i class="bx bx-trash fs-22"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!-- end card-body -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection

