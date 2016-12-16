<div class="col-md-6 notifikasi-failed">
    <script>
        $(function() {
            runEffect();
            return false;
        });
        // run the currently selected effect
        function runEffect() {
            // get effect type from
            var selectedEffect = $("#effectTypes").val();

            // most effect types need no options passed by default
            var options = {};
            // some effects have required parameters
            if (selectedEffect === "scale") {
                options = {percent: 100};
            } else if (selectedEffect === "size") {
                options = {to: {width: 280, height: 185}};
            }

            // run the effect
            $("#effect").show(selectedEffect, options, 200, callback);
        }
        ;

        //callback function to bring a hidden box back
        function callback() {
            setTimeout(function() {
                $("#effect:visible").removeAttr("style").fadeOut();
            }, 2500);
        }
        ;

        $("#effect").hide();
    </script>

    <div class="toggler" style="position: absolute; width: 350px; margin: 0px 0px 0px 70px;">
        <div id="effect" class="ui-widget-content ui-corner-all">
            <p style="text-align:center;font-size: 13pt;margin-top: 13px; color: #b94a48;">
                <?php echo isset($message) ? '<span class="fa fa-times-circle"></span> '.$message : null; ?>
            </p>
        </div>
    </div>
    <input type="hidden" name="effects" value="blind" id="effectTypes">
</div>