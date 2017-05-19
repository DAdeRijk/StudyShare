$(document).ready(function() {
	function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

	$("#loginForm").submit(function (e) {
        var d = new Date();
        d.setTime(d.getTime() + (30*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        
        document.cookie = "username=; " + expires;
        document.cookie = "password=; " + expires;
        document.cookie = "rememberLogin=false; " + expires;
        if($("#rememberLogin").prop('checked') && $("#username").val() != "" && $("#password").val() != "") {
            document.cookie = "username=" + $("#username").val() + "; " + expires;
            document.cookie = "password=" + $("#password").val() + "; " + expires;
            document.cookie = "rememberLogin=" + $("#rememberLogin").prop('checked') + "; " + expires;
        }
    });

	console.log(getCookie("rememberLogin"));
    var checked = getCookie("rememberLogin");
    if(checked === 'true') {
        $("#username").val(getCookie("username"));
        $("#username").parent().find("label").addClass("active");
        $("#password").val(getCookie("password"));
        $("#password").parent().find("label").addClass("active");
        $("#rememberLogin").prop('checked', "checked");
    }
});