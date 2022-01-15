@extends('admin.layouts.master')
@include('admin.partials.header')
@include('admin.partials.sidebar')
@section('content')


    <div class="col-xl-12 col-lg-12"style="height: 50em">

        <div class="card">
            <div class="card-header">
                {{ Breadcrumbs::render('create') }}
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form role="form" method="post"  action="{{route('positions.update',$position->id)}}">
                        @csrf
                        @method('patch')
                        @if(Session::has('message'))
                            <div class="alert alert-secondary solid alert-rounded">
                                <strong>{{Session('message')}}</strong>
                            </div>
                        @endif()
                        @include('admin.partials.errors')
                        <div class="form-group" style="margin-top: 3em">
                            <label class="text-black "style="font-size: medium; border-color:lightgrey;width:60em ; margin-right:3em">عنوان سمت</label>

                            <input type="text"  name="title"class="form-control input-rounded text-black"  style="font-size: small; border-color:lightgrey;width:60em ; margin-right: 3em"placeholder="عنوان خانه را تایپ کنید" value="{{$position->title}}">



                        </div>


                        <div class="card-body">
                            <a   href="{{route('positions.create')}}" >
                                <button type="submit" class="btn btn-rounded btn-info" style="margin-left: 5em;margin-top: 2em;float: left">
                                      <span class="btn-icon-left text-info">
                                        <i class="fa fa-plus color-info"></i>

                                    </span>ویرایش سمت</button>

                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
