@extends('layouts.backend.admin')

@section('content')
    <a href="{{ url('/mahasiswa/journal') }}" class="btn btn-secondary">Kembali</a>
    @include('mahasiswa.journal.component._form')
@endsection
@push('js')
    <script type="text/javascript">
        $("#journal").addClass("active");
    </script>
    <script>
        $(document).on('click', '.add', function() {
            var $this = $(this),
                $cloneElement = $this.closest('.clone'),
                $clone = $cloneElement.clone();

            $clone.addClass('hide').find('input').val('');
            $cloneElement.after($clone);
            $clone.fadeIn(50, 'linear', function() {
                $(this).removeClass('hide');
            });

            $this.html($this.data('text')).addClass('btn-danger').addClass($this.data('toggle-class')).removeClass(
                'add').removeClass('btn-success');
        });

        $(document).on('click', '.remove-field', function() {
            var $this = $(this);

            $this.closest('.clone').fadeOut(50, 'linear', function() {
                $(this).remove();
            });
        });
    </script>
@endpush
