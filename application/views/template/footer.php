     <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2018 kastelea.com | Design by: <a style="color:#fff;" target="_blank">Shamsudeen Jibrin Lawal</a>
                </div>
            </div>
        </div>

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/ui/'); ?>js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('assets/ui/'); ?>js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url('assets/ui/'); ?>js/custom.js"></script>
    <script src="<?php echo base_url('assets/ui/'); ?>js/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript">
        function goto(param){
            result=confirm('Clear charge?. Please ensure citizen has paid dues.');
            if(result){
                window.location.href=param;
            }
        }
    </script>
    <script>
        /*
        window.onerror = function(errorMsg) {
                $('#console').html($('#console').html()+'<br>'+errorMsg)
        }*/

        $.datetimepicker.setLocale('en');

        $('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: "D, l, M, F, Y-m-d H:i:s"});
        console.log($('#datetimepicker_format').datetimepicker('getValue'));

        $("#datetimepicker_format_change").on("click", function(e){
                $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
        });
        $("#datetimepicker_format_locale").on("change", function(e){
                $.datetimepicker.setLocale($(e.currentTarget).val());
        });

        $('#datetimepicker').datetimepicker({
        dayOfWeekStart : 1,
        lang:'en',
        disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
        startDate:	'1986/01/05'
        });
        $('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

        $('.some_class').datetimepicker();

        $('#default_datetimepicker').datetimepicker({
                formatTime:'H:i',
                formatDate:'d.m.Y',
                //defaultDate:'8.12.1986', // it's my birthday
                defaultDate:'+03.01.1970', // it's my birthday
                defaultTime:'10:00',
                timepickerScrollbar:false
        });

        $('#datetimepicker10').datetimepicker({
                step:5,
                inline:true
        });
        $('#datetimepicker_mask').datetimepicker({
                mask:'9999/19/39 29:59'
        });

        $('#datetimepicker1').datetimepicker({
                datepicker:false,
                format:'H:i',
                step:5
        });
        $('#datetimepicker2').datetimepicker({
                yearOffset:0,
                lang:'ch',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y/m/d',
        });
        $('#datetimepicker33').datetimepicker({
                yearOffset:0,
                lang:'ch',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y/m/d',
        });
        $('#datetimepicker3').datetimepicker({
                inline:true
        });
        $('#datetimepicker4').datetimepicker();
        $('#open').click(function(){
                $('#datetimepicker4').datetimepicker('show');
        });
        $('#close').click(function(){
                $('#datetimepicker4').datetimepicker('hide');
        });
        $('#reset').click(function(){
                $('#datetimepicker4').datetimepicker('reset');
        });
        $('#datetimepicker5').datetimepicker({
                datepicker:false,
                allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
                step:5
        });
        $('#datetimepicker6').datetimepicker();
        $('#destroy').click(function(){
                if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
                        $('#datetimepicker6').datetimepicker('destroy');
                        this.value = 'create';
                }else{
                        $('#datetimepicker6').datetimepicker();
                        this.value = 'destroy';
                }
        });
        var logic = function( currentDateTime ){
                if (currentDateTime && currentDateTime.getDay() == 6){
                        this.setOptions({
                                minTime:'11:00'
                        });
                }else
                        this.setOptions({
                                minTime:'8:00'
                        });
        };
        $('#datetimepicker7').datetimepicker({
                onChangeDateTime:logic,
                onShow:logic
        });
        $('#datetimepicker8').datetimepicker({
                onGenerate:function( ct ){
                        $(this).find('.xdsoft_date')
                                .toggleClass('xdsoft_disabled');
                },
                minDate:'-1970/01/2',
                maxDate:'+1970/01/2',
                timepicker:false
        });
        $('#datetimepicker9').datetimepicker({
                onGenerate:function( ct ){
                        $(this).find('.xdsoft_date.xdsoft_weekend')
                                .addClass('xdsoft_disabled');
                },
                weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
                timepicker:false
        });
        var dateToDisable = new Date();
                dateToDisable.setDate(dateToDisable.getDate() + 2);
        $('#datetimepicker11').datetimepicker({
                beforeShowDay: function(date) {
                        if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                                return [false, ""]
                        }

                        return [true, ""];
                }
        });
        $('#datetimepicker12').datetimepicker({
                beforeShowDay: function(date) {
                        if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                                return [true, "custom-date-style"];
                        }

                        return [true, ""];
                }
        });
        $('#datetimepicker_dark').datetimepicker({theme:'dark'})
    </script>
</body>
</html>
