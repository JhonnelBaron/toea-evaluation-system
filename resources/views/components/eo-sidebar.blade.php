<div class="sidebar">
    <div class="profile-picture">
        <img src="{{ asset('img/sidebar.png') }}" class="h-64" alt="Tesda tesda-lingap-ay-maaasahan">
    </div>

    <div class="user-name">{{ Auth::user()->name }}</div>
    <div class="user-type">
        @php
        switch (Auth::guard('web')->user()->executive_office) {
            case 'AS':
                echo 'Administrative Office';
                break;
            case 'LD':
                echo 'Legal Division';
                break;
            case 'CO':
                echo 'Certification Office';
                break;
            case 'FMS':
                echo 'Financial and Management Service';
                break;
            case 'NITESD':
                echo 'National Institute for Technical Education and Skills Development';
                break;
            case 'PIAD':
                echo 'Public Information and Assistance Division';
                break;
            case 'PO':
                echo 'Planning Office';
                break;
            case 'PLO':
                echo 'Partnership and Linkages Office';
                break;
            case 'ROMO':
                echo 'Regional Operations Management Office';
                break;
            case 'RO':
                echo 'Regional Office';
                break;
            case 'ROMD':
                echo 'Regional Operations Management Division';
                break;
            default:
                echo 'Unknown';
        }
    @endphp
    </div>

      <!-- Dropdown for BEST REGIONAL OFFICE -->
      <div>
       <div class="font-sans">
            <br>
            <a href="{{ url('/executive-office-dashboard') }}" class="dropdown-btn"><b>BEST REGIONAL OFFICE</b></a>
            <a href="{{route('evaluation-list')}}" class="dropdown-btn"><b>EVALUATE</b></a>
        </div>
    </div>
    <div style="margin-top: 250px;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-xs btn btn-primary btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        LOGOUT
                    </button>
        </form>
    </div>
</div>



<!-- Add some CSS for styling the dropdowns -->
<style>
    .sidebar {
        display: flex;
        flex-direction: column;
        height: 100vh; /* Set sidebar height to 100% of viewport height */
    }
    .sidebar .tabs {
        width: 100%;
       
    }

    .dropdown {
        position: left;
        text-align: left;
    }

    .dropdown-btn {
        font-size: 12px;
        font-family: "Times New Roman", Times, serif;
        background-color: #FFFFFF;
        color: black;
        padding: 10px;
        text-decoration: none;
        display: block;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        cursor: pointer;
        transition: background-color 0.3s ease; /* Add transition property */
    }

    .dropdown-container {
        display: none;
        background-color: #FFFFFF;
        padding-left: 8px;
        transition: display 0.3s ease; /* Add transition property */
    }

    .dropdown-container a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-container a:hover {
        background-color: #ddd;
    }

    .dropdown-btn:hover {
        background-color: #2980b9;
    }

    .dropdown-btn.active + .dropdown-container {
        display: block;
    }

    .sub-tab {
        font-size: 12px;
        font-family: 'Palatino', 'URW Palladio L', serif;
        text-align: left;
    }

    .sidebar-content {
        flex: 1;
        overflow-y: auto; /* Add scrollbar for long content */
    }

    /* Rest of your existing styles */
</style>



<!-- Add JavaScript to toggle the dropdowns -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var dropdowns = document.getElementsByClassName("dropdown-btn");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
});
</script>
