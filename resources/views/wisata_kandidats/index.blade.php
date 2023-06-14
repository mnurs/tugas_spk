@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Wisata Kandidat</h1>
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['url' => ['wisataKandidat/asumsi'], 'method' => 'post']) !!}
                        <div class='float-right'> 
                            {!! Form::button('Hitung', [
                                'type' => 'submit',
                                'class' => 'btn btn-primary float-right',
                                'onclick' => 'return confirm("Kamu yakin?")'

                            ]) !!}
                        </div>
                    {!! Form::close() !!}
                    <a class="btn btn-primary float-right"
                       href="{{ route('wisataKandidats.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('wisata_kandidats.table')
        </div>
    </div>

@endsection
