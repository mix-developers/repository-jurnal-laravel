<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">{{ Auth::user()->role == 'mahasiswa' ? 'Beranda' : 'Dashboard' }} </span>
    {{ $title == 'Dashboard' || $title == 'Beranda' ? '' : '/ ' . $title }}
</h4>
