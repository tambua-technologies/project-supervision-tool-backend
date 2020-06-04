@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Emergency Response Theme
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($emergencyResponseTheme, ['route' => ['emergencyResponseThemes.update', $emergencyResponseTheme->id], 'method' => 'patch']) !!}

                        @include('emergency_response_themes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection