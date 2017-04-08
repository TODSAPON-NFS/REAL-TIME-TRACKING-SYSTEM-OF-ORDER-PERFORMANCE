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
            <div class="col-sm-4">
                <form>

                    <div class="form-group">
                        <input type="text" class="form-control" id="input"
                               placeholder="Enter Buyer">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input"
                               placeholder="Enter Order No.">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input"
                               placeholder="Enter Color">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input"
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