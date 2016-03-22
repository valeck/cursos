
  $('a[data-toggle="tab"]').click(function() {
      
      var activeForm = $(this).attr('href');

      $(activeForm).tab('show');

  });

$('#nwAdmin div input[type="submit"]').click(function(e){
  e.preventDefault();
  var url = $('#nwAdmin').attr('action');
  var method = $('#nwAdmin').attr('method')
  var data = $('#nwAdmin').serialize();

  $.ajax({
      url : url,
      type : method,
      data : data,
      error : function( jqXHR, textStatus, errorThrown ) {
     if ( console && console.log ) {
         console.log( "La solicitud a fallado: " +  textStatus);
     }},
      success : function( data, textStatus, jqXHR ) {
     if ( console && console.log ) {
         console.log( "La solicitud se ha completado correctamente.");
         $('#mensaje').html("La solicitud se ha completado correctamente.");
     }},
  });

})