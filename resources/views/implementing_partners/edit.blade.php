@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Implementing Partner
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($implementingPartner, ['route' => ['implementingPartners.update', $implementingPartner->id], 'method' => 'patch']) !!}

                        @include('implementing_partners.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection