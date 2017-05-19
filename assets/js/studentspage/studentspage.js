jQuery.expr[':'].Contains = function (a, i, m) {
    return jQuery(a).text().toUpperCase()
    .indexOf(m[3].toUpperCase()) >= 0;
};

jQuery.expr[':'].contains = function (a, i, m) {
    return jQuery(a).text().toUpperCase()
    .indexOf(m[3].toUpperCase()) >= 0;
};

$(document).ready(function() {
    $('select').material_select();
	$("#logout").click(function () {
        window.location = "login.php";
    });

    function sort() {
        if($("#search").val() != "") {
            if($("#searchOn").val() == 1) {
                $(".studentName:contains('" + $("#search").val() + "')").parent().parent().parent().parent().show();
                if($(".studentName:contains('" + $("#search").val() + "')").length <= 0) {
                    $(".noStudentFound").show();
                } else {
                    $(".noStudentFound").hide();
                }
            } else if ($("#searchOn").val() == 2) {
                $(".studentClass:contains('" + $("#search").val() + "')").parent().parent().parent().parent().show();
                if($(".studentClass:contains('" + $("#search").val() + "')").length <= 0) {
                    $(".noStudentFound").show();
                } else {
                    $(".noStudentFound").hide();
                }
            } else if ($("#searchOn").val() == 3) {
                $(".studentEducation:contains('" + $("#search").val() + "')").parent().parent().parent().parent().show();
                if($(".studentEducation:contains('" + $("#search").val() + "')").length <= 0) {
                    $(".noStudentFound").show();
                } else {
                    $(".noStudentFound").hide();
                }
            }
        } else {
            $(".student").hide();
            $(".tooManyStudets").show();
        }
    }

    $("#search").keyup(function (e) {
        $(".student").hide();
        if($("#search").val() != "") {
            $(".tooManyStudets").hide();


            sort();
        } else {
            $(".student").hide();
            $(".tooManyStudets").show();
            $(".noStudentFound").hide();
        }
    }); 

    $(".education_card_chip").click(function (e) {
        $("#searchOn").val("3");
        $('select').material_select('destroy');
        $('select').material_select();

        var education = e.target.innerText;

        $("#search").val(education);
        $(".student").hide();
        $(".studentEducation:contains('" + $("#search").val() + "')").parent().parent().parent().parent().show();
            if($(".studentEducation:contains('" + $("#search").val() + "')").length <= 0) {
                $(".noStudentFound").show();
            } else {
                $(".noStudentFound").hide();
            }
    });

    $(".class_card_chip").click(function (e) {
        $("#searchOn").val("2");
        $('select').material_select('destroy');
        $('select').material_select();

        var klas = e.target.innerText;

        $("#search").val(klas);
        $(".student").hide();
        $(".studentClass:contains('" + $("#search").val() + "')").parent().parent().parent().parent().show();
        if($(".studentClass:contains('" + $("#search").val() + "')").length <= 0) {
            $(".noStudentFound").show();
        } else {
            $(".noStudentFound").hide();
        }
    });

    $("#searchOn").change(function() {
        $(".student").hide();
        sort();
    });

    $(".student").click(function (e) {
        if(e.target.classList["0"] === "chip") {
            return false;
        }

        var value = $(this).attr("data-studentid");

        var data = {
            "key": "studentId",
            "value": value
        };

        $.ajax({
            method: 'POST',
            type: 'json',
            url: '../includes/addsessionvar.php',
            data: JSON.stringify(data),
            success: function (data){
                window.location = "studentPage.php";

            },
            fail: function(){
                Materialize.toast('Er is een error, contact de beheerder', 2000);
            }
        });
    });
});