  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@yield('footer')


<script>
  
    $('.submit').on('click',function(e){
      var name = $('.name').val();
      var email = $('.email').val();
      var subject = $('.subject').val();
      var message = $('.message').val();
    
      console.log(name);
      $.ajax({
        method: "post",
        url: "/contact/stores",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {_token:'{{ csrf_token() }}',name:name,email:email,subject:subject,message:message},
        dataType: "JSON",
        success:function(data){
          if(data.status == 'success'){
            console.log(data);
            window. location. reload(); 
          }
        }
        
      });

    });

</script>

<script>
   $(document).ready(function(){

    var search = function(){
      // alert();

      $.ajax({
        method: "Post",
        url: "{{route('blogsearch')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { search: $('.blogsearch').val()},
        dataType: "JSON",
        success: function(data){
                  if(data.status == 'success'){
                      $('.entries').html(data.blog);
                  }
                }
      });
    }
    $('.blogsearch').change(search);
    $('.blogsearch').keypress(search);
 });
</script>