@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stock Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stockType, ['route' => ['stockTypes.update', $stockType->id], 'method' => 'patch']) !!}

                        @include('stock_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection