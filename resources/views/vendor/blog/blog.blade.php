@include('vendor.layout.header')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @forelse ($blogs as $blog)
            <article class="entry">

                <div class="entry-img">
                  <img src="{{'/storage/images/'.$blog->file->filepath}}" alt="" class="img-fluid">
                </div>
  
                <h2 class="entry-title">
                  <a href="{{route('singleblog',$blog->slug)}}">{{$blog->title ?? 'title not found'}}</a>
                </h2>
  
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                  </ul>
                </div>
  
                <div class="entry-content">
                    <p>
                        {{$blog->content ?? ''}}
                    </p>
                  <div class="read-more">
                    <a href="{{route('singleblog',$blog->slug)}}">Read More</a>
                  </div>
                </div>
  
            </article><!-- End blog entry -->
            @empty
                <article class="entry">

                    <div class="entry-img">
                    <img src="https://image.shutterstock.com/image-illustration/question-mark-3d-gold-yellow-260nw-719478730.jpg" alt="" class="img-fluid">
                    </div>
    
                    <h2 class="entry-title">
                    <a href="blog-single.html" > No Blog Present yet</a>
                    </h2>
                </article>
            @endforelse
            
            @if(isset($blogs) && $blogs != [])
                <div class="blog-pagination">
                <ul class="justify-content-center">
                    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                        <li class="{{$blogs->currentPage() == $i ? 'active' : 'unactive'}}">
                            <a href="{{$blogs->url($i)}}">{{$i}}</a>
                        </li>
                    @endfor
                </ul>
                </div>
            @endif

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

           @include('vendor.blog.sidebar')

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

@include('vendor.layout.footer')