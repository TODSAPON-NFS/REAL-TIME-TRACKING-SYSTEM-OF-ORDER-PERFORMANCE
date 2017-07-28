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
                            <td>Buyer :{{$items["buyer"]}}</td>
                            <td>Shrinkage :
                                @if($items["shrinkage"] > 0)
                                    -{{$items["shrinkage"]}}
                                @else
                                    +<?php echo $items["shrinkage"] * -1; ?>
                                @endif

                                %
                            </td>
                        </tr>
                        <tr>
                            <td>Order No. : {{$items["orderNo"]}}</td>
                            <td>Bowing : {{$items["bowling"]}}%</td>
                        </tr>
                        <tr>
                            <td>Color : {{$items["color"]}}</td>
                            <td>Fabric with fault : {{$items["fabricFault"]}}%</td>
                        </tr>
                        <tr>
                            <td>Item : {{$items["item"]}}</td>
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
                <form class="form-horizontal" action="{{url('recheck/fabric/shrinkage')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Shrinkage" name="shrinkage">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" name="submit" class="btn btn-primary" value="1">+</button>
                            <button type="submit" name="submit" class="btn btn-primary" value="2">-</button>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                </form>
            </div>

            <!-- Fabric 2 input -->
            <div class="row">
                <h4 align="center">Bowing input :</h4>
                <form class="form-horizontal" action="{{url('recheck/fabric/bowling')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Bowling" name="bowling">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">-</button>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                </form>
            </div>

            <!-- Fabric 3 input -->
            <div class="row">
                <h4 align="center">Fabric with fault input :</h4>
                <form class="form-horizontal" action="{{url('recheck/fabric/fault')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Fabric with fault" name="fault">
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