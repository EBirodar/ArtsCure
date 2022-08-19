@extends('layouts.admin')
@section('content')
    <h1 class="text-center p-3">{{__('Create Item')}}</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('admin.tools.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name_uz" class="form-label">{{__('tool name')}}</label>
                    <input type="text" class="form-control" id="name_uz" name="name_uz"  value="{{old('name')}}">
                </div>

                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </form>
        </div>
    </div>
@endsection


