@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Rejection Department</h1>
        <div class="row">
            <div class="col-sm-4">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : {{$items["buyer"]}}</td>
                        <td>Order No. : {{$items["orderNo"]}}</td>
                    </tr>
                    <tr>
                        <td>Color : {{$items["color"]}}</td>
                        <td>Item : {{$items["item"]}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <!-- cut inputs  -->
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sizes</th>
                            <th>Inputs</th>
                            <th>update quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data  as $sizes)
                            <tr>
                                <form method="post" action="/order-to-ship/rejection/update">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                                   <input type="hidden" name="size" value="{{$sizes["Size"]}}">
                                    <td>{{$sizes["Size"]}}</td>
                                    <td>{{$sizes["Rejection"]}}</td>
                                    <td><input type="text" class="form-control" name="rejectionValue" 
                                               placeholder="0.000"></td>
                                    <td>
                                        <button type="submit"  name="actype" class="btn btn-primary" value="add">Add</button>
                                    </td>
                                    <td>
                                        <button type="submit" name="actype" class="btn btn-primary" value="sub">Sub</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection