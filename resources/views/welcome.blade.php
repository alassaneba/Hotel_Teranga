<div class="row">
    <div class="col-md-4">
      <div class="panel-body">
        <form id="srcForm">
          <div class="row">
            <div class="form-group col-xs-12">
              <label>Date</label>
              <div id="ScheduledAt" class="input-group">
                <input type="text" class="form-control" name="from">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<script type="text/javascript">
$('#ScheduledAt').datetimepicker({
    format: 'YYYY-MM-DD HH:mm',
    toolbarPlacement: 'top',
		showClear: true,
		showClose: true,
		sideBySide: true,
    disabledTimeIntervals: [
      [moment("2017-12-05 8:40"),moment("2017-12-05 9:20")],
    ],
    daysOfWeekDisabled: [0, 7],
    stepping: 30,
    enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
})  
</script>
