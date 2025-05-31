<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.global-style')
    <title>Accueil</title>
</head>
<body>
    @include('partials.header')
    <main class="container-lg">
        <!-- Alert Widget -->
        <div class="container mb-4">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Nouveau :</strong> Retrouvez nos cultes en ligne chaque dimanche à 10h !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        </div>

        <!-- About Section -->
        <section id="about" class="container my-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('faith.jpg') }}" alt="Église" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-md-6">
                    <h2>Qui sommes-nous ?</h2>
                    <p>
                        Nous sommes une église accueillante, engagée à partager l'amour de Dieu et à servir notre communauté. 
                        Rejoignez-nous pour nos cultes, nos activités et nos moments de partage.
                    </p>
                    <a href="/about" class="btn btn-outline-secondary mt-2">Découvrir notre histoire</a>
                </div>
            </div>
        </section>

        <!-- Values Widget as Cards -->
        <section class="values-section py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Nos valeurs</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-heart-fill icon-lg text-danger mb-2"></i>
                                <h5 class="card-title">Amour</h5>
                                <p class="card-text">Nous croyons que l'amour de Dieu transforme les vies et unit notre communauté.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-people-fill icon-lg text-primary mb-2"></i>
                                <h5 class="card-title">Partage</h5>
                                <p class="card-text">Le partage et la solidarité sont au cœur de nos actions et de notre mission.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-lightbulb-fill icon-lg text-warning mb-2"></i>
                                <h5 class="card-title">Espérance</h5>
                                <p class="card-text">Nous portons un message d'espérance pour tous, quels que soient les défis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Events Section with Accordion -->
        <section id="events" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Nos prochains événements</h2>
                <div class="accordion" id="eventsAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#event1" aria-expanded="true">
                                Culte du dimanche
                            </button>
                        </h2>
                        <div id="event1" class="accordion-collapse collapse show" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                Chaque dimanche à 10h00. Venez vivre un temps de louange et d'enseignement.
                                <span class="badge bg-primary ms-2">Dimanche</span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#event2">
                                Groupe de prière
                            </button>
                        </h2>
                        <div id="event2" class="accordion-collapse collapse" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                Rejoignez notre groupe de prière chaque mercredi à 19h00.
                                <span class="badge bg-success ms-2">Mercredi</span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#event3">
                                Atelier jeunesse
                            </button>
                        </h2>
                        <div id="event3" class="accordion-collapse collapse" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                Des activités pour les jeunes chaque samedi après-midi.
                                <span class="badge bg-warning text-dark ms-2">Samedi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Sermons Widget as Cards -->
        <section class="sermons-section py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Derniers messages</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card sermon-card h-100 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-primary">La foi qui déplace les montagnes</h6>
                                <p class="small text-muted mb-1">Pasteur Jean, 12 mai 2025</p>
                                <p>Découvrez comment la foi peut transformer votre vie quotidienne.</p>
                                <a href="#" class="btn btn-link p-0">Écouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card sermon-card h-100 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-primary">Vivre dans la paix</h6>
                                <p class="small text-muted mb-1">Pasteure Marie, 5 mai 2025</p>
                                <p>Un message inspirant sur la paix intérieure et la confiance en Dieu.</p>
                                <a href="#" class="btn btn-link p-0">Écouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card sermon-card h-100 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-primary">L'espérance au quotidien</h6>
                                <p class="small text-muted mb-1">Pasteur Paul, 28 avril 2025</p>
                                <p>Comment garder l'espérance dans les moments difficiles.</p>
                                <a href="#" class="btn btn-link p-0">Écouter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('partials.footer')
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat;
        }
        .icon-lg {
            font-size: 2.5rem;
        }
        .sermon-card:hover, .card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            transition: 0.2s;
        }
        .carousel-item {
            min-height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .carousel-inner {
            border-radius: 1rem;
            overflow: hidden;
        }
        @media (max-width: 767px) {
            .carousel-item {
                min-height: 200px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@section('content')
<div class="bg-gradient-to-r from-blue-500 to-indigo-600 py-20">
  <div class="container mx-auto text-center text-white">
    <h1  class="btn-dashboard bg-white text-blue-600 hover:bg-gray-100 inline-block mr-4">
      Bienvenue aux Missionnaires de Réveil
    </h1>
    <p class="btn-dashboard bg-white text-indigo-600 hover:bg-gray-100 inline-block">
      Rejoignez-nous pour vivre des moments de partage, de prière et d’inspiration.
    </p>
  </div>
</div>

<div class="container mx-auto py-12">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <a href="{{ route('events.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>
      <h3 class="text-xl font-semibold mb-2">Agenda</h3>
      <p class="text-gray-600 text-sm">Consultez tous nos prochains événements.</p>
    </a>

    <a href="{{ route('prayers.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c.512-1.023 1.803-2 3.5-2s2.988.977 3.5 2H12z M12 8v10m0 0l-4-4m4 4l4-4" />
      </svg>
      <h3 class="text-xl font-semibold mb-2">Mur des Prières</h3>
      <p class="text-gray-600 text-sm">Partagez vos demandes et soutenez les autres.</p>
    </a>

    <a href="{{ route('testimonies.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-yellow-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <h3 class="text-xl font-semibold mb-2">Témoignages</h3>
      <p class="text-gray-600 text-sm">Découvrez et partagez vos expériences de foi.</p>
    </a>

    <a href="{{ route('multimedia.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-red-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 000 2.828l6.586 6.586M3 12h18" />
      </svg>
      <h3 class="text-xl font-semibold mb-2">Multimédias</h3>
      <p class="text-gray-600 text-sm">Regardez nos vidéos et replays en direct.</p>
    </a>
  </div>
</div>
@endsection