@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stock Group Cluster
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stockGroupCluster, ['route' => ['stockGroupClusters.update', $stockGroupCluster->id], 'method' => 'patch']) !!}

                        @include('stock_group_clusters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection