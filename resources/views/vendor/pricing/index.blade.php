@extends('vendor.layout',['title'=>'pricing'])

@section('content')
{!!Form::model($price,[
    'route' => $price->exists ? ['price.update',$price->id] : ['price.store'],
    'method' => $price->exists ? 'PUT' : 'POST',
    'id'=> 'price_form_id',
    'files' => true,
    ])!!}
    <div class="form-group mb-4">
        <label for="">Title</label>
        <input type="text" name="title" value="{{$price->title ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Subtitle</label>
        <input type="text" name="subtitle" value="{{$price->subtitle ?? ''}}" class="form-control">
    </div>
    <div class="form-group mb-4">
        <label for="">Content</label>
        <textarea name="content" id="summernote" cols="30" rows="10">{{$price->content ?? ''}}</textarea>
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