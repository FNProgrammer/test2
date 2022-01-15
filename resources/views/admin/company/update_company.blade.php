@extends('admin.layouts.master')
@include('admin.partials.header')
@include('admin.partials.sidebar')
@section('content')


    <div class="col-xl-12 col-lg-12"style="height: 50em">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">شرکت های توسعه نیشکر</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form role="form" method="post"  action="{{route('companies.update',$company->id)}}">
                        @csrf
                        @method('patch')
                        @if(Session::has('message'))
                            <div class="alert alert-secondary solid alert-rounded">
                                <strong>{{Session('message')}}</strong>
                            </div>
                        @endif()
                        @include('admin.partials.errors')



                        <div class="card-body">
                            <div class="basic-form">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-black "style="font-size: medium; border-color:lightgrey;">کد شرکت </label>
                                        <input type="number"  name="cod"  class="form-control input-rounded text-black"style="font-size: small; border-color:lightgrey;" value="{{$company->cod}}">
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label class="text-black "style="font-size: medium; border-color:lightgrey;">عنوان شرکت</label>
                                        <input type="text" name="title" class="form-control input-rounded text-black"style="font-size: small; border-color:lightgrey;" value="{{$company->title}}">
                                    </div>
                                </div>

                            </div>


                        <div class="card-body">
                            <a   href="{{route('companies.create')}}" >
                                <button type="submit" class="btn btn-rounded btn-info" style="margin-left: 5em;margin-top: 2em;float: left">
                                      <span class="btn-icon-left text-info">
                                        <i class="fa fa-plus color-info"></i>

                                    </span>ویرایش شرکت </button>

                            </a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
