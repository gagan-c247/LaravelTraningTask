<section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{$services->title ?? ''}}</h2>
        <p>{{$services->subtitle ?? ''}}</p>
      </header>

      <div class="row gy-4">

        {!! $services->content ?? '' !!}

      </div>

    </div>

  </section>