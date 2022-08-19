@extends('layouts.admin')
@section('content')
    <h1 class="text-center p-3">{{__('Update Item')}}</h1>
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('admin.tools.update',$tool->id)}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name_uz" class="form-label">{{__('tool name')}}</label>
                    <input type="text" class="form-control" id="name_uz" name="name_uz"  value="{{$tool->name_uz}}">
                </div>
                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
            </form>
        </div>
    </div>
@endsection


