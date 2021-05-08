<section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{$value->title ?? 'Our Values'}}</h2>
        <p>{{$value->subtitle ?? 'Odit est perspiciatis laborum et dicta'}}</p>
      </header>

      <div class="row">

        {!! $value->content ?? ' data not found ' !!}

      </div>

    </div>

  </section>