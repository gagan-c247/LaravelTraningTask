@include('vendor.layout.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{route('blogs')}}">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>{{$blog->title ?? ''}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                @if(isset($blog->file) && $blog->file->filepath != '')
                  <img src="{{'/storage/images/'.$blog->file->filepath}}" alt="" class="img-fluid">
                @else
                  <img src="https://image.shutterstock.com/image-illustration/question-mark-3d-gold-yellow-260nw-719478730.jpg" alt="" class="img-fluid">
                @endif
              
              </div>

              <h2 class="entry-title">
                <a href="{{route('singleblog',$blog->slug)}}">{{$blog->title ?? ''}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                {{$blog->content ?? ''}}
              </div>
            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
              <img src="https://static.thenounproject.com/png/17241-200.png" class="rounded-circle float-left" alt="">
              <div>
                <h4 class="text-capitalize">{{$blog->user->name ?? ''}}</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div><!-- End blog author bio -->

            <div class="blog-comments">

              <h4 class="comments-count">{{$blog->comment->count() ?? 0}} Comments</h4>

              @forelse ($blog->comment as $comment)
                <div id="comment-1" class="comment">

                  <div class="d-flex">
                    <div class="comment-img"><img src="https://res.cloudinary.com/dtbudl0yx/image/fetch/w_2000,f_auto,q_auto,c_fit/https://adamtheautomator.com/wp-content/uploads/2019/10/user-1633249_1280-768x749.png" alt=""></div>
                    <div>
                      <h5 class="text-capitalize"><a href="">{{$comment->user->name}}</a> {{--<a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a>--}}  </h5>
                      <time datetime="2020-01-01"><!--01 Jan, 2020--> {{$comment->created_at}}</time>
                      <p>
                       {{$comment->comment}}
                      </p>
                    </div>
                  </div>
                </div><!-- End comment #1 -->
              @empty
                  
              @endforelse
          

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                @if(auth()->check())
                  @foreach (['success','danger','warning'] as $session)
                      @if (Session::has($session))  
                      <div class="alert alert-{{$session}} alert-dismissible fade show" role="alert">
                          <strong>{{$session}}!</strong> {{Session::get($session)}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      @endif
                      @endforeach  
                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif
                  <form action="{{route('comment')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name*" value="{{auth()->user()->name ?? ''}}" readonly>
                      </div>
                      <div class="col-md-6 form-group">
                        <input name="email" type="text" class="form-control" placeholder="Your Email*" value="{{auth()->user()->email}}" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <input name="website" type="text" class="form-control" placeholder="Your Website">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                        <input type="hidden" name="blog_id" value="{{$blog->id ?? ""}}">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>

                  </form>
                @else
                 <a type="submit" class="btn btn-primary" href="{{route('login')}}">login</a>
                @endif

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            @include('vendor.blog.sidebar',['allcategory'=>$allcategory])

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->

@include('vendor.layout.footer')