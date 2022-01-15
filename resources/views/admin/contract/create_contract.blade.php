@extends('admin.layouts.master')
@include('admin.partials.header')
@include('admin.partials.sidebar')
@section('style')
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"rel="stylesheet">

@endsection
@section('content')

    <div class="col-xl-12 col-lg-12"style="height: 50em">

        <div class="card">
            <div class="card-header">
                {{ Breadcrumbs::render('createContracts') }}
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form role="form" method="post"  action="{{route('contracts.store' )}}">
                        @csrf
                        @if(Session::has('message'))
                            <div class="alert alert-secondary solid alert-rounded">
                                <strong>{{Session('message')}}</strong>
                            </div>
                        @endif()
                        @include('admin.partials.errors')


                        <div class="basic-form">

                            <div class="row" >
                                <div class="col-sm-6"style="width: 30em">
                                    <label class="text-black "style="font-size: medium; border-color:lightgrey;">شماره پرسنلی</label>
                                    <div class="dropdown bootstrap-select form-control default-select" style="font-size: medium; border-color:lightgrey; border-radius: 100em;">
                                        <div class="dropdown bootstrap-select form-control default-select text-black   " style="font-size: small">
                                            <select id="input2" name="employee_id" class="form-control default-select card-title " style="font-size: small" tabindex="-98">
                                                <option></option>
                                                @foreach($employees as $key=>$value)
                                                    <option  class="form-control default-select  text-black "style="font-size: small"value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 "style="width: 30em">
                                    <label class="text-black "style="font-size: medium; border-color:lightgrey;">پلاک منزل</label>
                                    <div class="dropdown bootstrap-select form-control default-select card-title " style="font-size: small">
                                        <select id="input" name="home_id" class="form-control default-select text-black  " style="font-size: small" >
                                            <option> </option>
                                            @foreach($homes as $key=>$value)
                                                <option class="form-control default-select text-black  text-black "style="font-size: small"   value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="basic-form">

                            <div class="row">
                                <div class="col-sm-6"style="margin-top:1em">
                                    <label class="text-black "style="font-size: medium; border-color:lightgrey;">تاریخ شروع </label>
                                    <input  data-jdp data-jdp-min-date="today" name="start_date" class="form-control input-rounded  text-black "style="font-size: medium; border-color:lightgrey;" id="datepicker-default"placeholder="1400/01/01">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0"style="margin-top:1em">
                                    <label class="text-black "style="font-size: medium; border-color:lightgrey;margin-top: 1em">تاریخ پایان</label>
                                    <input  data-jdp data-jdp-min-date="today" name="end_date" class="form-control  input-rounded  text-black "style="font-size: medium; border-color:lightgrey;" id="datepicker-default"placeholder="1400/01/01">
                                </div>
                            </div>

                        </div>


                        <div class="basic-form">

                            <div class="row">
                                <div class="col-sm-6"style="margin-top:1em">
                                    <label class="text-black "style="font-size: medium; border-color:lightgrey;">توضیحات </label>
                                    <input type="text" name="description"  class="form-control input-rounded text-black"style="font-size: small; border-color:lightgrey;" placeholder="توضیحات را وارد نمایید">
                                </div>


                        <div class="col-sm-6 mt-2 mt-sm-0"style="margin-top: 4em">
                            <input type="checkbox" name="status"  checked="checked" value="true" style="font-size: large;margin-top: 4em ">
                            <label class="form-check-label"style="font-size: large ">
                                فعال
                            </label>
                        </div>
                        </div>
                        </div>


                        <h4 class="card-title"></h4>
                        <a  href="{{route('contracts.create')}}" >
                            <button type="submit" class="btn btn-rounded btn-info" style="margin-left: 5em;margin-top: 2em;float: left">
                                      <span class="btn-icon-left text-info">
                                        <i class="fa fa-plus color-info"></i>

                                    </span>ایجاد قرارداد جدید</button>

                        </a>



                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script type="text/javascript">

        $("#input2").select2({
            placeholder:'nothing selected'
        });

        $("#input").select2({
            placeholder:'nothing selected'
        });
    </script>
@endsection
