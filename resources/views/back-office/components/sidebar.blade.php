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
        <span class="{{ Request::is('back-office/dashboard') ? 'active-link': 'death-link' }}"><i class="ri-home-smile-2-line iconSidebarList"></i>Dashboard</span>
      </a>
    </li>
  </ul>
  <div class="wrapperButtonLogout w-100 px-3"></div>
  {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}
</div>
<script>
    function formKonfirmasi() {
        $('#formKonfirmasi').attr('action', "{{ route('logout') }}");
        $('#ModalKonfirmasi').modal('show');
    }
</script>
