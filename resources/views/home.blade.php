@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Supplier Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="add_button">
                        <a href="{{route('add_product')}}" type="button" class="btn btn-info" role="button">Add Product</a>
                    </div>

                    <table class="table table-striped table-bordered">
             <thead>
                <tr>
                   <th>Product Title</th>
                   <th>Description</th>
                   <th>Cost</th>
                   <th>Btn</th>
               </tr>
           </thead>
           <tbody>
            @foreach($my_product as $product_info)
            <tr>
                
                <td>{{$product_info -> product_title}}</td>
                <td>{{$product_info -> product_des}}</td>
                <td>{{$product_info -> cost}}</td>
                <td><a href="{{route('sendToCompany', ['id' => $product_info -> product_id])}}" type="button" class="btn btn-info" role="button">Send to Company</a></td>
            </tr>

            

           @endforeach
       </tbody>
   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
