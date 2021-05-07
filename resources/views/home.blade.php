@extends('vendor.layout')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <form method="post">
                {{-- <textarea id="summernote" name="editordata"></textarea> --}}

                <textarea name="editor1"></textarea>
              </form>
           
        </div>
    </div>

@endsection
@section('footer')
{{-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> --}}

<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection