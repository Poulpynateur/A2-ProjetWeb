{{-- Template for the whole administration part --}}

@extends('layouts.template')

@section('content')

@push('head')
<script src="{{ asset('js/admin.js') }}" defer></script>
<script src="{{ asset('js/admin_edit.js') }}" defer></script>
@endpush

<!-- Delete -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-title">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous vraiment sûr.e de vouloir supprimer <b id="delete-modal-name" class="font-weight-bold"></b> ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger" id="delete-modal-function" data-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
</div>

@include('admin.editEvent')

<div id="adminAccordion">
    <div class="card">
        <div class="card-header" id="headingGoodies">
            <h5 class="mb-0 ml-4">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseGoodies" aria-expanded="true" aria-controls="collapseGoodies">
                    Administration des goodies
                </button>
            </h5>
        </div>
        <div id="collapseGoodies" class="collapse" aria-labelledby="headingGoodies" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.goodies')
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingPastEvent">
            <h5 class="mb-0 ml-4">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsePastEvent" aria-expanded="true" aria-controls="collapsePastEvent">
                    Administration des événements
                    @if($countReport["events"])
                    <span class="notifiy-bubule bg-danger" >{{$countReport["events"]}}</span>
                    @endif
                </button>
            </h5>
        </div>
        <div id="collapsePastEvent" class="collapse" aria-labelledby="headingPastEvent" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.events')
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header" id="headingAdminSuggestions">
            <h5 class="mb-0 ml-4">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminSuggestions" aria-expanded="true" aria-controls="collapseAdminSuggestions">
                    Administration de la boîte à idées
                    @if($countReport["suggestion"])
                    <span class="notifiy-bubule bg-danger" >{{$countReport["suggestion"]}}</span>
                    @endif
                </button>
            </h5>
        </div>
        <div id="collapseAdminSuggestions" class="collapse" aria-labelledby="headingAdminSuggestions" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.suggestions')
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingAdminComment">
            <h5 class="mb-0 ml-4">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminComment" aria-expanded="true" aria-controls="collapseAdminComment">
                    Administration des commentaires
                    @if($countReport["comments"])
                    <span class="notifiy-bubule bg-danger" >{{$countReport["comments"]}}</span>
                    @endif
                </button>
            </h5>
        </div>
        <div id="collapseAdminComment" class="collapse" aria-labelledby="headingAdminComment" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.comment')
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingAdminImage">
            <h5 class="mb-0 ml-4">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminImage" aria-expanded="true" aria-controls="collapseAdminImage">
                    Administration des images
                    @if($countReport["pictures"])
                    <span class="notifiy-bubule bg-danger" >{{$countReport["pictures"]}}</span>
                    @endif
                </button>
            </h5>
        </div>
        <div id="collapseAdminImage" class="collapse" aria-labelledby="headingAdminImage" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.image')
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingAdminCatagory">
            <h5 class="mb-0 ml-4">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminCatagory" aria-expanded="true" aria-controls="collapseAdminCatagory">
                    Administration des catégories
                </button>
            </h5>
        </div>
        <div id="collapseAdminCatagory" class="collapse" aria-labelledby="headingAdminCatagory" data-parent="#adminAccordion">
            <div class="card-body">
                <div class="form-group">
                    <label>Ajouter</label>
                    <div class="row">
                        <div class="col-8"><input type="text" class="form-control" id="add-category-name"></div>
                        <div class="col-4"><button type="button" class="btn btn-success form-control" data-toggle="modal" onclick="addCategory()">Ajouter catégorie</button></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Supprimer</label>
                    <div class="row">
                        <div class="col-8">
                            <select class="form-control" id="delete-category-id_category" name="id_category">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"> {{ $categorie->category }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4"><button type="button" class="btn btn-danger form-control" data-toggle="modal" onclick="deleteCategory()">Supprimer catégorie</button></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection