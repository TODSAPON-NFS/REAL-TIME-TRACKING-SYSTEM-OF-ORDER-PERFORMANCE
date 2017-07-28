@extends('main')

@section('title')
    MU
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">MU Department</h1>
        <div class="row" style="padding-top: 20px">

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : {{$items["buyer"]}}</td>
                            <td>Increased Consumption: {{$items["IncreasedConsumption"]}}%</td>
                        </tr>
                        <tr>
                            <td>Order No. : {{$items["orderNo"]}}</td>
                            <td>Fabric Fault : {{$items["FabricFault"]}}%</td>
                        </tr>
                        <tr>
                            <td>Color : {{$items["color"]}}</td>
                            <td> Roll Shortage : {{$items["RollShortage"]}}%</td>
                        </tr>
                        <tr>
                            <td>Item : {{$items["item"]}}</td>
                            <td>Production Damage : {{$items["ProductionDamage"]}}%</td>
                        </tr>
                        <tr>
                            <td>Cutting Mistake : {{$items["CuttingMistake"]}}%</td>
                            <td>Unusable Cut Pcs : {{$items["UnstableCut"]}}%</td>
                        </tr>

                        <tr>
                            <td>Found Loses: {{$items["FoundLosses"]}}%</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <h4 align="center"><i>Input fields will create or update the data </i></h4>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <!--first input -->
                    <form class="form-horizontal" action="{{url('mu/Consumption')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                               <input type="text" class="form-control" id="input"
                                       placeholder="Increased Consumption  (%)" name="Consumption">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" name="submit" value="1" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> ADD
                                </button>
                                <button type="submit" name="submit" value="2" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span> SUB
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--second input -->
                    <form class="form-horizontal" action="{{url('mu/FabricFault')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Fabric Fault (%)" name="FabricFault">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" name="submit" value="1" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> ADD
                                </button>
                                <button type="submit" name="submit" value="2" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span> SUB
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--third input -->
                    <form class="form-horizontal" action="{{url('mu/RollShortage')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Roll Shortage (%)" name="RollShortage">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" name="submit" value="1" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> ADD
                                </button>
                                <button type="submit" name="submit" value="2" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span> SUB
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--fourth input -->
                    <form class="form-horizontal" action="{{url('mu/ProductionDamage')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Production Damage (%)" name="ProductionDamage">
                            </div>
                           <div class="col-sm-4">
                                <button type="submit" name="submit" value="1" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> ADD
                                </button>
                                <button type="submit" name="submit" value="2" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span> SUB
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--fifth input -->
                    <form class="form-horizontal" action="{{url('mu/UnstableCut')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Unusable Cut Pcs (%)" name="UnstableCut">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" name="submit" value="1" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> ADD
                                </button>
                                <button type="submit" name="submit" value="2" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span> SUB
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--sixth input -->
                    <form class="form-horizontal" action="{{url('mu/CuttingMistake')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Cutting Mistake  (%)" name="CuttingMistake">
                            </div>
                           <div class="col-sm-4">
                                <button type="submit" name="submit" value="1" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> ADD
                                </button>
                                <button type="submit" name="submit" value="2" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span> SUB
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
@endsection