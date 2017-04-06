@extends('main')

@section('title')
    Recheck with extra booking
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Fabric Inspection Department</h1>
        <div class="row">

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-5">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : a</td>
                            <td>Shrinkage : 100</td>
                        </tr>
                        <tr>
                            <td>Order No. : 2</td>
                            <td>Bowing : 10</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td>Fabric with fault : 1</td>
                        </tr>
                        <tr>
                            <td>Item : 12</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <!-- Fabric 1 input -->
            <div class="row">
                <h4 align="center">Shrinkage input :</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Shrinkage">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">+</button>
                            <button type="submit" class="btn btn-primary">-</button>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                </form>
            </div>

            <!-- Fabric 2 input -->
            <div class="row">
                <h4 align="center">Bowling input :</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Bowling">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">+</button>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                </form>
            </div>

            <!-- Fabric 3 input -->
            <div class="row">
                <h4 align="center">Fabric with fault input :</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Fabric with fault">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection