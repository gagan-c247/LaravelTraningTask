<section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Team</h2>
        <p>Our hard working team</p>
      </header>

      <div class="row gy-4">

        @forelse ($teams as $team)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="{{'/storage/images/'.$team->file->filepath}}" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://{{json_decode($team->value)->{'twitter'} }}"><i class="bi bi-twitter"></i></a>
                  <a href="https://{{json_decode($team->value)->{'facebook'} }}"><i class="bi bi-facebook"></i></a>
                  <a href="https://{{json_decode($team->value)->{'instagram'} }}"><i class="bi bi-instagram"></i></a>
                  <a href="https://{{json_decode($team->value)->{'linkdin'} }}"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{$team->title ?? '' }}</h4>
                <span>{{$team->subtitle ?? ''}}</span>
                <p>{!! $team->content ?? '' !!}</p>
              </div>
            </div>
          </div>
        @empty
          <div class="offset-4 col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
              </div>
            </div>
          </div>
        @endforelse
        

       

      </div>

    </div>

  </section>