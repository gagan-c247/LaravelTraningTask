<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <div class="contactus">
        <form  id="contactFormId">
           @csrf
           <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control name" placeholder="Your Name" required>
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control email" name="email" placeholder="Your Email" required>
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control subject" name="subject" placeholder="Subject" required>
            </div>

            <div class="col-md-12">
              <textarea class="form-control message" name="message" rows="6" placeholder="Message" required></textarea>
            </div>

            <div class="col-md-12 text-center">
              {{-- <div class="loading">Loading</div>
              <div class="error-message"></div> --}}
              {{-- <div class="sent-message">Your message has been sent. Thank you!</div> --}}
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
              {{-- @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif --}}
              <button class="btn btn-primary submit">Send Message</button>
            </div>

          </div>
        </form>
          </div>
        

        </div>

      </div>

    </div>

  </section>
