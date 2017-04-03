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
                            <td>Buyer : a</td>
                            <td>Available Fabric Yards: 2</td>
                        </tr>
                        <tr>
                            <td>Order No. : 2</td>
                            <td>Available Fabric Rolls : 100</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Item : 12</td>
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
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Available Fabric Yards">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mock up"
                                   placeholder="Available Fabric Rolls">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="sel1">
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