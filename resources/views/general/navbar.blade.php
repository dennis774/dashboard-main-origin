{{-- START OF TOP BAR --}}
{{-- START OF TOP BAR --}}
<div class="container">
    <div class="row">
        <div class="col-lg-2">.</div>
        <div class="col-lg-8 mt-3" style="z-index: 1;">
            {{-- TOPBAR --}}
            <div class="row topbar">
                <div class="col-lg-4 d-flex justify-content-start align-items-center user-info">
                    {{-- <img src="https://via.placeholder.com/80" class="user-image" /> --}}
                    <img src="{{ asset('user_images/' . Auth::user()->user_image) }}" alt="User Image" class="rounded-circle " style="width: 50px; height:50px;">
                    <span class="user-welcome">Welcome, {{ Auth::user()->name }}!</span>                    
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <div class="mx-auto dropdown-oval-container">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Business
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ url('/kuwago-one') }}" data-name="Kuwago Cafe 1">Kuwago Cafe 1</a></li>
                                <li><a class="dropdown-item" href="{{ url('/kuwago-two') }}" data-name="Kuwago Cafe 2">Kuwago Cafe 2</a></li>
                                <li><a class="dropdown-item" href="{{ url('/uddesign') }}" data-name="Uddesign">Uddesign</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <div>
                        <a href="{{url('/business')}}" class="mx-2"><i class="fa-solid fa-store"></i></a>
                        <a href="{{ route('targetSales.index') }}" class="mx-2"><i class="fa-solid fa-crosshairs"></i></a>
                        <a href="{{url('/account')}}" class="mx-2"><i class="fa-solid fa-user"></i></a>
                        <a href="{{ route('settings.account-show', ['id' => Auth::user()->id]) }}" class="mx-2"><i class="fa-solid fa-gear"></i></a>        
                        @if (Auth::check())
                        <a href="#" class="mx-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                          </a>
                          
                          <!-- Logout Form -->
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                          </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">.</div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 800px; margin: auto;"> <!-- Increase modal width and center it -->
      <div class="modal-content text-center">
        <div class="modal-header justify-content-center"> <!-- Center header text -->
          <h5 class="modal-title w-100" id="logoutModalLabel">Comeback Soon!</h5>
        </div>
        <div class="modal-body">
          Are you sure you want to logout? You will be redirected to the login page.
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn" data-bs-dismiss="modal" style="color: #aaa; font-weight: bold;">Cancel</button> <!-- Custom Cancel button style -->
          <button type="button" class="btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: red; font-weight: bold;">Sign out</button> <!-- Custom Sign out button style -->
        </div>
      </div>
    </div>
  </div>
{{-- END OF TOP BAR --}}

{{-- END OF TOP BAR --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentUrl = window.location.href;
        var dropdownItems = document.querySelectorAll('.dropdown-item');

        dropdownItems.forEach(function (item) {
            if (currentUrl.includes(item.getAttribute('href'))) {
                document.getElementById('dropdownMenuButton').textContent = item.getAttribute('data-name');
            }
        });
    });
</script>


<style>
    .modal-dialog-centered {
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-dialog {
  margin: auto; /* Centers the modal horizontally */
}

    .user-info {
    display: flex;
    align-items: center;
    gap: 10px; 
}

.user-image {
    width: 50px; 
    height: 50px;
    border-radius: 50%; 
    object-fit: cover; 
}

.user-welcome {
    font-size: 14px; 
    color: #fff; 
}
.dropdown-oval-container {
    background: rgba(255, 255, 255, 0.1); 
    backdrop-filter: blur(10px); 
    border-radius: 50px; 
    padding: 10px 70px; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 38px;
}

.dropdown-toggle {
    background: transparent;
    border: none;
    color: white;
    font-weight: bold;
    font-size: 18px;
}

.dropdown-item {
    color: #333; 
}
.fa-solid {
    font-size: 18px; 
    color: #fff;
}

div.topbar {
    background: rgba(255, 255, 255, 0.1); 
    backdrop-filter: blur(10px); 
    border-radius: 50px; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    margin: 20px auto; 
    width: 95%; 
    max-width: 1200px; 
    height: 55px;
}
</style>
