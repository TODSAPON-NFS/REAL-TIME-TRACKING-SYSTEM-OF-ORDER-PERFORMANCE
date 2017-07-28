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
                        <form action="{{url('order-to-ship/updatePackingReceive')}}" method="post">
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

            <form class="form-horizontal" action="{{url('order-to-ship/PackingAddCountry')}}" method="post">
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
                        <a href="#editCountries" class="btn btn-primary" role="button">EDIT</a>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </form>
        </div>

        <!-- Country data input, data showing dynamically from database -->
        @foreach($countries as $country)

            <div class="row">
                <h3 align="center">Country : {{$country["CountryName"]}}</h3>
                <h4 align="center">Shipment Date : {{$country["ShipmentDate"]}}</h4>

                <form class="form-horizontal" action="{{url('order-to-ship/PackingAddCountryValue')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="HiddenCountryNameID" value="{{$country["country_name_id"]}}">

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
                        @foreach($db  as $merchant)

                            <?php $tempValue = App\ordertoship_country_value::where('country_name_id', '=', $country["country_name_id"])
                                ->where('marchant_id', '=', $merchant["marchant_id"])->first();?>

                            @if($tempValue == "")
                                @continue;
                            @endif


                            <form action="{{url('order-to-ship/PackingUpdateCountryValue')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <tr>
                                    <td>{{$merchant["Size"]}}</td>
                                    <td><?php echo $tempValue["Value"];?></td>

                                    <input type="hidden" name="updateHiddenTempValue"
                                           value="<?php echo $tempValue["Value"];?>">
                                    <input type="hidden" name="updateHiddenCountryValueID"
                                           value="<?php echo $tempValue["country_value_id"];?>">

                                    <td><input type="text" class="form-control" name="updateCountryValue"
                                               placeholder=""></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary" name="update" value="add">
                                            Add
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="update" value="sub">
                                            Sub
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
    @endforeach


    <!-- edit option for countries -->
        <div class="row" id = "editCountries">
            <h4 align="center">Edit Countries</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Update Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--showing country names from database to update--}}
                    @foreach($countries as $country)
                        <form action="{{url('order-to-ship/PackingUpdateCountryName')}}" method="post"
                              onsubmit="return confirm('Do you really want to delete the data?');">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <tr>
                                <td>{{$country["CountryName"]}}</td>
                                <input type="hidden" name="updateHiddenCountryID"
                                       value={{$country["country_name_id"]}}>
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
