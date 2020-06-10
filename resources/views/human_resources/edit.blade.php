@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Human Resource
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($humanResource, ['route' => ['humanResources.update', $humanResource->id], 'method' => 'patch']) !!}

                        @include('human_resources.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection