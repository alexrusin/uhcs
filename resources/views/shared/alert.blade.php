<div class="full-screen-overlay">
    <div class="fixed-alert-wrapper" id="fixed-alert">

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <!--p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p-->

                <div class="alert alert-{{$msg}} alert-is-fixed" id="feedbackAlert" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    <span id="alert-message">{{ Session::get('alert-' . $msg) }} </span>
                    </div>

                <script>
                    fixedAlertTimeout = setTimeout(function ()
                    {
                        $("#feedbackAlert").alert('close');
                    }, 7000);
                </script>
            @endif
        @endforeach

    </div>
</div>