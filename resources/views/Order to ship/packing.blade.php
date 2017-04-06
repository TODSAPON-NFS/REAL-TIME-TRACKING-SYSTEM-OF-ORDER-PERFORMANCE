@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Packing Department</h1>

        <div class="row">

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Buyer : a</td>
                            <td>Order No. : 2</td>
                        </tr>
                        <tr>
                            <td>Color : White</td>
                            <td>Item : 12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
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
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Sub</button>
                            </td>

                        </tr>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Sub</button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="row">
                <h4 align="center">Country input :</h4>

                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="input"
                                   placeholder="Country Name : ">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary">
                                ADD
                            </button>
                            <button type="button" class="btn btn-primary">
                                EDIT
                            </button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
            </div>

            <!-- Country data input -->
            <div class="row">
                <h3 align="center">Country : China</h3>
                <h4 align="center">Shipment Date : 11/11/2017</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="date" id="date" placeholder="Enter Date">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary">
                                ADD / Update
                            </button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Size</th>
                            <th>Inputs</th>
                            <th>Update Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>

            <!-- Country data input -->
            <div class="row">
                <h3 align="center">Country : United Kingdom</h3>
                <h4 align="center">Shipment Date : 11/11/2017</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="date" id="date" placeholder="Enter Date">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary">
                                ADD / Update
                            </button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Size</th>
                            <th>Inputs</th>
                            <th>Update Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        <tr>
                            <td>500</td>
                            <td>10</td>
                            <td><input type="text" class="form-control" id="mock up"
                                       placeholder=""></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>
    </div>
@endsection