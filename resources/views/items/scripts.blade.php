<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ url('assets/scripts/klorofil-common.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/waves.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>

<script>
    $(function(){
        $('#preloader').fadeOut('slow');

        

    })

    
</script>
@stack('script')