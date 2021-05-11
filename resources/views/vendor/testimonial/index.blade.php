@extends('vendor.layout',['title'=>'Testimonial'])
@section('header')
    
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="20%">Name</th>
                <th width="40%">Content</th>
                <th width="20%">Created At</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($testimonials as $testimonial)
          <tr>
              <td>{{$testimonial->name}}</td>
              <td>{{$testimonial->content}}</td>
              <td>{{$testimonial->created_at}}</td>
              <td>
                  <a href="{{route('testimonial.edit',$testimonial->id)}}"><i class="fa fa-edit"></i></a>
                  <a href=""><i class="fa fa-trash"></i></a>
              </td>
          </tr>
              
          @empty
              
          @endforelse
        </tbody>
    </table>
@endsection
@section('footer')
    
@endsection