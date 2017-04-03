@extends('main')

@section('title')
    Merchant
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Merchandising Department</h1>
        <div class="row" style="padding-top: 20px">

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : 100</td>
                            <td>Order Quantity : 2</td>
                        </tr>
                        <tr>
                            <td>Order No. : 2</td>
                            <td>Fabric Need : 100</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td>Mock up : 100</td>
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
                <h4 align="center"><i>Input field will create or update the data </i></h4>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Fabric need">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mock up"
                                   placeholder="Mock up">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>


    </div>
@endsection
