 <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="/home"class="{{ Request::path() == 'home' ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
            
          
            

             @if (auth()->user()->role == 'admin')
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-user"></i> <span>Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="/siswa" class="">Siswa</a></li>
                  <li><a href="/rombel" class="">Rombel</a></li>
                  <li><a href="/rayon" class="">Rayon</a></li>
                </ul>
              </div>
            </li>
            @endif


            @if (auth()->user()->role == 'siswa')
             <li><a href="/profile" class="{{ Request::path() == 'profile' ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
              <li><a href="/set" class="{{ Request::path() == 'set' ? 'active' : '' }}"><i class="lnr lnr-clock"></i> <span>Set Jadwal</span></a></li>
            @endif

            
            
          </ul>
        </nav>
      </div>
    </div>