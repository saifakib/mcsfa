<script src="{{asset('/')}}js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('/')}}js/chart.js"></script>
    <script src="{{asset('/')}}js/dashboard2.js"></script>
    <script src="{{asset('/')}}js/jquery-ui.js"></script>
    <!--<script src="{{asset('/')}}js/bootstrap-datepicker.min.js"></script>-->
    <script src="{{asset('/')}}js/maincsript.min.js"></script>
<!--        <script src="{{asset('/')}}js/demo.js"></script>-->
    <script src="{{asset('/')}}js/scrolltop.js"></script>
    <script src="{{asset('/')}}js/select2.full.min.js"></script>
    <script src="{{asset('/')}}js/sweetalert.min.js"></script>
    <script src="{{asset('/')}}js/toastr.min.js"></script>
    <script>
    </script>
    <script>
        $(function () {
            $('.getTable').DataTable();
            $('.allTable').DataTable({
                "paging": false,
                "ordering": false,
                "info": false
            });
            // $('.myselect').selectpicker();
            $('.getSelect').select2();
//            $('.allSelect').select2();
            $(".allDate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "1971:2050",
                dateFormat: "yy-mm-dd"
            });
        });
        $(document).ready(function () {
            $('form').attr('autocomplete', 'off');
        });
        $(document).ready(function () {
            $('#logout').click(function () {
                window.location.href = "{{URL::to('/logout')}}"
            });
        });
    </script>
    @if (Session::has('message'))
    <script>
        var type = "{{Session::get('alert-type')}}";
        if (type === "success") {
            toastr.options.timeOut = 4000;
            toastr.success("{{Session::get('message')}}");
        } else if (type === "warning") {
            toastr.options.timeOut = 4000;
            toastr.warning("{{Session::get('message')}}");
        } else {
            toastr.options.timeOut = 4000;
            toastr.error("{{Session::get('message')}}");
        }
    </script>
    @endif
    <script>
        function scrollSmoothToBottom() {
            var scrollingElement = (document.scrollingElement || document.body);
            $(scrollingElement).animate({
                scrollTop: document.body.scrollHeight
            }, 500);
        }
    </script>

    @stack('script')