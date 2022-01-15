@extends('admin.layouts.master')
@include('admin.partials.header')
@include('admin.partials.sidebar')
@section('content')


    <div class="col-xl-12 col-lg-12"style="height: 70em">

        <div class="card">
            <div class="card-header">
                {{ Breadcrumbs::render('companies') }}
            </div>
            @if(Session::has('message'))
                <div class="alert alert-secondary solid alert-rounded">
                    <strong>{{Session('message')}}</strong>
                </div>
            @endif()
            <?php $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 3) + 1 : 1; ?>

            <div class="card-body">

                <div class="table-responsive">
                    <div id=" example3_wrapper"  class=" dataTables_wrapper no-footer">
                        <div >
                            <form action="{{route('search.companies')}}" method="get">
                                <a  class="btn btn-rounded btn-info" style=" margin-top: 4em;margin-right: 2em  "  href="{{route('companies.create')}}" >
                                    <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>

                                    </span>ایجاد شرکت جدید
                                </a>
                                <div class="input-group search-area form-control input-rounded" id="example5_filter" style="border-color:lightgrey;  float: left;height: 49px ;margin-left: 1em ;margin-right: 2em  ;margin-bottom: 1em ;margin-top: 3em ; "  class="dataTables_filter">

                                    <input type="text"  name="search" class="form-control d-xl-inline-flex d-none"style=" border-color: transparent ;padding-left: 0;border-radius: 0 3rem 3rem 0;"  placeholder=" جستجو ">
                                    <div class="input-group-append"style="height: 2rem;">

                                        <button class="input-group-text ">
                                            <i class="flaticon-381-close"></i>
                                        </button>
                                        <button class="input-group-text" >
                                            <i class="flaticon-381-search-2"></i>
                                        </button>
                                    </div>
                                </div>



                            </form>
                        </div>

                    </div>
                    <table id="example"  style="font-size:16px "  class="display table-responsive-md dataTable" role="grid" aria-describedby="example_info">

                        <thead>
                        <tr role="row">
                            <th class="text-center align-middle">ردیف</th>
                            <th class="text-center align-middle">کد شرکت</th>
                            <th class="text-center align-middle">نام شرکت</th>

                            <th class="text-center align-middle"> ویرایش</th>
                            <th class="text-center align-middle"> حذف</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)

                            <tr>
                                <td class="text-center align-middle">{{$i++}}</td>
                                <td class="text-center align-middle">{{$company->cod}}</td>
                                <td class="text-center align-middle">{{$company->title}}</td>

                                <td class="text-center align-middle">

                                    <a class=" btn btn-rounded btn-warning"style="width: 9em"
                                       href="{{route('companies.edit',$company->id)}}">
                                        <span class="btn-icon-left text-warning">
                                            <i class="fa fa-edit color-warning"></i>
                                        </span>ویرایش

                                    </a>

                                </td>
                                <td class="text-center align-middle">
                                    <a  class="btn btn-rounded btn-danger" style="width: 7em"
                                        onclick="deleteItem({{$company->id}})">
                                        <span class="btn-icon-left text-danger">
                                            <i class="fa fa-remove color-remove"></i>
                                        </span>حذف
                                    </a>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <nav style="margin-top: 1em ;float: right ;margin-left: 4em">
                        <ul class="pagination pagination-circle">
                            <li class="page-item page-indicator">

                            </li>

                            </li>
                            {{$companies->links()}}
                            <li class="page-item page-indicator">

                            </li>
                        </ul>
                    </nav>



                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف شرکت',
                text: "آیا از حذف  شرکت مطمئن هستید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {


                    $.ajax(
                        {
                            url: 'http://127.0.0.1:8000/admin/companies/' +id,
                            type: 'delete',
                            dataType: "JSON",
                            data: {
                                _token:"{{csrf_token()}}",
                                "id": id
                            },
                            success: function (response)
                            {
                    if(response==false){
                                        Swal.fire(
                                          'شرکت حذف نشد',
                                            'شرکت مورد نظر در جداول دیگر استفاده شده است',
                                                'باشه'
                                 );}
                          else{

                             Swal.fire(
                                      'شرکت حذف شد',
                                    'شرکت مورد نظر با موفقیت حذف شد',
                                          'باشه'
                                          );}

                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });

               //     location.reload();
                }
            });
        }
    </script>
@endsection

