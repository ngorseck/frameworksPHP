@extends('layouts.template')

@section('content')
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List des veterinaires</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-bordered table-responsive-md">
                    <tr>
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    @foreach($vetos as $veto)
                        <tr>
                            <td>{{ $veto->id }}</td>
                            <td>{{ $veto->nom }}</td>
                            <td>{{ $veto->prenom }}</td>
                            <td>{{ $veto->adresse }}</td>
                            <td>{{ $veto->telephone }}</td>
                            <td><a href="{{ route('vetoget',['id' => $veto->id]) }}">Editer</a></td>
                            <td><a href="{{ route('vetodelete',['id' => $veto->id]) }}">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
