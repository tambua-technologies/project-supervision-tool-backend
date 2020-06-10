@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Human Resource
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('human_resources.show_fields')
                    <a href="{{ route('humanResources.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
