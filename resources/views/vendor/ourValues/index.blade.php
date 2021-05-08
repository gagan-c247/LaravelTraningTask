@extends('vendor.layout',['title'=>'Our Value'])

@section('content')
{!!Form::model($value,[
    'route' => $value->exists ? ['value.update',$value->id] : ['value.store'],
    'method' => $value->exists ? 'PUT' : 'POST',
    'id'=> 'value_form_id',
    'files' => true,
    ])!!}
    <div class="form-group mb-4">
        <label for="">Title</label>
        <input type="text" name="title" value="{{$value->title ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Subtitle</label>
        <input type="text" name="subtitle" value="{{$value->subtitle ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Content</label>
        <textarea name="content" id="summernote" cols="30" rows="10">{{$value->content ?? ''}}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" >
    </div>

{{Form::close()}}
@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection