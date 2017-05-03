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

            <p style="margin-top: 10px" align="center">Extra Quantity Percentance : {{$mainDB["CutPlan"]}}</p>
            <p align="center">Per GMT Consumtion yrd : {{$mainDB["FabricAllocation"]}}</p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Display Sizes</th>
                    <th>Order Quantity</th>
                    <th>Cut Plan</th>
                    <th>Fabric Allocation</th>
                    <th>Extra Fabric Need</th>
                    <th>Available GMT Quantity</th>
                    <th>Cut Quantity Total</th>
                    <th>Cut Transaction Balance</th>
                    <th>Sewing Receive Total</th>
                    <th>SEW Transaction Balance</th>
                    <th>Finishing Receive Total</th>
                    <th>Finishing Transaction Balance</th>
                    <th>Packing Receive Total</th>
                    <th>PAC Transaction Balance</th>
                    <th>Rejection</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Outputs as $output)
                    <tr>
                        <td>{{$output["Size"]}}</td>
                        <td>{{$output["OrderQuantity"]}}</td>
                        <td>{{$output["CutPlan"]}}</td>
                        <td>{{$output["FabricAllocation"]}}</td>
                        <td>{{$output["ExtraFabricNeed"]}}</td>
                        <td>{{$output["AvailableGMT"]}}</td>
                        <td>{{$output["CutQuantity"]}}</td>
                        <td>{{$output["CutTransactionBalance"]}}</td>
                        <td>{{$output["SewingReceive"]}}</td>
                        <td>{{$output["SEWTransactionBalance"]}}</td>
                        <td>{{$output["FinishingReceive"]}}</td>
                        <td>{{$output["FinishingTransactionBalance"]}}</td>
                        <td>{{$output["PackingReceive"]}}</td>
                        <td>{{$output["PackingTransactionBalance"]}}</td>
                        <td>{{$output["Rejection"]}}</td>


                    </tr>
                @endforeach

                <tr>
                    <td>SUMS:</td>
                    <td>{{$SUMS["A"]}}</td>
                    <td>{{$SUMS["C"]}}</td>
                    <td>{{$SUMS["E"]}}</td>
                    <td>{{$SUMS["F"]}}</td>
                    <td>{{$SUMS["G"]}}</td>
                    <td>{{$SUMS["H"]}}</td>
                    <td>{{$SUMS["CutTransactionBalance"]}}</td>
                    <td>{{$SUMS["I"]}}</td>
                    <td>{{$SUMS["SEWTransactionBalance"]}}</td>
                    <td>{{$SUMS["J"]}}</td>
                    <td>{{$SUMS["FinishingTransactionBalance"]}}</td>
                    <td>{{$SUMS["K"]}}</td>
                    <td>{{$SUMS["K"]}}</td>
                    <td>{{$SUMS["Rejection"]}}</td>


                </tr>
                </tbody>
            </table>


        </div>

        {{--Country Outputs--}}
        <div class="row">
            <h4 align="center">Countries :</h4>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Display Sizes</th>
                    <th>Available</th>
                    @foreach($CountryNames as $CountryName)
                        <th>{{$CountryName["CountryName"]}} (Shipment :{{$CountryName["ShipmentDate"]}})</th>
                    @endforeach

                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < count($CountryOutputs); $i++)
                    <tr>
                    @for($j = 0; $j < count($CountryOutputs[$i]); $j++)
                        <td>{{$CountryOutputs[$i][$j]}}</td>
                    @endfor
                    </tr>
                @endfor

                </tbody>
            </table>
        </div>

    </div>

    </div>
@endsection