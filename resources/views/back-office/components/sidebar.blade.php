@include('back-office.components.modal')
<div class="sidebar pb-3" id="sidebar" style="overflow-y: auto;">
  <div class="sidebar-header container-fluid">
    <div class="text-wrapper">
      <div class="title mb-0" style="font-size: 1rem">Aplikasi Rental-PS</div>
    </div>
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-title active">MAIN MENU</li>
    <li class="nav-item {{ Request::is('back-office/dashboard') ? 'selected-list': '' }}">
      <a class="nav-link" href="/back-office/dashboard">
        <span class="{{ Request::is('back-office/dashboard') ? 'active-link': 'death-link' }}">Dashboard</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('back-office/rental') ? 'selected-list': '' }}">
      <a class="nav-link" href="/back-office/rental">
        <span class="{{ Request::is('back-office/rental') ? 'active-link': 'death-link' }}">Daftar Pesanan</span>
      </a>
    </li>
    <li class="nav-item" onclick="formKonfirmasi()">
      <span class="nav-link" id="logout">
        <span class="{{ Request::is('back-office/logout') ? 'active-link': 'death-link' }}">Logout</span>
      </span>
    </li>
  </ul>
  <div class="wrapperButtonLogout w-100 px-3"></div>
</div>

<script>
    function formKonfirmasi() {
        $('#formKonfirmasi').attr('action', "{{ route('logout') }}");
        $('#ModalKonfirmasi').modal('show');
    }
</script>
