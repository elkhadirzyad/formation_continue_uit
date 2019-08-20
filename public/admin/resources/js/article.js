$(document).ready(function(){

	$("body").delegate("#tauxTva","keyup",(function(event){ 

		//event.preventDefault();
		//event.preventDefault();
      // alert("salam");
       
		//var pid=$(this).attr("pid"); /// get the product price

		var prh=$("#prixUnitaireHt").val();
		
		var tva=$("#tauxTva").val();

		//var id="#"+pid; //// get the id of the price field
		
		//var pr="#price"+pid;
		
		var tvaval=parseFloat((tva*prh)/100);
		
		var total=tvaval+parseFloat(prh);

		$("#prixUnitaireTtc").val(total);
}))

$("body").delegate("#prixUnitaireHt","keyup",(function(event){ 

		//event.preventDefault();
		//event.preventDefault();
      // alert("salam");
       
		//var pid=$(this).attr("pid"); /// get the product price

		var prh=$("#prixUnitaireHt").val();
		
		var tva=$("#tauxTva").val();

		//var id="#"+pid; //// get the id of the price field
		
		//var pr="#price"+pid;
		
		var tvaval=parseFloat((tva*prh)/100);
		
		var total=tvaval+parseFloat(prh);

		$("#prixUnitaireTtc").val(total);
}))

})

	///////////////////////////////get product cart////////////////////////////////////////


	

