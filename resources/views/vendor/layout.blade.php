@include('vendor.layout.header')
<main>
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4">
                   @include('vendor.layout.sidemenu')
                </div>
                <div class="col-md-8">
                    <h1 class="text-center mb-4 font-weight-bold text-primary text-capitalize">{{ $title ?? ''}}</h1>
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
                    @yield('content')
                </div>
            </div>
            
        </div>
    </section>
</main>
@include('vendor.layout.footer')





