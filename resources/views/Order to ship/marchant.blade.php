@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Merchandising Department</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : {{$items["buyer"]}}</td>
                        <td>Order No. : {{$items["orderNo"]}}</td>
                    </tr>
                    <tr>
                        <td>Color : {{$items["color"]}}</td>
                        <td>Item : {{$items["item"]}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <!-- marchant1 input -->

        <div class="row">
            <h4 align="center"> Size input :</h4>

            <form class="form-horizontal" action="/order-to-ship/sizeInput" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input"
                               placeholder="Sizes" name="Size">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">
                            ADD
                        </button>
                        <button type="button" class="btn btn-primary">
                            View / Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- edit order quantity inputs  -->
        <div class="row">
            <h4 align="center">Enter order Quantity</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sizes</th>
                        <th>Order quantity</th>
                        <th>update quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- showing marker pcs and marker length from database to update--}}
                    @foreach($db  as $sizes)
                        <form action="/order-to-ship/updateMerchantOrderQuantity" method="post">
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
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>


        <!-- edit option for sizespcs -->
        <div class="row">
            <h4 align="center">Edit Sizes</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Marker pcs</th>
                        <th>Update Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--showing Sizes from database to update--}}
                    @foreach($db  as $sizes)
                        <form action="/order-to-ship/merchantUpdateSize" method="post"
                              onsubmit="return confirm('Do you really want to update/delete the data?');">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <tr>
                                <td>{{$sizes["Size"]}}</td>
                                <input type="hidden" name="updateHiddenSize"
                                       value={{$sizes["marchant_id"]}}>
                                <td><input type="text" class="form-control" name="sizeUpdate"
                                           placeholder=""></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="submit" value="update">
                                        Update
                                    </button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="submit" value="delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection