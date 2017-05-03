@extends('main')

@section('title')
    Root
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">

        <h1 align="center">Search Data</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action='/searchResult' method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="text" class="form-control" id="input" name="buyer"
                               placeholder="Enter Buyer">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input" name="order"
                               placeholder="Enter Order No.">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input" name="color"
                               placeholder="Enter Color">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input" name="item"
                               placeholder="Enter Item">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection