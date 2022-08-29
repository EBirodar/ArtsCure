@extends('layouts.admin')
@section('content')
{{--    <h1 class="text-center p-3">{{__('Update Item')}}</h1>--}}
    <div class="row">
        <div class="col-md-6">
{{--            @if ($errors->any())--}}
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
{{--            @endif--}}
            <form method="post" action="{{route('admin.artists.update',$artist->id)}}">
                @method('PUT')
                @csrf                <div class="mb-3">
                    <label for="first_name_uz" class="form-label">{{__('artist name')}}</label>
                    <input type="text" class="form-control" id="first_name_uz" name="first_name_uz"  value="{{$artist->first_name_uz}}">
                </div>
                <div class="mb-3">
                    <label for="last_name_uz" class="form-label">{{__('last_name_uz')}}</label>
                    <input type="text" class="form-control" id="last_name_uz" name="last_name_uz" value="{{$artist->last_name_uz}}">
                </div>
                <div class="mb-3">
                    <label for="speciality" class="form-label">{{__('speciality')}}</label>
                    <input type="text" class="form-control" id="speciality" name="speciality" value="{{$artist->speciality}}">
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">{{__('rate')}}</label>
                    <input type="text" class="form-control" id="rate" name="rate" value="{{$artist->rate}}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">{{__('category_id')}}</label>
                    <input type="text" class="form-control" id="category_id" name="category_id" value="{{$artist->category_id}}">
                </div>
                <div class=" row justify-content-center">
                    <strong>Tool List</strong>
                    <select id='myselect'
                            multiple name="tools[]">
                        @foreach($toolList as $tool)
                            <option @if(in_array($tool->id, $tool_ids)) selected @endif value="{{$tool->id}}">{{$tool->name_uz}}</option>
                        @endforeach
{{--                        @foreach($artist->tools() as $tool)--}}
{{--                            <option value="{{$tool->id}}">{{$tool->name_uz}}</option>--}}
{{--                        @endforeach--}}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description_uz" class="form-label">{{__('description_uz')}}</label>
                    <input type="text" class="form-control" id="description_uz" name="description_uz" value="{{$artist->description_uz}}">
                </div>
                <div class="mb-3">
                    <label for="muzey_uz" class="form-label">{{__('muzey_uz')}}</label>
                    <input type="text" class="form-control" id="muzey_uz" name="muzey_uz" value="{{$artist->muzey_uz}}">
                </div>
                <div class="mb-3">
                    <label for="medal_uz" class="form-label">{{__('medal_uz')}}</label>
                    <input type="text" class="form-control" id="medal_uz" name="medal_uz" value="{{$artist->medal_uz}}">
                </div>
                <div class="mb-3">
                    <label for="views" class="form-label">{{__('views')}}</label>
                    <input type="text" class="form-control" id="views" name="views" value="{{$artist->views}}">
                </div>

                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
            </form>
        </div>
    </div>
    <script>
        @php
        @endphp
        $('#myselect').select2({
            placeholder: "Select a pill",
            data: function() { return {results: "{{$toolList}}"}; }
        });
    </script>
@endsection


