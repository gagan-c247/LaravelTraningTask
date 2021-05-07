<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Blog</h2>
        <p>Recent posts form our Blog</p>
      </header>

      <div class="row">
     
        @forelse ($recentblogs as $recentblog)
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="{{isset($recentblog->file->filepath) ? url('/storage/images/'.$recentblog->file->filepath) :'https://image.shutterstock.com/image-illustration/question-mark-3d-gold-yellow-260nw-719478730.jpg' }}" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">{{$recentblog->title ?? 'Blog title didn\'t found'}}</h3>
              <a href="{{route('singleblog',$recentblog->slug)}}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @empty
          <div class="col-lg-4 offset-4">
            <div class="post-box">
              <div class="post-img"><img src="https://image.shutterstock.com/image-illustration/question-mark-3d-gold-yellow-260nw-719478730.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Insert Blog, No Blog present at a time</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto" style="pointer-events: none"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @endforelse
      

        {{-- <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
            <span class="post-date">Fri, August 28</span>
            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
            <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div> --}}

        {{-- <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
            <span class="post-date">Mon, July 11</span>
            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
            <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div> --}}

      </div>

    </div>

  </section>