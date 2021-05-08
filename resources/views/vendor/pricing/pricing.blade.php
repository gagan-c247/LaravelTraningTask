<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{$price->title ?? 'Pricing'}}</h2>
        <p>{{$price->subtitle ?? 'Check our Pricing'}}</p>
      </header>

      <div class="row gy-4" data-aos="fade-left">

        {!! $price->content ?? "" !!}

      </div>

    </div>

  </section>