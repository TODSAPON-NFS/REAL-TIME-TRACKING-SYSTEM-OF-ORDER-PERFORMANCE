@extends('main')

@section('title')
    Delete
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Delete Data</h1>

        <!-- edit order quantity inputs  -->
        <div class="row">
            <h4 align="center">Enter order Quantity</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Buyer</th>
                        <th>Order No</th>
                        <th>Color</th>
                        <th>Item</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- showing marker pcs and marker length from database to update--}}
                   {{-- @foreach($db  as $sizes)
                        <form action="/delete" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <tr>
                                <td>{{$sizes["Size"]}}</td>
                                <td>{{$sizes["OrderQuantity"]}}</td>

                                <input type="hidden" name="hiddenMerchantID"
                                       value={{$sizes["marchant_id"]}}>
                                <td><input type="text" class="form-control" name="updateOrderQuantity"
                                           placeholder=""></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="update" value="update">
                                        Update
                                    </button>
                                </td>
                            </tr>

                        </form>
                    @endforeach--}}

                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
@endsection