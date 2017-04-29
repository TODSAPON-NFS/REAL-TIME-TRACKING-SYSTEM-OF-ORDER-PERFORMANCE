@extends('main')

@section('title')
    Home
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Home</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="/login" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <select class="form-control" name="department">
                            <option selected disabled>Select a Department</option>
                            <option>Merchandising</option>
                            <option>CAD</option>
                            <option>Store</option>
                            <option>MU</option>
                            <option>Fabric</option>
                            <option>Packing</option>
                            <option>Cutting</option>
                            <option>Finishing</option>
                            <option>Sewing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password"
                               placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                    <a href="/search" class="btn btn-primary btn-block" role="button">Search</a>

                </form>
            </div>
        </div>

    </div>
@endsection