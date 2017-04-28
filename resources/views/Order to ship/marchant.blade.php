@extends('main')

@section('title')
    Order to ship
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Merchandising Department</h1>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
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
            <div class="col-sm-2"></div>
        </div>

        <!-- marchant1 input -->

        <div class="row">
            <h4 align="center"> Size input :</h4>

            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input"
                               placeholder="Sizes">
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary">
                            ADD
                        </button>
                        <button type="button" class="btn btn-primary">
                            View / Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>


    {{--  <!-- marchant 2 input -->
      <div class="row">
          <h4 align="center">order quantity input :</h4>
          <div class="col-sm-4"></div>
          <div class="col-sm-5">
              <form class=>

                  <div class="form-group">
                      <select class="form-control" id="sel1">
                          <option selected disabled>Select a Size</option>
                          <option>500</option>
                          <option>100</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" id="mock up"
                             placeholder="Order Quantity">
                  </div>


                  <button type="submit" class="btn btn-primary btn-block">Save</button>
                  <button type="submit" class="btn btn-primary btn-block">View / Edit data</button>
              </form>
          </div>
          <div class="col-sm-3"></div>
      </div>--}}

    <!-- edit order quantity inputs  -->
        <div class="row">
            <h4 align="center">Enter order Quantity</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sizes</th>
                        <th>Order quantity</th>
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
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">SUB</button>
                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>


        <!-- edit option for sizespcs -->
        <div class="row">
            <h4 align="center">Edit Sizes</h4>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Marker pcs</th>
                        <th>Update Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>500</td>
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
                        <td><input type="text" class="form-control" id="mock up"
                                   placeholder=""></td>
                        <td>
                            <button type="submit" class="btn btn-default">Update</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default">Delete</button>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection