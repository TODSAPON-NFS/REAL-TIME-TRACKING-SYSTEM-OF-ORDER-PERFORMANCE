@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">CAD Department</h1>


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

                        <td>Item : {{$items["item"]}}</td>
                        <td>Extra Quantity Percentage : {{$items["CutPlan"]}}</td>
                    </tr>
                    <tr>
                        <td>Color : {{$items["color"]}}</td>
                        <td>Per GMT Consumption yds: {{$items["FabricAllocation"]}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <!-- marchant1 input -->

        <div class="row">
            <h4 align="center">Cut Plan input :</h4>

            <form class="form-horizontal" action="{{url('order-to-ship/cadCutInput')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input"
                               placeholder="Cut Plan" name="CutPlan">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">
                            Save / update
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <h4 align="center">Fabric Allocation input :</h4>

            <form class="form-horizontal" action="{{url('order-to-ship/cadFabricInput')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input"
                               placeholder="Fabric Allocation" name="FabricAllocation">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">
                            Save / update
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection