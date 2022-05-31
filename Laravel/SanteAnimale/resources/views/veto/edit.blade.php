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
                <form method="post" action="{{ url('veto/update') }}">
                @csrf
                <!--input type="hidden" name="_token" value="< ? php echo csrf_token() ? >" -->
                    <input class="form-control" type="hidden" name="id" id="id" value="{{ $veto->id }}" />
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="nom">Nom du veto</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="{{ $veto->nom }}" />
                        </div>
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="prenom">Prenom du veto</label>
                            <input class="form-control" type="text" name="prenom" id="prenom" value="{{ $veto->prenom }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="adresse">Adresse du veto</label>
                            <input class="form-control" type="text" name="adresse" id="adresse" value="{{ $veto->adresse }}" />
                        </div>
                        <div class="form-group col-xl-6">
                            <label class="control-label" for="telephone">Telephone du veto</label>
                            <input class="form-control" type="text" name="telephone" id="telephone" value="{{ $veto->telephone }}" />
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
