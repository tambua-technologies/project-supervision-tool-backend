@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Focal Person
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($focalPerson, ['route' => ['focalPeople.update', $focalPerson->id], 'method' => 'patch']) !!}

                        @include('focal_people.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection