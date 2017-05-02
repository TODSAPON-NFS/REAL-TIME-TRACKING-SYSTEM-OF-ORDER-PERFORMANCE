@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Packing Department</h1>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
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
            <div class="col-sm-3"></div>
        </div>

        <!-- cut inputs  -->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sizes</th>
                        <th>Packing Receive Total</th>
                        <th>update quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--showing marker pcs and marker length from database to update--}}

                    @foreach($db  as $packingReceive)
                        <form action="/order-to-ship/updatePackingReceive" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <tr>
                                <td>{{$packingReceive["Size"]}}</td>
                                <td>{{$packingReceive["PackingReceive"]}}</td>

                                <input type="hidden" name="hiddenMerchantID"
                                       value={{$packingReceive["marchant_id"]}}>
                                <td><input type="text" class="form-control" name="updatePackingReceive"
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

        <div class="row">
            <h4 align="center">Country input :</h4>

            <form class="form-horizontal" action="/order-to-ship/PackingAddCountry" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input" name="AddCountry"
                               placeholder="Country Name : ">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            ADD
                        </button>
                        <button type="button" class="btn btn-primary">
                            EDIT
                        </button>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </form>
        </div>

        <!-- Country data input, data showing dynamically from database -->
        @foreach($country as $countries)

            <div class="row">
                <h3 align="center">Country : {{$countries["CountryName"]}}</h3>
                <h4 align="center">Shipment Date : {{$countries["ShipmentDate"]}}</h4>

                <form class="form-horizontal" action="/order-to-ship/PackingAddCountryValue" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="HiddenCountryNameID" value="{{$countries["country_name_id"]}}">

                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="shipmentDate" id="date"
                                   placeholder="Enter Date">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">
                                ADD / Update
                            </button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>

                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Size</th>
                            <th>Inputs</th>
                            <th>Update Value</th>
                        </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>

            </div>
        @endforeach


    <!-- edit option for sizespcs -->
        <div class="row">
            <h4 align="center">Edit Countries</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Size</th>
                        <th>Update Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--showing Sizes from database to update--}}
                    @foreach($country as $countries)
                        <form action="/order-to-ship/PackingUpdateCountryName" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <tr>
                                <td>{{$countries["CountryName"]}}</td>
                                <input type="hidden" name="updateHiddenCountryID"
                                       value={{$countries["country_name_id"]}}>
                                <td><input type="text" class="form-control" name="CountryUpdate"
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
