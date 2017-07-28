@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Sewing Receive Department</h1>

        
         <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Buyer : {{$items["buyer"]}}</td>
                        <td>Order No. : {{$items["orderNo"]}}</td>
                    </tr>
                    <tr>
                        <td>Color : {{$items["color"]}}</td>
                        <td>Item : {{$items["color"]}}</td>
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
                        <th>Sewing Recieve</th>
                        <th>update quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($db  as $sizes)
                        <form action="{{url('/order-to-ship/SewAddOrSub')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <tr>
                                <td>{{$sizes["Size"]}}</td>
                                <td>{{$sizes["SewingReceive"]}}</td>
                                 <input type="hidden" name="updateHiddenSize"
                                       value={{$sizes["marchant_id"]}}>
                                <td><input type="text" class="form-control" name="sizeUpdate"
                                           placeholder=""></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name = "submit" value ="add">Add</button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name = "submit" value = "sub">Sub</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection