@extends('vendor.layout',['title'=>'All Blogs'])
@section('content')
<div class="table-responsive">
    <table class="table no-wrap">
        <thead>
            <tr>
                <th class="border-top-0" width="10%">#</th>
                <th class="border-top-0" width="20%">title</th>
                <th class="border-top-0" width="40%">Content</th>
                <th class="border-top-0" width="10%">Created At</th>
                <th class="border-top-0" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($blogs) && $blogs != '')
            @foreach ($blogs as $blog)
            <tr>
                <td>{{isset($blog->id) && $blog->id != '' ?'#'.$blog->id : ''}}</td>
                <td class="txt-oflo text-capitalize">{{isset($blog->title) && $blog->title != '' ?$blog->title : ''}}</td>
                <td class="txt-oflo">{{isset($blog->content) && $blog->content != '' ? $blog->content  : ''}}</td>
                <td><span class="text-success">{{isset($blog->created_at) && $blog->created_at != '' ? Carbon\Carbon::parse($blog->created_at, 'UTC')->isoFormat(' d MMM YYYY, h:mm a') : ''}}</span></td>
                <td>
                    <a href="{{route('blog.edit',$blog->id)}}" ><i class="fa fa-edit text-dark"></i></a>
                    <a href=""><i class="fa fa-trash text-danger"></i></a>  
                </td>
            </tr> 
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection