@extends('main')

@section('title')
    Recheck with extra booking
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Results</h1>
        <div class="row">

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

            <div class="row">
                <h4 align="center">Order to ship outputs :</h4>

                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Display Sizes</th>
                            <th>Order Quantity</th>
                            <th>Cut Plan</th>
                            <th>Fabric Allocation</th>
                            <th>Extra Fabric Need</th>
                            <th>Available GMT Quantity</th>
                            <th>Cut Transaction Balance</th>
                            <th>SEW Transaction Balance</th>
                            <th>Finishing Transaction Balance</th>
                            <th>PAc Transaction Balance</th>
                        </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

    </div>
@endsection