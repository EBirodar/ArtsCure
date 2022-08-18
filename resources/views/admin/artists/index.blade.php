@extends('layouts.admin ')
@section('content')
    <div class="container">
        <table class="table">
            <caption>List of artists</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{_('first-name_uz')}}</th>
                <th scope="col">{{__('last-name_uz')}}</th>
                <th scope="col">{{__('speciality')}}</th>
                <th scope="col">{{__('rate')}}</th>
                <th scope="col">{{__('category_id')}}</th>
                <th scope="col">{{__('description_uz')}}</th>
                <th scope="col">{{__('muzey_uz')}}</th>
                <th scope="col">{{__('medal_uz')}}</th>
                <th scope="col">{{__('views')}}</th>
                <th colspan="3" class="text-center" scope="col">{{__('Actions')}}</th>

            </tr>
            </thead>
            <tbody>
            <div class="d-flex flex-row-reverse"><a href="{{route('admin.artists.create')}}" class="btn bg-primary text-white m-3 ">{{__('Add Item')}}</a></div>
            @foreach($artists as $artist)
                <tr>
                    <th scope="row">{{($artists->currentpage()-1)*$artists->perpage()+$loop->index+1}}</th>
                    <td>{{$artist->first_name_uz}}</td>
                    <td style="width: 100px; height: 100px;"><img style="width: 100%; height: 100%;"  src="./images/notebook/mbp-silver-select-202011_result-500x500.jpeg"></td>
                    <td>{{$artist->last_name_uz}}</td>
                    <td>{{$artist->rate}}</td>
                    <td>{{$artist->category_id}}</td>
                    <td>{{$artist->description_uz}}</td>
                    <td>{{$artist->muzey_uz}}</td>
                    <td>{{$artist->medal_uz}}</td>
                    <td>{{$artist->views}}</td>
                    <td>
                        <a href="{{route('admin.artists.show',$artist->id)}}">
                            <i class="fa fa-eye"  aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.artists.edit',['artist'=>$artist->id])}}">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('admin.artists.destroy',['artist'=>$artists->id])}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">

                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            </button>

                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

        {{$artists->links()}}
    </div>
@endsection

