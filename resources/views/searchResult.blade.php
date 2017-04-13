@extends('main')

@section('title')
    Root
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : {{Session::get('buyer')}}</td>
                        <td>Item : {{Session::get('item')}}</td>
                    </tr>
                    <tr>
                        <td>Color : {{Session::get('color')}}</td>
                        <td>Order No. : {{Session::get('orderNo')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row margin">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="search/result" method="post">
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



    </div>
@endsection