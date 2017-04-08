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
                            <td>Buyer : a</td>
                            <td>Increased Consumption: 2</td>
                        </tr>
                        <tr>
                            <td>Order No. : 2</td>
                            <td>Fabric Fault : 100</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td> Roll Shortage</td>
                        </tr>
                        <tr>
                            <td>Item : 12</td>
                            <td>Production Damage</td>
                        </tr>
                        <tr>
                            <td>Cutting Mistake</td>
                            <td>Unusable Cut Pcs</td>
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
                    <form class="form-horizontal" action='/mu/Consumption' method="post">
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
                    <form class="form-horizontal" action='/mu/FabricFault' method="post">
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
                    <form class="form-horizontal" action='/mu/RollShortage' method="post">
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
                    <form class="form-horizontal" action='/mu/ProductionDamage' method="post">
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
                    <form class="form-horizontal" action='/mu/UnstableCut' method="post">
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
                    <form class="form-horizontal" action='/mu/CuttingMistake' method="post">
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