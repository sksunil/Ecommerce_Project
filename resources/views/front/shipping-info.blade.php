@extends('layout.main')

@section('content')

    <div class="row">
        <div class="small-6 small-centered columns">
            <h2> Shipping Information</h2>
    {!! Form::open(['route' => 'address.store','method'=> 'post']) !!}

    <div class="form-group">
        {{ Form::label('addressline','AddressLine') }}
        {{ Form::text('addressline',null,array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('city','City') }}
        {{ Form::text('city',null,array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('state','State') }}
        {{ Form::text('state',null,array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('zip','Zip') }}
        {{ Form::text('zip',null,array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('country','Country') }}
        {{ Form::text('country',null,array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone','Phone') }}
        {{ Form::text('phone',null,array('class' => 'form-control')) }}
    </div>

   {!! Form::submit('Process To Payment', array('class' => 'button-success')) !!}
            {!! Form::close() !!}
        </div>
    </div>

    @endsection
