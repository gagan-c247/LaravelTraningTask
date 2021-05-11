<div class="sidebar">

    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
      {{-- <form action=""> --}}
        <input type="text" class="blogsearch" placeholder="">
        <a href="{{route('blogs')}}"> <span class="bg bg-primary text-white p-2"><i class="fa fa-undo"></i></span></button> 
      {{-- </form> --}}
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
      <ul>
          @forelse ($allcategory as $category)
          <li><a href="{{route('blogCategory',$category->id)}}">{{$category->name}} <span>({{$category->blog->count()}})</span></a></li>
          @empty
              
          @endforelse
       
      </ul>
    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">
        @forelse ($recentblogs as $recentblog)
            <div class="post-item clearfix">
                <img src="{{'/storage/images/'.$recentblog->file->filepath ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Question_mark_%28black%29.svg/200px-Question_mark_%28black%29.svg.png' }}" alt="">
                <h4><a href="{{route('singleblog',$recentblog->slug)}}">{{$recentblog->title ?? ''}}</a></h4>
                <time datetime="2020-01-01"><!--Jan 1, 2020--> {{$recentblog->created_at ?? ''}}</time>
            </div>
        @empty
            <div class="post-item clearfix">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Question_mark_%28black%29.svg/200px-Question_mark_%28black%29.svg.png" alt="">
                <h4><a href="">No Blog</a></h4>
                <time datetime="2020-01-01">###</time>
            </div>  
        @endforelse
      

      

    </div><!-- End sidebar recent posts-->

    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
      <ul>
        <li><a href="#">App</a></li>
        <li><a href="#">IT</a></li>
        <li><a href="#">Business</a></li>
        <li><a href="#">Mac</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Office</a></li>
        <li><a href="#">Creative</a></li>
        <li><a href="#">Studio</a></li>
        <li><a href="#">Smart</a></li>
        <li><a href="#">Tips</a></li>
        <li><a href="#">Marketing</a></li>
      </ul>
    </div><!-- End sidebar tags-->

  </div><!-- End sidebar -->