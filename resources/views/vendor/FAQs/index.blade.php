@extends('vendor.layout',['title'=>'FAQs'])

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h3>{{$faq->exists ? 'Edit' : 'Create'}} FAQ</h3>
            {!!Form::model($faq,[
                'route' => $faq->exists ? ['faq.update',$faq->id] : ['faq.store'],
                'method' => $faq->exists ? 'PUT' : 'POST',
                'id'=> 'faq_form_id',
                'files' => true,
                ])!!}

                <div class="form-group mb-4">
                    <label for="" class="mb-2">Question</label>
                    <input type="text" name="question" value="{{$faq->question ?? ''}}" class="form-control">
                </div>
                <div class="form-group  mb-4"> 
                    <label for="" class="mb-2">Answer</label>
                    <textarea type="text" rows="5" name="answer" class="form-control">{{$faq->answer ?? ''}}</textarea>
                </div>
                <div class="form-group  mb-4">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <input type="submit" class="btn btn-primary">
                </div>
            {{Form::close()}}
        </div>
        <div class="col-md-8">
            <table class="table mt-1 table-striped">
                    <thead>
                        <tr>
                            <th width="40%">Question</th>
                            <th width="40%">Answer</th>
                            <th width="10%">Created At</th>
                            <th width="10%"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                        <tr>
                            <td>{{$faq->question ?? ''}}</td>
                            <td>{{$faq->answer ?? ''}}</td>
                            <td>{{$faq->created_at ?? ''}}</td>
                            <td> 
                                <a href="{{route('faq.edit',$faq->id)}}"> <i class="fa fa-edit"></i></a>
                                <a href=""> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">Data not Found!!!</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
            </table>
        </div>
    </div>
@endsection