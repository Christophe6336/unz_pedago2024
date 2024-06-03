<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualisation du Programme</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <style>
        /* Header CSS */
        #header {
            background-color: #0d00ff;
            color: #fff;
            padding: 20px 0;
        }

        #header .logo h1 a {
            background-color: #08c4505f;
            color: #f4fbf6fc;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }

        #header .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #header .navbar ul li {
            display: inline-block;
            margin-left: 20px;
        }

        #header .navbar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }

        #header .navbar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            #header .navbar ul li {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<header id="header" class="row" style="background-image: url('{{ asset('assets/banniere_unz.png') }}');">
    <div class="container d-flex justify-content-between">
        <div class="logo">
            <h1><a href="{{ route('connexion.store') }}" class="btn btn-success"> UNZ-PEDAGO </a></h1>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="btn btn-success" href="#">{{ $user->nom }}</a></li>
                <li><a href="{{ route('connexion') }}" class="btn btn-danger">Deconnexion</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<body>
<div class="container">
    <a href="{{ route('admin.property.index') }}" class="btn btn-secondary">Retour</a>
    <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Creer un nouveau</a>
    <h2 align="center"><a href="#">PROGRAMMES</a></h2>



    <div id="calendar"></div>

    <div class="card">
        <div class="card-header">
            Filtrages des Programmes
        </div>
        <div class="card-body">
            <label for="filiere">Semestre:</label>
            <select id="semestre" class="form-control">
                <option value="">Tous</option>
                @foreach($semestres as $semestre)
                    <option value="{{ $semestre->id }}">{{ $semestre->intitule }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="filiere">Filière:</label>
                <select id="filiere" class="form-control">
                    <option value="">Toutes</option>
                    @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                @endforeach
                    <!-- Ajouter vos options de filières ici -->
                </select>
            </div>
            <div class="form-group">
                <label for="promotion">Promotion:</label>
                <select id="promotion" class="form-control">
                    <option value="">Toutes</option>
                    @foreach($promotions as $promotion)
                    <option value="{{ $promotion->id }}">{{ $promotion->annee }}</option>
                @endforeach
                    <!-- Ajouter vos options de promotions ici -->
                </select>
            </div>
            <button id="applyFilters" class="btn btn-primary">Appliquer les filtres</button>
        </div>
    </div>


    <!-- Modal pour les détails des événements -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Details du Programme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="event-details">
                    <!-- Les détails de l'événement seront insérés ici -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function fetchEvents() {
            var semestre = $('#semestre').val();
            var filiere = $('#filiere').val();
            var promotion = $('#promotion').val();

            $('#calendar').fullCalendar('destroy'); // Détruire le calendrier existant
            $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: {
                    url: '/admin/properties/events',
                    data: function() {
                        return {
                            semestre: semestre,
                            filiere: filiere,
                            promotion: promotion
                        };
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt("Enter Event Title");

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "{{ route('admin.properties.storeEvent') }}",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                $('#calendar').fullCalendar('refetchEvents');
                                alert("Added Successfully");
                            }
                        });
                    }
                },
                editable: true,
                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/admin/properties/update",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#calendar').fullCalendar('refetchEvents');
                            alert('Event Update');
                        }
                    });
                },
                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/admin/properties/update",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#calendar').fullCalendar('refetchEvents');
                            alert("Programme mis a jour avec sucess");
                        }
                    });
                },
                eventClick: function(event) {
                    var details = `
                        <p><strong>Module:</strong> ${event.title}</p>
                        <p><strong>DEBUT:</strong> ${event.debut}</p>
                        <p><strong>FIN:</strong> ${event.fin}</p>
                        <p><strong>Enseignant:</strong> ${event.enseignant}</p>
                        <p><strong>Statut:</strong> ${event.statut}</p>
                        <p><strong>Salle:</strong> ${event.salle_id}</p>
                        <p><strong>Bâtiment:</strong> ${event.batiment_id}</p>
                        <p><strong>Année Académique:</strong> ${event.annee_academique_id}</p>
                        <p><strong>UFR:</strong> ${event.ufr_id}</p>
                        <p><strong>Filière:</strong> ${event.filiere_id}</p>
                        <p><strong>Promotion:</strong> ${event.promotion_id}</p>
                        <p><strong>Semestre:</strong> ${event.semestre_id}</p>
                    `;
                    $('#event-details').html(details);
                    $('#eventModal').modal('show');
                },
                eventDoubleClick: function(event) {
    // Afficher une modale pour modifier les détails de l'événement
    $('#editEventModal').modal('show');

    // Pré-remplir le formulaire avec les détails de l'événement sélectionné
    $('#eventTitle').val(event.title);
    $('#eventStart').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
    $('#eventEnd').val(event.end.format('YYYY-MM-DD HH:mm:ss'));

    // Gérer la soumission du formulaire de modification
    $('#editEventForm').submit(function(e) {
        e.preventDefault();
        // Capturer les nouvelles valeurs des champs de formulaire
        var newTitle = $('#eventTitle').val();
        var newStart = $('#eventStart').val();
        var newEnd = $('#eventEnd').val();
        // Mettre à jour les détails de l'événement dans la base de données
        // Vous pouvez utiliser une requête AJAX pour envoyer les nouvelles données au serveur
        // Après avoir mis à jour les données, rafraîchissez le calendrier pour refléter les modifications
        $('#editEventModal').modal('hide');
    });
}

            });
        }

        // Appliquer les filtres lors du clic sur le bouton
        $('#applyFilters').on('click', fetchEvents);

        // Charger initialement les événements
        fetchEvents();

    });


</script>
</body>
</html>
