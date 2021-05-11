@extends('vendor.layout',['title'=>'Team Meamber'])
@section('content')
<div class="row">
    <div class="col-md-12 text-end ">
        <div class="" style="margin-right: 40px;">
            <a href="{{route('team.create')}}" class="btn btn-primary">Add</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table no-wrap table-striped">
        <thead>
            <tr>
                <th class="border-top-0" width="15%">Name</th>
                <th class="border-top-0" width="20%">Designation</th>
                <th class="border-top-0" width="35%">Bio</th>
                <th class="border-top-0" width="10%">Created At</th>
                <th class="border-top-0" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($teams) && $teams != '')
            @foreach ($teams as $team)
            <tr>
                <td>{{isset($team->title) && $team->title != '' ?$team->title : ''}}</td>
                <td class="txt-oflo text-capitalize">{{isset($team->subtitle) && $team->subtitle != '' ?$team->subtitle : ''}}</td>
                <td class="txt-oflo">{!!isset($team->content) && $team->content != '' ? $team->content  : ''!!}</td>
                <td><span class="text-success">{{isset($team->created_at) && $team->created_at != '' ? Carbon\Carbon::parse($team->created_at, 'UTC')->isoFormat(' d MMM YYYY, h:mm a') : ''}}</span></td>
                <td>
                    <a href="{{route('team.edit',$team->id)}}" ><i class="fa fa-edit text-dark"></i></a>
                    <a href=""><i class="fa fa-trash text-danger"></i></a>  
                </td>
            </tr> 
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection