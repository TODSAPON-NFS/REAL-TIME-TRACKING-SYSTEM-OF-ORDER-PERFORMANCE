@extends('main')

@section('title')
    Root
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Welcome Department of {{Session::get('dept')}}</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : {{$inputs->buyer}}</td>
                        <td>Item : {{$inputs->item}}</td>
                    </tr>
                    <tr>
                        <td>Color : {{$inputs->color}}</td>
                        <td>Order No. : {{$inputs->order}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row margin">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="{{url('cover/validate')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary btn-block" name="orderToCut" value="orderToCut">
                        Order To Cut
                    </button>
                    <button type="submit" class="btn btn-primary btn-block" name="recheck" value="recheck">
                        Recheck with Extra booking
                    </button>
                    <button type="submit" class="btn btn-primary btn-block" name="OrderToShip" value="OrderToShip">
                        Order To Ship
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection