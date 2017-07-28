@extends('main')

@section('title')
    Delete
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Delete Data</h1>

        <!-- edit order quantity inputs  -->
        <div class="row">
            <h4 align="center">Enter order Quantity</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Buyer</th>
                        <th>Order No</th>
                        <th>Color</th>
                        <th>Item</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- showing marker pcs and marker length from database to update--}}
                    @foreach($allData  as $data)
                        <form action="{{url('/deleteData')}}" method="post"
                              onsubmit="return confirm('Do you really want to delete the data?');">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <tr>
                                <td>{{$data["Buyer"]}}</td>
                                <td>{{$data["OrderNo"]}}</td>
                                <td>{{$data["Color"]}}</td>
                                <td>{{$data["Item"]}}</td>

                                <input type="hidden" name="hiddenID"
                                       value={{$data["id"]}}>

                                <td>
                                    <button type="submit" class="btn btn-primary" name="update" value="update">
                                        Delete
                                    </button>
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