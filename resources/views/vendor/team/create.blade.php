@extends('vendor.layout',['title'=>'our Team'])
@section('header')
    <style>
        .profile-pic {
            /* max-width: 200px; */
            max-height: 200px;
            display: block;
        }
        .file-upload {
            display: none;
        }
        .circle {
            /* border-radius: 1000px !important; */
            overflow: hidden;
            width: 100%;
            height: auto;
            /* border: 8px solid rgba(100, 43, 43, 0.7); */
            /* position: absolute;   */
            top: 72px;
        }
        img.profile-pic{
            border-radius: 20px !important;
            max-width: 100%;
            width: 100%;
            height: auto;
        }
        .p-image {
        /* position: absolute;
        top: 167px;
        right: 30px; */
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }
        .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }
        .upload-button {
        font-size: 1.2em;
        }
        .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
        }
    </style>
@endsection
@section('content')
{!!Form::model($team,[
    'route' => $team->exists ? ['team.update',$team->id] : ['team.store'],
    'method' => $team->exists ? 'PUT' : 'POST',
    'id'=> 'team_form_id',
    'files' => true,
    ])!!}
    <div class="row">
        <div class="col-md-8">
            <div class="form-group mb-4">
                <label for="">Name</label>
                <input type="text" name="title" value="{{$team->title ?? ''}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="">Designation</label>
                <input type="text" name="subtitle" value="{{$team->subtitle ?? ''}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="">Bio</label>
                <textarea name="content" id="summernote" cols="30" rows="10">{{$team->content ?? ''}}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="circle upload-button mb-3">
                <!-- User Profile Image -->
                @if(isset($team->file) && $team->file->filepath != '')
                    <img class="profile-pic" src="{{'/storage/images/'.$team->file->filepath}}">
                @else 
                    <img class="profile-pic" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT64gAy5EStuM7QbJJAAcigv4rIAsUZk6xJQIhBrufeUlaaTE1mhRRZOBwiOAn83ifBQlY&usqp=CAU">
                @endif
                
                <!-- Default Image -->
                {{-- <i class="fa fa-user fa-5x"></i>  --}}
              </div>
              <div class="p-image">
                {{-- <i class="fa fa-camera upload-button"></i> --}}
                 <input class="file-upload" name="profile" type="file" accept="image/*"/>
              </div>
            <div class="form-group mb-4">
                <label for="">Twitter</label>
                <input type="text" name="twitter" value="{{json_decode($team->value)->{'twitter'} ?? ''}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="">Facebook</label>
                <input type="text" name="facebook" value="{{json_decode($team->value)->{'facebook'} ?? ''}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="">Instagram</label>
                <input type="text" name="instagram" value="{{json_decode($team->value)->{'instagram'} ?? ''}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="">Linkdin</label>
                <input type="text" name="linkdin" value="{{json_decode($team->value)->{'linkdin'} ?? ''}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" >
            </div>
        </div>
    </div>
{{Form::close()}}
@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
        $(".file-upload").click();
        });
    });
</script>

@endsection