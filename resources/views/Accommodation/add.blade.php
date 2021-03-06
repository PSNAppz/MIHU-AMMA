@extends('layouts.app')

@section('content')
<style>
.content {
    text-align: center;
}

.title {
    font-size: 6vw;
}

.m-b-md {
    margin-bottom: 30px;
}
</style>
    <div class="content">
        <div class="title m-b-md">
            Add Accommodation Details
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    {!! Form::open(array('route' => 'accommodation.store','data-parsley-validate' => '')) !!}
                    {{ Form::label('gender', 'For:') }}
                    {{ Form::select('gender', array('0' => 'Men', '1' => 'Women','2' => 'Police Men','3' => 'Police Women','4' => 'VIP'), null, array('class' => 'form-control'))}}
                    {{ Form::label('areaName','From Location:')}}
                    {{ Form::text('areaName',null,array('class'=> 'form-control','required' => ''))}}
                    {{ Form::label('locationofAcc','Accommodation At:')}}
                    {{ Form::text('locationofAcc',null,array('class'=> 'form-control','required'=> ''))}}
                    {{ Form::label('category','Category/Place:')}}
                    {{ Form::text('category',null,array('class'=> 'form-control','required'=> ''))}}
                    {{ Form::label('isFull', 'Status:') }}
        			{{ Form::select('isFull', array('0' => 'Available', '1' => 'Not Available'), null, array('class' => 'form-control'))}}
                    {{ Form::label('coord','Coordinator:')}}
                    {{ Form::text('coord',null,array('class'=> 'form-control','required'=> ''))}}
                    {{ Form::label('contact','Phone:')}}
                    {{ Form::text('contact',null,array('class'=> 'form-control','required'=> ''))}}
                    {{ Form::submit('Add Details',array('class'=>'btn btn-success btn-block','style' =>'margin-top:20px;'))}}
                    <a class="btn btn-danger btn-block" href="{{ url('/accommodation') }}" role="button">Cancel</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
    <hr>
@endsection
<footer>
    <footer>

<script src="/js/parsley.js"></script>
