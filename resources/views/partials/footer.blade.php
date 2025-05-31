<footer>
    <div class="footer-container">
        <div class="footer-brand">
            <img src="{{ asset('logo.jpg') }}" alt="Logo de l'église" class="footer-logo">
            <span class="footer-church-name">Mouvement de Réveil Méthodiste</span>
        </div>
        <div class="footer-widgets">
            <div class="footer-widget">
                <h4><i class='bx bx-time'></i> Horaires des cultes</h4>
                <ul>
                    <li><i class='bx bx-calendar'></i> Dimanche : 10h - 12h</li>
                    <li><i class='bx bx-calendar'></i> Mercredi : 19h - 20h30</li>
                    <li>
                        <a href="{{ route('donation') }}" class="{{ request()->routeIs('donation') ? 'active' : '' }}">
                            <i class='bx bx-donate-heart'></i> Faire un don
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-widget">
                <h4><i class='bx bx-news'></i> Newsletter</h4>
                <form class="newsletter-form" action="#" method="POST">
                    <input type="email" name="email" placeholder="Votre email" required>
                    <button type="submit" aria-label="S'inscrire"><i class='bx bx-send'></i></button>
                </form>
            </div>
            <div class="footer-widget">
                <h4><i class='bx bx-share-alt'></i> Suivez-nous</h4>
                <div class="footer-social">
                    <a href="https://www.facebook.com/mouvementreveilmethodiste/?_rdc=1&_rdr#" aria-label="Facebook"><i class='bx bxl-facebook'></i></a>
                    <a href="https://mouvementreveilmethodiste.over-blog.com/2015/05/qui-sommes-nous.html"
                        target="_blank"
                        rel="noopener"
                        aria-label="Blog">
                        <i class='bx bx-news'></i>
                    </a>
                    <a href="https://www.youtube.com/@morevtv2258" aria-label="YouTube"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </div>
        <nav class="footer-nav" aria-label="Liens secondaires">
            <ul>
                <li><a href="{{ route('home') }}"><i class='bx bx-home'></i> Accueil</a></li>
                <li><a href="{{ route('community') }}"><i class='bx bx-group'></i> Communauté</a></li>
                <li><a href="{{ route('meditation') }}"><i class='bx bx-book-open'></i> Méditation</a></li>
                <li><a href="{{ route('multimedia.index') }}"><i class='bx bx-play-circle'></i> Multimédia</a></li>
            </ul>
        </nav>
        <div class="footer-contact">
            <p>
                <i class='bx bx-map'></i> 123 Rue de la Paix, 75000 Paris<br>
                <i class='bx bx-envelope'></i> <a href="mailto:contact@espoirlumiere.fr">contact@espoirlumiere.fr</a><br>
                <i class='bx bx-phone'></i> 01 23 45 67 89
            </p>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} Église Espoir & Lumière. Tous droits réservés.</span>
    </div>
</footer>

<style>
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');

    footer {
        background: #3a5a40;
        color: #f9f9f9;
        padding-top: 32px;
        box-shadow: 0 -2px 8px rgba(60, 60, 60, 0.08);
        font-family: 'Segoe UI', 'Arial', sans-serif;
    }

    .footer-container {
        max-width: 1300px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        padding: 0 24px 16px 24px;
        gap: 32px;
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .footer-logo {
        height: 48px;
        width: 48px;
        border-radius: 50%;
        background: #fff;
        object-fit: contain;
        box-shadow: 0 2px 8px rgba(60, 60, 60, 0.08);
        border: 2px solid #a3b18a;
    }

    .footer-church-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: #f9f9f9;
        letter-spacing: 1px;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .footer-widgets {
        display: flex;
        gap: 32px;
        flex-wrap: wrap;
    }

    .footer-widget {
        min-width: 200px;
        margin-bottom: 12px;
    }

    .footer-widget h4 {
        font-size: 1.08rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #ffe066;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .footer-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
        color: #f9f9f9;
        font-size: 0.98rem;
    }

    .footer-widget li {
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .newsletter-form {
        display: flex;
        gap: 6px;
        margin-top: 4px;
    }

    .newsletter-form input {
        border: none;
        border-radius: 18px;
        padding: 6px 12px;
        font-size: 1rem;
        outline: none;
        width: 120px;
        color: #333;
    }

    .newsletter-form button {
        background: #a3b18a;
        border: none;
        border-radius: 18px;
        color: #3a5a40;
        font-size: 1.2rem;
        padding: 6px 10px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .newsletter-form button:hover {
        background: #ffe066;
        color: #3a5a40;
    }

    .footer-social {
        display: flex;
        gap: 10px;
        margin-top: 4px;
    }

    .footer-social a {
        color: #f9f9f9;
        font-size: 1.4rem;
        transition: color 0.2s;
    }

    .footer-social a:hover {
        color: #ffe066;
    }

    .footer-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .footer-nav a {
        color: #f9f9f9;
        text-decoration: none;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: color 0.2s;
    }

    .footer-nav a:hover,
    .footer-nav a:focus {
        color: #ffe066;
        outline: none;
    }

    .footer-contact {
        font-size: 0.98rem;
        line-height: 1.7;
        margin-top: 12px;
    }

    .footer-contact i {
        margin-right: 6px;
        color: #ffe066;
        font-size: 1.1em;
        vertical-align: middle;
    }

    .footer-contact a {
        color: #f9f9f9;
        text-decoration: underline;
        transition: color 0.2s;
    }

    .footer-contact a:hover {
        color: #ffe066;
    }

    .footer-bottom {
        text-align: center;
        padding: 12px 0;
        background: rgba(58, 90, 64, 0.95);
        font-size: 0.97rem;
        color: #e0e0e0;
        border-top: 1px solid #a3b18a33;
    }

    @media (max-width: 1100px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
            gap: 18px;
            padding: 0 10px 16px 10px;
        }

        .footer-widgets {
            flex-direction: column;
            gap: 12px;
            align-items: center;
        }
    }
</style>