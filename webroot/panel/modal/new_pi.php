<?php
require_once "../../../resources/autoload.php";  // Load required libs
?>

<form id="newPIform" method="POST" action="<?php echo config::PREFIX; ?>/panel/groups.php">
    <input type="hidden" name="form_name" value="addPIform">
    <div style="position: relative;">
        <input type="text" id="pi_search" name="pi" placeholder="Search PI by NetID">
        <div class="searchWrapper" style="display: none;"></div>
    </div>
    <input type="submit" value="Send Request">
</form>

<script>
    $("input[type=text][name=pi]").keyup(function() {
        var searchWrapper = $("div.searchWrapper");
        $.ajax({
            url: "<?php echo config::PREFIX; ?>/panel/modal/pi_search.php?search=" + $(this).val(),
            success: function(result) {
                searchWrapper.html(result);

                if (result == "") {
                    searchWrapper.hide();
                } else {
                    searchWrapper.show();
                }
            }
        });
    });

    $("div.searchWrapper").on("click", "span", function (event) {
        console.log("click!");
        var textBox = $("input[type=text][name=pi]");
        textBox.val($(this).html());
    });

    /**
     * Hides the searchresult box on click anywhere
     */
    $(document).click(function() {
        $("div.searchWrapper").hide();
    });
</script>