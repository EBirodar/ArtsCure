@extends('layouts.admin')
@section('content')
    <h1 class="text-center p-3">Information about computer</h1>
    <div class="container border row d-flex align-items-center " style="height: 60vh">
        <div class="img col-md-5 d-flex justify-content-center" style="height: 50%">
            <img style="height: 100%" src="../images/notebook/mbp-silver-select-202011_result-500x500.jpeg" alt="">
        </div>
        <div class="col-md-6 d-flex align-items-center " style="height: 50%">
            <table class="table table-bordered">
                <tr>
                    <td>{{__('Tool Name')}}</td>
                    <td>{{$tool->name_uz}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection


