<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        minuteStep: 15,
        startDate: "{{ \Carbon\Carbon::now() }}",
        format: "yyyy-mm-dd hh:ii:ss"
    });
</script>