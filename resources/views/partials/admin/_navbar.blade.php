<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.html" class="sidebar-brand">
                <img src={{ asset("assets/img/logo-burkina.PNG")  }} width=100% height=100%>
            </a>
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="page_ready_user_profile.html">

                        <img src="{{ asset("form_asset/img/placeholders/avatars/avatar2.jpg") }}" alt="avatar">

                    </a>
                </div>
                <div class="sidebar-user-name">
                    {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                </div>

            </div>
<hr>
            <ul class="sidebar-nav">

                {{-- @can('role.view', Auth::user()) --}}
                <li class="@yield('administration')">
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-settings"></i></i><span class="sidebar-nav-mini-hide"> Administration</span></a>
                    <ul>

                        <li class="@yield('administration-parametre')">
                            <a href="{{ route('parametres.index') }}">Parametres</a>
                        </li>
                            <li class="@yield('administration-valeur')">
                                <a href="{{ route('valeurs.index') }}">Valeurs</a>
                            </li>
                    </ul>
                </li>
                <li class="@yield('souscription')">
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-settings"></i></i><span class="sidebar-nav-mini-hide"> Souscription</span></a>
                    <ul>
                        <li class="@yield('souscription-liste')">
                            <a href="{{ route('statistique') }}">Statistiques</a>
                        </li>
                        <li class="@yield('souscription-liste')">
                            <a href="{{ route('projet.liste') }}">Toutes les souscriptions</a>
                        </li>
                        <li class="@yield('souscription-liste')">
                            <a href="{{ route('projet.generer_liste') }}">Generer</a>
                        </li>
                    </ul>
                </li>
                {{-- @endcan --}}

            </ul>
        </div>
    </div>
</div>
