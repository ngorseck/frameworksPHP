@extends('layouts.template')

@section('content')
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List des consultations</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-bordered table-responsive-md">
                    <tr>
                        <th>Identifiant</th>
                        <th>Animal</th>
                        <th>Veto</th>
                        <th>User</th>
                        <th>Libelle</th>
                        <th>Constat</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    @foreach($consultations as $consultation)
                        <tr>
                            <td>{{ $consultation->id }}</td>
                            <td>{{ $consultation->animals->nom }}</td>
                            <td>{{ $consultation->vetos_id }}</td>
                            <td>{{ $consultation->users_id }}</td>
                            <td>{{ $consultation->libelle }}</td>
                            <td>{{ $consultation->constat }}</td>
                            <td><a href="{{ route('consultationget',['id' => $consultation->id]) }}">Editer</a></td>
                            <td><a href="{{ route('consultationdelete',['id' => $consultation->id]) }}">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
