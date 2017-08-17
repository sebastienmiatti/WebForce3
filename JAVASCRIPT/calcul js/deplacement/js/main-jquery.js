$(function(){
    var leftField = $("#left");
    var topField = $("#top");
    var block = $("#block");

    $("#my-form").on("submit", function(e){
        e.preventDefault();

        var leftValue = parseInt(leftField.val());
        var topValue = parseInt(topField.val());

        // équivalent de !Number.isNaN(leftValue)
        if ($.isNumeric(leftValue) && $.isNumeric(topValue)){
            block.stop().animate({"left" : leftValue,"top" : topValue},3000); // partie animation
            //block.css({"left" : leftValue, "top" : topValue}); // équivalent de block.style.left = leftValue;
        }

    });

});
