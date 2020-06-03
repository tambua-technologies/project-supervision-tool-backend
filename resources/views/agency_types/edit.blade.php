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
                   {!! Form::model($agencyType, ['route' => ['agencyTypes.update', $agencyType->id], 'method' => 'patch']) !!}

                        @include('agency_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection