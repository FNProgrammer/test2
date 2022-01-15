@extends('admin.layouts.master')
@include('admin.partials.header')
@include('admin.partials.sidebar')
@section('content')

    <div class="col-xl-12 col-lg-12"style="height: 50em">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">  منازل سازمانی</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form role="form" method="post"  action="{{route('homes.update',$home->id)}}">
                        @csrf
                        @method('patch')
                        @if(Session::has('message'))
                            <div class="alert alert-secondary solid alert-rounded">
                                <strong>{{Session('message')}}</strong>
                            </div>
                        @endif()
                        @include('admin.partials.errors')
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="text-black "style="font-size: medium; border-color:lightgrey;">بلوک </label>
                                <input type="number" name="district"  class="form-control input-rounded text-black"style="font-size: small; border-color:lightgrey;"  value="{{$home->district}}">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <label class="text-black "style="font-size: medium; border-color:lightgrey;">واحد</label>
                                <input type="number"  name="unit" class="form-control input-rounded text-black"style="font-size: small; border-color:lightgrey;" value="{{$home->unit}}">
                            </div>
                        </div>
                        <div class="basic-form" style="margin-top: 1em">

                            <div class="row" style="margin-top: 1em">
                                <div class="col-sm-6" style="margin-top: 1em">

                                    <label class="text-black "style="font-size: medium; border-color:lightgrey;">نوع منزل </label>
                                    <div class="dropdown bootstrap-select form-control default-select" style="font-size: medium; border-color:lightgrey; border-radius: 100em;">
                                        <select id="inputState" name="home_kind_id" class=" default-select input-rounded  form-control text-black "style="font-size: medium; border-color:lightgrey; border-radius: 100em;" tabindex="-98">
                                            @foreach($home_kinds as $key=>$value)
                                                @if($home->home_kind_id == $key)
                                                    <option selected value="{{$key}}"class="form-control text-black "style="font-size: small">{{$value}}</option>
                                                @else
                                                    <option value="{{$key}}"class="form-control text-black "style="font-size: small">{{$value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <label class="form-check-label">
                                </label>
                                <div class=" card-title"style="font-size: small ;margin-top: 4em">
                                    <input type="checkbox" name="rent"   {{ $home->rent ? 'checked' : '' }}  >

                                    <label  class="form-check-label "style="font-size: large ">
                                        مستاجر
                                    </label>
                                </div>
                            </div>




                        </div>

                        <h4 class="card-title"></h4>

                        <a   href="{{route('homes.create')}}" >
                            <button type="submit" class="btn btn-rounded btn-info" style="margin-left: 5em;margin-top: 2em;float: left">
                                      <span class="btn-icon-left text-info">
                                        <i class="fa fa-plus color-info"></i>

                                    </span>ویرایش منزل</button>

                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

