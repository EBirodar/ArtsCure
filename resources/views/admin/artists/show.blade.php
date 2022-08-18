@extends('layouts.app')
@section('content')
    <h1 class="text-center p-3">Information about computer</h1>
    <div class="container border row d-flex align-items-center " style="height: 60vh">
        <div class="img col-md-5 d-flex justify-content-center" style="height: 50%">
            <img style="height: 100%" src="../images/notebook/mbp-silver-select-202011_result-500x500.jpeg" alt="">
        </div>
        <div class="col-md-6 d-flex align-items-center " style="height: 50%">
            <table class="table table-bordered">
                <tr>
                    <td>{{__('Computer Name')}}</td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>{{__('Computer color')}}</td>
                    <td>{{$product->color}}</td>
                </tr>
                <tr>
                    <td>{{__('Computer character')}}</td>
                    <td>{{$product->character}}</td>
                </tr>
                <tr>
                    <td>{{__('Computer price')}}</td>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <td>{{__('On sale')}}</td>
                    <td>{{$product->status}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection


