@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agency Type
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'agencyTypes.store']) !!}

                        @include('agency_types.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
