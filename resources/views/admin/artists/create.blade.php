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
            <form method="post" action="{{route('admin.artists.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="first_name_uz" class="form-label">{{__('artist name')}}</label>
                    <input type="text" class="form-control" id="first_name_uz" name="first_name_uz"  value="{{old('first_name_uz')}}">
                </div>
                <div class="mb-3">
                    <label for="last_name_uz" class="form-label">{{__('last_name_uz')}}</label>
                    <input type="text" class="form-control" id="last_name_uz" name="last_name_uz" value="{{old('last_name_uz')}}">
                </div>
                <div class="mb-3">
                    <label for="speciality" class="form-label">{{__('speciality')}}</label>
                    <input type="text" class="form-control" id="speciality" name="speciality" value="{{old('speciality')}}">
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">{{__('rate')}}</label>
                    <input type="text" class="form-control" id="rate" name="rate" value="{{old('rate')}}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">{{__('category_id')}}</label>
                    <input type="text" class="form-control" id="category_id" name="category_id" value="{{old('category_id')}}">
                </div>
                <div class="mb-3">
                    <label for="description_uz" class="form-label">{{__('description_uz')}}</label>
                    <input type="text" class="form-control" id="description_uz" name="description_uz" value="{{old('description_uz')}}">
                </div>
                <div class="mb-3">
                    <label for="muzey_uz" class="form-label">{{__('muzey_uz')}}</label>
                    <input type="text" class="form-control" id="muzey_uz" name="muzey_uz" value="{{old('muzey_uz')}}">
                </div>
                <div class="mb-3">
                    <label for="medal_uz" class="form-label">{{__('medal_uz')}}</label>
                    <input type="text" class="form-control" id="medal_uz" name="medal_uz" value="{{old('medal_uz')}}">
                </div>
                <div class="mb-3">
                    <label for="views" class="form-label">{{__('views')}}</label>
                    <input type="text" class="form-control" id="views" name="views" value="{{old('views')}}">
                </div>

                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </form>
        </div>
    </div>
@endsection


