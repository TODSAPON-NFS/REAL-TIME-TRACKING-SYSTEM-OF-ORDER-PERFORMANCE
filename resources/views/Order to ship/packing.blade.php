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
                        {{-- showing marker pcs and marker length from database to update--}}
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
                            <input type="text" class="form-control" id="input" name = "AddCountry"
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

            <!-- Country data input -->
            <div class="row">

                @foreach($country as $countries)

                <h3 align="center">Country : {{$countries["CountryName"]}}</h3>
                <h4 align="center">Shipment Date : {{$countries["ShipmentDate"]}}</h4>

                <form class="form-horizontal" action="/order-to-ship/addShipmentDate" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="CountryNameID" value="{{$countries["country_name_id"]}}">
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="date" id="date" placeholder="Enter Date">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary">
                                ADD / Update
                            </button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
                @endforeach
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
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>

            <!-- Country data input -->
            <div class="row">
                <h3 align="center">Country : United Kingdom</h3>
                <h4 align="center">Shipment Date : 11/11/2017</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="date" id="date" placeholder="Enter Date">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary">
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
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>
    </div>
@endsection