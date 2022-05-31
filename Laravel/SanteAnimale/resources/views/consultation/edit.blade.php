@extends('layouts.template')

@section('content')
    <div class="col-xl-12 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Formulaire</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="post" action="{{ url('consultation/update') }}">
                @csrf
                <!--input type="hidden" name="_token" value="< ? php echo csrf_token() ? >" -->
                    <input class="form-control" type="hidden" name="id" id="id" value="{{ $consultation->id }}" />
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="animal">Animal à consulter</label>
                            <select class="form-control" name="animal" id="animal">
                                <option value="">Faites un choix</option>
                                @foreach($animaux as $animal)
                                    @if($animal->id == $consultation->animals->id)
                                        <option selected value="{{ $animal->id }}">{{ $animal->nom }}</option>
                                    @else
                                        <option value="{{ $animal->id }}">{{ $animal->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="veto">Veto pour la consultation</label>
                            <select class="form-control" name="veto" id="veto">
                                <option value="">Faites un choix</option>
                                @foreach($vetos as $veto)
                                    @if($veto->id == $consultation->vetos->id)
                                        <option selected value="{{ $veto->id }}">{{ $veto->prenom }} {{ $veto->nom }}</option>
                                    @else
                                        <option value="{{ $veto->id }}">{{ $veto->prenom }} {{ $veto->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="libelle">Libelle de la consultation</label>
                            <textarea class="form-control" name="libelle" id="libelle">
                                {{ $consultation->libelle }}
                            </textarea>
                        </div>
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="constat">Constat de la consultation</label>
                            <textarea class="form-control" type="text" name="constat" id="constat">
                                {{ $consultation->libelle }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer" />
                        <input class="btn btn-warning" type="reset" name="annuler" id="annuler" value="Annuler" />
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
