@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Funding Organisation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fundingOrganisation, ['route' => ['fundingOrganisations.update', $fundingOrganisation->id], 'method' => 'patch']) !!}

                        @include('funding_organisations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection