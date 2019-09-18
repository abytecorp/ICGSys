@extends('layouts.app')
@section('content')

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

@include('layouts.title')


            
            <dashboard :user="{{ Auth::user() }}"></dashboard>
            
</div>
@endsection
