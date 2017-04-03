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

                    <!--first input -->
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Increased Consumption  (%)">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--second input -->
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="input"
                                       placeholder="Fabric Fault (%)">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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
