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
                        <td>Short / Excess monitoring : {{$inputs->excessMonitor}}</td>
                    </tr>
                    <tr>

                        <td>Item : {{$inputs->item}}</td>
                        <td>Extra booking : 20%</td>
                    </tr>
                    <tr>
                        <td>Color : {{$inputs->color}}</td>
                        <td>Order to ship ratio : 10%</td>
                    </tr>
                    <tr>
                        <td>Order No. : {{$inputs->order}}</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row margin">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="cover/validate" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary btn-block" name="orderToCut" value="orderToCut">
                        Order To Cut
                    </button>
                    <button type="submit" class="btn btn-primary btn-block" name="recheck" value="recheck">
                        Recheck with Extra booking
                    </button>
                    <button type="submit" class="btn btn-primary btn-block">
                        Order To Ship
                    </button>

                </form>

            </div>
        </div>

        <!-- CAD 1 input -->
        <div class="row margin">
            <h4 align="center"><i>Download File: </i></h4>
            <form class="form-horizontal">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <select class="form-control" id="sel1">
                                <option selected disabled>Select a Marker pcs</option>

                                {{--?showing marker pcs from database--}}
                                @foreach($markerPcs  as $markerPc)
                                    @if($markerPc != null)
                                        <option>{{$markerPc["MarkerPcs"]}}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4"></div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"></div>

                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-block">Download</button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection