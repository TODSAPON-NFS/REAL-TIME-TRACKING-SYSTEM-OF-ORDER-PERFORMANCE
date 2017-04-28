@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Cutting Department</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : a</td>
                        <td>Order No. : 2</td>
                    </tr>
                    <tr>
                        <td>Color : White</td>
                        <td>Item : 12</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <!-- cut inputs  -->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sizes</th>
                        <th>Inputs</th>
                        <th>Cut Quantity Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>500</td>
                        <td>10</td>
                        <td><input type="text" class="form-control" id="mock up"
                                   placeholder=""></td>
                        <td>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Sub</button>
                        </td>

                    </tr>
                    <tr>
                        <td>500</td>
                        <td>10</td>
                        <td><input type="text" class="form-control" id="mock up"
                                   placeholder=""></td>
                        <td>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Sub</button>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection