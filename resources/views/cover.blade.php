@extends('main')

@section('title')
    Root
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Welcome</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : a</td>
                        <td>Short / Excess monitoring : 10%</td>

                    </tr>
                    <tr>

                        <td>Item : 12</td>
                        <td>Extra booking : 20%</td>
                    </tr>
                    <tr>
                        <td>Color : White</td>
                        <td>Order to ship ratio : 10%</td>
                    </tr>
                    <tr>
                        <td>Order No. : 2</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row margin" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form>
                    <button type="submit" class="btn btn-primary btn-block">
                        Order To Cut
                    </button>
                    <button type="submit" class="btn btn-primary btn-block">
                        Recheck with Extra booking
                    </button>
                    <button type="submit" class="btn btn-primary btn-block">
                        Order To Ship
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection