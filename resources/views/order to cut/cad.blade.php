@extends('main')

@section('title')
    CAD
@endsection

@section('ContentOfBody')
    <div class="container">


        <h1 align="center">CAD Department</h1>
        <div class="row" style="padding-top: 20px">

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : a</td>
                            <td>Cutting Wastage : 2</td>
                        </tr>
                        <tr>
                            <td>Order No. : 2</td>
                            <td>Extra Loading : 100</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td>Relaxing Shrinkage : 100</td>
                        </tr>
                        <tr>
                            <td>Item : 12</td>
                            <td>Washing Wastage : 12</td>
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
                    <form method="post" action="/input/CAD/update">

                         {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->first('CuttingWastage')) alert alert-danger @endif" id="CuttingWastage"
                                   placeholder="Cutting Wastage (%)" name="CuttingWastage">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->first('ExtraLoading')) alert alert-danger @endif" id="ExtraLoading"
                                   placeholder="Extra Loading (%)" name="ExtraLoading">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->first('RelaxingShrinkage')) alert alert-danger @endif" id="RelaxingShrinkage"
                                   placeholder="Relaxing Shrinkage (%)" name="RelaxingShrinkage">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->first('WashingWastage')) alert alert-danger @endif" id="WashingWastage"
                                   placeholder="Washing Wastage (%)" name="WashingWastage">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>

                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>


    </div>
@endsection