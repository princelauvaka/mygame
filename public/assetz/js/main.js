$( document ).ready(function() {
        //Close cart
    $(document).on('click','.delete-one',function(e){
    		e.preventDefault();
    		// console.log('testing');
        	$('.areyousure').slideDown(100);
    });

});