@extends('layouts.master')
@section('content')
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <style rel="stylesheet">
        .switch-toggle {
            width: 5em;
        }

        .switch-toggle label:not(.disabled) {
            cursor: pointer;
        }
    </style>
    <section class="content-section text-center">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                @if(!empty($data))
                    <div id="change">
                        <table class="table-bordered table" id="content">
                            <tr>
                                <td>No.</td>
                                <td>Siswa</td>
                                <td>Satus</td>
                            </tr>
                            <?php $i=0;?>
                            @foreach($data as $val)
                                <?php $i++;?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$val->nama}}</td>
                                    <td>
                                        {{--<div class="switch-toggle switch-3 ">--}}
                                        {{--<input id="alpha" name="state-d" type="radio"  @if($val->status == "A") checked="checked" @else checked="" @endif value="A" onclick="sendUpdate(this)"/>--}}
                                        {{--<label for="alpha" >A</label>--}}

                                        {{--<input id="ijin" name="state-d" type="radio"  @if($val->status == "I") checked="checked" @else checked="" @endif value="I" onclick="sendUpdate(this)"/>--}}
                                        {{--<label for="ijin">I</label>--}}

                                        {{--<input id="hadir" name="state-d" type="radio"  @if($val->status == "H") checked="checked" @else checked="" @endif value="H" onclick="sendUpdate(this)"/>--}}
                                        {{--<label for="hadir">H</label>--}}
                                        {{--</div>--}}
                                        <div class="btn-group btn-toggle">
                                            <button class="btn btn-lg @if($val->status == "A") active btn-primary @else btn-default @endif" value="A" onclick="sendUpdate(this,'{{$val->id}}')" >A</button>
                                            <button class="btn btn-lg @if($val->status == "I") active btn-primary @else btn-default @endif" value="I"  onclick="sendUpdate(this,'{{$val->id}}')">I</button>
                                            <button class="btn btn-lg @if($val->status == "H") active btn-primary @else btn-default @endif" value="H" onclick="sendUpdate(this,'{{$val->id}}')" >H</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <br>
                    <a href="{{route('user.close-absence')}}"><button type="submit" name="submit" class="btn btn-sm btn-danger">Tutup</button></a>
                @else
                    <div class="panel panel-default">
                        <div class="panel-body center bg-danger">Tidak Ada Data</div>
                    </div>
                @endif
            </div>
            <script>
                function sendUpdate(elem,data) {
                    $stat =$(elem).attr("value");
                    console.log($stat);
                    $.post('{{route('user.update-absence')}}',{id:data, detail:$stat,'_token':'{{csrf_token()}}'},function (data,status) {
                        if (status){
                            $("#change").load('{{route('user.absence')}}' + ' #content');
                        }
                    });
                }

            </script>
        </div>
    </section>
@endsection
