@extends('layouts.app')

@section('content')
    <head>


    </head>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- Display if errors -->
                        <?php
                            foreach ($errors->all() as $error)
                                {
                                    echo '<p class="errors">'.$error.'</p>';
                                }
                        ?>
            </div>

                <!-- Modal for form create avatar -->
                <div class="modal fade" id="addAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ajout d'un avatar</h4>
                            </div>

                            <!-- Form -->
                            <div class="modal-body">

                                    {!! Form::open((array('route'=>'addAvatar', 'method' => 'POST', 'files' => true))) !!}

                                    {!! Form::label('mail_name', 'Mail :') !!}
                                    {!! Form::text('mail') !!}

                                    <br><br>

                                    {!! Form::label('avatar_name', 'Ajouter un avatar (Format autorisés : jpeg, jpg ou png) :') !!}
                                    {!! Form::file('avatar') !!}

                                    <br>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-success'] ) !!}

                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div><br>

        <!-- Display avatar's list for user-->
        <div class="row">
            @foreach ($mails as $m)
                    <div class="col-md-6">
                        <div class="panel panel-primary avatar_small">
                            <div class="panel-heading title_avatar">
                                <!-- Display mail -->
                                <b>Adresse mail : <i>{{ $m -> adress }}</i></b>
                            </div>

                            <!-- Display avatar -->
                            <img src="{{ $m -> url_avatar}}" class="small-img"/>

                            <div class="panel-footer">
                                <!-- Button modal for delete avatar -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAvatar{{ $m -> id }}">
                                    Supprimer avatar
                                </button>
                                <!-- Modal for delete avatar  -->
                                <div class="modal fade" id="deleteAvatar{{ $m -> id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Suppression d'un avatar</h4>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous sûr de vouloir supprimer cet avatar ?
                                            </div>
                                            <div class="modal-footer">
                                                <div class="row">
                                                    <div class="col-md-6 centrer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non j'ai peur</button>
                                                    </div>
                                                    <div class="col-md-6 centrer">
                                                        {!! Form::open(array('route' => ['deleteAvatar', $m -> id], 'method' => "delete")) !!}
                                                        {!! Form::submit('Oui j\'ose', ['class' => 'btn btn-success'] ) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection


