@extends('main')

@section('title')
    Recheck with extra booking
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/recheckCAD.css') }}" rel="stylesheet">
@endsection

@section('ContentOfBody')
    <div class="container">
        <h1 align="center">Results</h1>
        <div class="row">

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
                            <td>Item : {{$items["item"]}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <!-- cad 5 input -->
            <div class="row">
                <h4 align="center">Marker Length (in meters) input :</h4>

                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Marker pcs</th>
                            <th>Marker length in meter</th>
                            <th>Marker Length in Yards (MY)</th>
                            <th>Shrinkage</th>
                            <th>Bowing</th>
                            <th>Lay Length</th>
                            <th>Plies</th>
                            <th>Fabric Required</th>
                            <th>Fabric Fault</th>
                            <th>Total Fabric</th>
                            <th>Pieces Cut</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $sumTF = 0;?>

                        {{--showing marker pcs and marker length from database to update--}}
                        @foreach($db  as $markerPcs)
                            <?php $my = $markerPcs["markerLengthInMeter"] * 1.09361;
                            $s = 0;
                            if ($my != 0)
                                $s = (100 * $items["Shrinkage"]) / $my;

                            $b = 0;

                            if ($my != 0)
                                $b = (100 * $items["Bowling"]) / ($my * 5);

                            $l = $my + $s + $b + 0.0218723;

                            $rf = $l * $markerPcs["Piles"];

                            $ff = 0;

                            if ($rf != 0)
                                $ff = 100 * $markerPcs["FabricFault"] / $rf;

                            $tf = $rf + $ff;

                            $pc = $items["sumMp"] * $markerPcs["Piles"];

                            $sumTF += $tf;

                            ?>

                            <tr>
                                <td>{{$markerPcs["MarkerPcs"]}}
                                <?php
                                    if($markerPcs["file"]!=NULL){
                                        echo '<a href="'.asset('files/'.$markerPcs["file"]).'" download>
                                       <span class="glyphicon glyphicon-download"></span>
                                    </a></td>';
                                    } 
                                ?>
                                
                                <td>{{$markerPcs["markerLengthInMeter"]}}</td>
                                <td><?php echo $my; ?></td>

                                <td><?php echo $s;?> </td>
                                <td><?php echo $b; ?></td>

                                <td><?php echo $l; ?></td>
                                <td><?php echo $markerPcs["Piles"]; ?></td>

                                <td><?php echo $rf; ?></td>
                                <td><?php echo $ff; ?></td>
                                <td><?php echo $tf; ?></td>
                                <td><?php echo $pc; ?></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <h4 align="center">Sum Mp : {{ $items["sumMp"]}}</h4>
                <h4 align="center">Extra Booking:
                    <?php
                    $extraBooking = 0;
                    if ($items["F"] != 0)
                        $extraBooking = (($items["F"] - $sumTF) * 100) / $items["F"];
                    echo $extraBooking . "%";
                    ?>
                </h4>

            </div>


        </div>
    </div>

    </div>
@endsection