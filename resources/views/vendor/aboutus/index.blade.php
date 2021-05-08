@extends('vendor.layout',['title'=>'About us'])

@section('content')
{!!Form::model($about,[
    'route' => $about->exists ? ['about.update',$about->id] : ['about.store'],
    'method' => $about->exists ? 'PUT' : 'POST',
    'id'=> 'service_form_id',
    'files' => true,
    ])!!}
    <div class="form-group mb-4">
        <label for="">Title</label>
        <input type="text" name="title" value="{{$about->title ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Subtitle</label>
        <input type="text" name="subtitle" value="{{$about->subtitle ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Content</label>
        <textarea name="content" id="summernote" cols="30" rows="10">{{$about->content ?? ''}}</textarea>
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