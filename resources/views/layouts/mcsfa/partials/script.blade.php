<script src="http://192.168.3.8:8081/fa/public/js/bootstrap.min.js"></script>
    <script src="http://192.168.3.8:8081/fa/public/js/jquery.dataTables.min.js"></script>
    <script src="http://192.168.3.8:8081/fa/public/js/dataTables.bootstrap.min.js"></script>
    <script src="http://192.168.3.8:8081/fa/public/js/chart.js"></script>
    <!--<script src="http://192.168.3.8:8081/fa/public/js/dashboard2.js"></script>-->
    <script src="http://192.168.3.8:8081/fa/public/js/jquery-ui.js"></script>
    <!--<script src="http://192.168.3.8:8081/fa/public/js/bootstrap-datepicker.min.js"></script>-->
    <script src="http://192.168.3.8:8081/fa/public/js/maincsript.min.js"></script>
<!--        <script src="http://192.168.3.8:8081/fa/public/js/demo.js"></script>-->
    <script src="http://192.168.3.8:8081/fa/public/js/scrolltop.js"></script>
    <script src="http://192.168.3.8:8081/fa/public/js/select2.full.min.js"></script>
    <script src="http://192.168.3.8:8081/fa/public/js/sweetalert.min.js"></script>
    <script src="http://192.168.3.8:8081/fa/public/js/toastr.min.js"></script>
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
                window.location.href = "http://192.168.3.8:8081/fa/logout"
            });
        });
    </script>
        <script>
        function scrollSmoothToBottom() {
            var scrollingElement = (document.scrollingElement || document.body);
            $(scrollingElement).animate({
                scrollTop: document.body.scrollHeight
            }, 500);
        }
    </script>

    @stack('script')