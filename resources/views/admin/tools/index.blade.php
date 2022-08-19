@extends('layouts.admin ')
@section('content')
    <div class="container">
        <table class="table">
            <caption>List of tools</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{_('name_uz')}}</th>
                <th colspan="3" class="text-center" scope="col">{{__('Actions')}}</th>

            </tr>
            </thead>
            <tbody>
            <div class="d-flex flex-row-reverse"><a href="{{route('admin.tools.create')}}" class="btn bg-primary text-white m-3 ">{{__('Add Item')}}</a></div>
            @foreach($tools as $tool)
                <tr>
                    <th scope="row">{{($tools->currentpage()-1)*$tools->perpage()+$loop->index+1}}</th>
                    <td>{{$tool->name_uz}}</td>
                    <td>
                        <a href="{{route('admin.tools.show',$tool->id)}}">
                            <i class="fa fa-eye"  aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.tools.edit',['tool'=>$tool->id])}}">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('admin.tools.destroy',['tool'=>$tool->id])}}">
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

        {{$tools->links()}}
    </div>
@endsection

