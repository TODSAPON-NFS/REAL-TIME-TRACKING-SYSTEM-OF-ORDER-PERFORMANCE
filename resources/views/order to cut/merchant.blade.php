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
                            <td>Buyer : {{$items["buyer"]}}</td>
                            <td>Order Quantity : {{$items["OrderQuantity"]}}</td>
                        </tr>
                        <tr>
                            <td>Order No. : {{$items["orderNo"]}}</td>
                            <td>Fabric Need : {{$items["fabricNeed"]}}</td>
                        </tr>
                        <tr>
                            <td>Color : {{$items["color"]}}</td>
                            <td>Mock up Input: {{$items["mockUpInput"]}}%</td>
                        </tr>
                        <tr>
                            <td>Item : {{$items["item"]}}</td>
                            <td>Mock up Output : {{$items["mockUpOutput"]}}%</td>
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
                    <form class="form-horizontal" action="/order-to-cut/merchant/update" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="orderQuantity"
                                       placeholder="Order Quantity">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary" name="submit"
                                        value="updateOrderQuantity">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--second input -->
                    <form class="form-horizontal" method="post" action="/order-to-cut/merchant/update">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fabricNeed"
                                       placeholder="Fabric Need">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary" name="submit"
                                        value="updateFabricNeed">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--third input -->
                    <form class="form-horizontal" method="post" action="/order-to-cut/merchant/update">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="mockUpInput"
                                       placeholder="Mock Up">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary" name="submit"
                                        value="updateMockUpInput">
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
