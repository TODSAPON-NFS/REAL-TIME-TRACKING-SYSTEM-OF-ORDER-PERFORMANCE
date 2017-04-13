@extends('main')

@section('title')
    CAD
@endsection

@section('ContentOfBody')
    <div class="container">


        <h1 align="center">Results</h1>
        <div class="row" style="padding-top: 20px">

            <div class="row">
                <h4 align="center"><i>Merchant inputs </i></h4>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : {{$items["buyer"]}}</td>
                            <td>order quantity : {{$items["OrderQuantity"]}}</td>
                        </tr>
                        <tr>
                            <td>Order No. :  {{$items["orderNo"]}}</td>
                            <td>Fabric Need: {{$items["fabricNeed"]}}</td>
                        </tr>
                        <tr>
                            <td>Color : {{$items["color"]}}</td>
                            <td>Mock Up Input : {{$items["mockUpInput"]}}</td>
                        </tr>
                        <tr>
                            <td>Item : {{$items["item"]}}</td>
                            <td>Mock Up Output : {{$items["mockUpOutput"]}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>

            <div class="row" style="padding-top: 20px">
                <h4 align="center"><i>CAD inputs </i></h4>

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Buyer : {{$items["buyer"]}}</td>
                                <td>Cutting Wastage : {{$items["CuttingWastage"]}}</td>
                            </tr>
                            <tr>
                                <td>Order No. :  {{$items["orderNo"]}}</td>
                                <td>Extra Loading : {{$items["ExtraLoading"]}}</td>
                            </tr>
                            <tr>
                                <td>Color : {{$items["color"]}}</td>
                                <td>Relaxing Shrinkage : {{$items["RelaxingShrinkage"]}}</td>
                            </tr>
                            <tr>
                                <td>Item : {{$items["item"]}}</td>
                                <td>Washing Wastage : {{$items["WashingWastage"]}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>output(u) : {{$items["output"]}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>

            <div class="row">
                <h4 align="center"><i>Store inputs </i></h4>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : {{$items["buyer"]}}</td>
                            <td>Available Fabric Yards: {{$items["AvailableFabricYards"]}}</td>
                        </tr>
                        <tr>
                            <td>Order No. : {{$items["orderNo"]}}</td>
                            <td>Available Fabric Rolls : {{$items["AvailableFabricRolls"]}}</td>
                        </tr>
                        <tr>
                            <td>Color : {{$items["color"]}}</td>
                            <td>Output : {{$items["storeOutput"]}}</td>
                        </tr>
                        <tr>
                            <td>Item : {{$items["item"]}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <h4 align="center"><i>Extra Fabric : {{$items["extraFabric"]}}  </i></h4>
                <h4 align="center"><i>Short / excess Monitoring : {{$items["shortMonitoring"]}}  </i></h4>
            </div>
    </div>

        <div class="row" style="padding-top: 20px">
            <h4 align="center"><i>MU inputs </i></h4>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : {{$items["buyer"]}}</td>
                            <td>Increased Consumption: {{$items["IncreasedConsumption"]}}</td>
                        </tr>
                        <tr>
                            <td>Order No. : {{$items["orderNo"]}}</td>
                            <td>Fabric Fault : {{$items["FabricFault"]}}</td>
                        </tr>
                        <tr>
                            <td>Color : {{$items["color"]}}</td>
                            <td> Roll Shortage : {{$items["RollShortage"]}}</td>
                        </tr>
                        <tr>
                            <td>Item : {{$items["item"]}}</td>
                            <td>Production Damage : {{$items["ProductionDamage"]}}</td>
                        </tr>
                        <tr>
                            <td>Cutting Mistake : {{$items["UnstableCut"]}}</td>
                            <td>Unusable Cut Pcs : {{$items["CuttingMistake"]}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Output : {{$items["muOutput"]}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
@endsection