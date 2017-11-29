$(document).ready(function () {    
    $(window).bind("load resize scroll", function() {
        var navHeight = $(".navbar").outerHeight();
        $(".jumbotron").css('minHeight', (window.innerHeight));
    });
    $(".direction").on('click', function(event) {
    	//event.preventDefault();
    	var hash = this.hash;
    	scrollToZone(hash);
    });
});
function them(x){
    $(x).parent().append('<div class="row"><div class="col-xs-8"><input class="form-control" name="auteurs[]" type="text" required></div><div class="col-xs-1"><a onclick="bot(this)"><i class="fa fa-times fa-2x text-danger"></i></a></div></div>');
}
function bot(x){
    $(x).parent().parent().remove();
}
function scrollToZone(hash){   
    $('html, body').animate({scrollTop: $(hash).offset().top}, 1000);
}