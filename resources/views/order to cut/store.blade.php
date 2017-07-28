@extends('main')

@section('title')
    Store
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Store Department</h1>
        <div class="row" style="padding-top: 20px">

            <div class="row">
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
                            <td>Fabric Inspection : {{$items["output"]}}%</td>
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
                <h4 align="center"><i>Input fields will create or update the data </i></h4>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="{{url('order-to-cut/store/update')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="AvailableFabricYards"
                                   placeholder="Available Fabric Yards">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="AvailableFabricRolls"
                                   placeholder="Available Fabric Rolls">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="option">
                                <option selected disabled>Select a option</option>
                                <option>Non Wash</option>
                                <option>Wash</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>


    </div>
@endsection