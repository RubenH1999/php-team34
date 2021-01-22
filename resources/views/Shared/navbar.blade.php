<nav class="navbar navbar-expand-md nav-pastel">
    @guest
    <a class="navbar-brand" href="/">
        <i class="fas fa-campground fa-3x " id="logonav"></i>
    </a>
    @endguest
    @auth
            @if (auth()->user()->type_id == 4)
                <a class="navbar-brand" href="/verantwoordelijke">
                    <i class="fas fa-campground fa-3x " id="logonav"></i>
                </a>
            @elseif(auth()->user()->type_id == 3)
                <a class="navbar-brand" href="/medewerker">
                    <i class="fas fa-campground fa-3x " id="logonav"></i>
                </a>
            @else
                <a class="navbar-brand" href="/">
                    <i class="fas fa-campground fa-3x " id="logonav"></i>
                </a>
            @endif
        @endauth


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                @guest
                    <a class="nav-link ml-3 " href="/">Home <span class="sr-only">(current)</span></a>

                @endguest
                @auth

                @if (auth()->user()->type_id == 4)
                    <a class="nav-link ml-3 " href="/verantwoordelijke">Home <span class="sr-only">(current)</span></a>
                    @elseif(auth()->user()->type_id == 3)
                    <a class="nav-link ml-3 " href="/medewerker">Home <span class="sr-only">(current)</span></a>
                    @else
                    <a class="nav-link ml-3 " href="/">Home <span class="sr-only">(current)</span></a>
                @endif
                @endauth
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/ticket_kopen">Tickets</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="/line-up" tabindex="-1">Line-up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/info" tabindex="-1">Info</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link " href="/personal-timetable" tabindex="-1">My line-up</a>
            </li>
                @endauth
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i>Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register"><i class="fas fa-signature"></i>Register</a>
                </li>
            @endguest
            @auth
       <li class="nav-item dropdown"><a href="!" class="nav-link dropdown-toggle" data-toggle="dropdown">{{auth()->user()->first_name}}&nbsp{{auth()->user()->last_name}} <span class="caret"></span></a>
       <div class="dropdown-menu dropdown-menu-right">
           <a href="/profiel" class="dropdown-item"><i class="fas fa-user mr-2"></i> Profiel wijzigen</a>
           @if (auth()->user()->type_id == 4)


           <a href="/tickets" class="dropdown-item"><i class="fas fa-ticket-alt mr-2"></i>Tickets beheren</a>
           <a href="/performances" class="dropdown-item"><i class="fas fa-list mr-2"></i>Line up beheren</a>
           <a href="/festivals" class="dropdown-item"><i class="fas fa-campground mr-2"></i>Festival beheren</a>
           <a href="/news" class="dropdown-item"><i class="fas fa-newspaper mr-2"></i>   Nieuws beheren</a>
           <a href="/employees" class="dropdown-item"><i class="fas fa-users mr-2"></i>Medewerkers beheren</a>
           <a href="/tasks" class="dropdown-item"><i class="fas fa-tasks mr-2"></i>Taken beheren</a>
           <a href="/artists" class="dropdown-item"><i class="fas fa-list mr-2"></i>Artiesten beheren</a>
           <a href="/Uurrooster" class="dropdown-item"><i class="fas fa-calendar-alt mr-2"></i>Uurrooster beheren</a>

           @endif
           @if (auth()->user()->type_id == 3)
               <a href="/shifts" class="dropdown-item"><i class="fas fa-calendar-alt mr-2"></i>Uurrooster bekijken</a>
               <a href="/shifts-employees" class="dropdown-item"><i class="fas fa-user-md mr-2"></i>Afwezig melden voor shift</a>
           @endif
           <a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>Afmelden</a>
       </div></li>
@endauth


        </ul>
    </div>
</nav>
