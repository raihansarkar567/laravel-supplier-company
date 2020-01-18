@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Supplier Delivery</h6>
                            <table id="paidTbl_id" class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Description</th>
                                       <th>Cost</th>
                                       <th>Btn</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($delivery_info as $delivery_data)
                                        <tr>
                                            <td>{{$delivery_data -> product_title}}</td>
                                            <td>{{$delivery_data -> product_des}}</td>
                                            <td>{{$delivery_data -> cost}}</td>
                                            <td><a href="{{route('companyStore', ['id' => $delivery_data -> delivery_id])}}" type="button" class="btn btn-info" role="button">Store</a></td>
                                        </tr>
                                @endforeach
                                </tbody>
                           </table>
                        </div>
                        <div class="col-sm-6">
                            <h6>Company Store</h6>
                            <table id="notPaidTbl_id" class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Description</th>
                                       <th>Cost</th>
                                       <th>Btn</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($store_info as $store_data)
                                        <tr>
                                            <td>{{$store_data -> product_title}}</td>
                                            <td>{{$store_data -> product_des}}</td>
                                            <td>{{$store_data -> cost}}</td>
                                            <td><a href="{{route('store.delete', ['id' => $store_data -> store_id])}}" type="button" class="btn btn-danger" role="button">Delete</a></td>
                                        </tr>
                                @endforeach
                                </tbody>
                           </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection