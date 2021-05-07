@extends('vendor.layout',['title'=>$testimonial->exists ? 'Edit Testimonial' : 'Create Testimonial'])
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
{!!Form::model($testimonial,[
    'route'=> $testimonial->exists ? ['testimonial.update',$testimonial->id] : ['testimonial.store'],
    'method'=>$testimonial->exists ? 'PUT' : 'POST',
    'id' => 'form_blog_id',
    'files' => true
])!!}
    <div class="row">
        <div class="col-md-8">
            <div class="form-group mb-4">
                <label for="" class="mb-1">Name</label>
                <input type="text" name="name" class="form-control" value="{{$testimonial->name ?? ''}}">
            </div>
            <div class="form-group mb-4">
                <label for="" class="mb-1">Content</label>
                <textarea  name="content" rows="8" class="form-control">{{$testimonial->content ?? ''}}</textarea>
            </div>
            <div class="form-group mb-4">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
        <div class="col-md-4">
            <div class="circle upload-button mt-3">
                <!-- User Profile Image -->
                
                    @if(isset($testimonial->file) && $testimonial->file->filepath != '')
                        <img class="profile-pic" src="{{'/storage/images/'.$testimonial->file->filepath}}">
                    @else 
                        <img class="profile-pic" src="https://support.grasshopper.com/assets/images/care/topnav/default-user-avatar.jpg">
                    @endif  
                
                <!-- Default Image -->
                {{-- <i class="fa fa-user fa-5x"></i>  --}}
              </div>
              <div class="p-image">
                {{-- <i class="fa fa-camera upload-button"></i> --}}
                 <input class="file-upload" name="profile_image" type="file" accept="image/*"/>
              </div>
        </div>
    </div>
{{Form::close()}}
@endsection
@section('footer')
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