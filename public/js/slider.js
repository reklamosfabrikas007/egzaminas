
var fileextension = ".png";
$.ajax({
    //This will retrieve the contents of the folder if the folder is configured as 'browsable'
    url: '/iimages/',
    success: function (data) {
        //List all .png file names in the page
        $(data).find("a:contains(" + fileextension + ")").each(function () {
            var filename = this.href.replace(window.location.host, "").replace("http://", "");
            $("body").append("<img src='" + '/iimages/' + filename + "'>");
        });
    }
});