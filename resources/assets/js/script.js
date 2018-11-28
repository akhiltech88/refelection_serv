$(document).ready(function () {
    $('select').formSelect();
});

(function ($) {
	$(function () {

		$('.sidenav').sidenav();
		$('.parallax').parallax();

	}); 
})(jQuery); 

  $(document).ready(function () {
  	$('.tabs').tabs();
  });
 instances = {};
 document.addEventListener('DOMContentLoaded', function () {
     var elems = document.getElementById('modal1');
     instances = M.Modal.init(elems);
 });
$(function () {
    $("#imgGrid").mosaic({
        maxWidth: 250,
        onClick: function() {
            urlFull = $(this).data("full");
            $('#model-img').attr('src', urlFull);
            openDialog();
        }
    });
});

function openDialog() {
    instances.open();
}
 document.addEventListener('DOMContentLoaded', function () {
     var elems = document.querySelectorAll('.datepicker');
     var datepicker = M.Datepicker.init(elems, {
         format:'dd-mm-yyyy',
         autoClose: true,
         yearRange: 1000
     });
 });

function anyThing(destroyFeedback) {
    destroyFeedback(true);
}

$(function () {


    var stepperDiv = document.querySelector('.stepper');
    if (stepperDiv) {
     var stepper = new MStepper(stepperDiv);
    }

})
