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

                            <td>Item : 12</td>
                            <td>Cut No : 11</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td>Fabric Allocation : 20</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <!-- marchant1 input -->

            <div class="row">
                <h4 align="center">Cut Plan input :</h4>

                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Cut Plan">
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary">
                                Save / update
                            </button>
                        </div>
                    </div>
                </form>
        </div>

            <div class="row">
                <h4 align="center">Fabric Allocation input :</h4>

                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Fabric Allocation">
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary">
                                Save / update
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
@endsection