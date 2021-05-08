@extends('vendor.layout',['title'=>'services'])

@section('content')
{!!Form::model($service,[
    'route' => $service->exists ? ['service.update',$service->id] : ['service.store'],
    'method' => $service->exists ? 'PUT' : 'POST',
    'id'=> 'service_form_id',
    'files' => true,
    ])!!}
    <div class="form-group mb-4">
        <label for="">Name</label>
        <input type="text" name="title" value="{{$service->title ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Subtitle</label>
        <input type="text" name="subtitle" value="{{$service->subtitle ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Content</label>
        <textarea name="content" id="summernote" cols="30" rows="10">{{$service->content ?? ''}}</textarea>
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