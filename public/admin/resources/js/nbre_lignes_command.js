function display_command_lines(){ 
	
	var articles = $.parseJSON($("#id_articles").text());
	
	var command_id=$("#id_commande").val();
	
	//var json = $.parseJSON($("#json" + idCommande).text());
	
	alert(command_id);
	
	var nbrel=$("#nbre_lignes").val();
	
	//alert(articles.length);
	var article_options= "";
	
	
	for (var index_articles=0; index_articles<articles.length;index_articles++)
		{
	
		article_options+="<option value = "+articles[index_articles].idArticle+"> "+articles[index_articles].idArticle+"</option>";
		}
	
	
	var commandelines = "";

		for(var index = 0; index < nbrel; index++) {
			//var values = [];
			
   

			commandelines +=
				"<tr id='line"+index+"'>"+
					"<td>" + "<select class = 'form-control' id='listArticles'>"+
					
					article_options+
	             	
	             
	             "</select>"+"</td>"+
	             
	             
					"<td>" + "<input class='form-control' placeholder='pu' id='prixunitaire"+index+"' />" + "</td>"+
					"<td>"  + "<input class='form-control' placeholder='qty' id='qty"+index+"'  />" + "</td>"+
					"<td><a href='#' id='add"+index+"' onclick='savelignecommande("+index+")'><i class='fa fa-plus'></i></a></td>"+
				"</tr> ";
		
		
			 
		}
		
		$("#Commandeline").html(commandelines);
		
		
	
		
}

function savelignecommande(a){ 
	
	var price=$("#prixunitaire"+a).val();
	var qty=$("#qty"+a).val();
	
	var id_command=$("#id_commande").val();
	
	var id_article=$("#listArticles").val();
	
	 var data = 'prixunitaire='
         + encodeURIComponent(price)
         + '&qty='
         + encodeURIComponent(qty)
	     + '&id_command='
         + encodeURIComponent(id_command)
	     + '&id_article='
	     + encodeURIComponent(id_article);
	     
	
	$.ajax({
       
        type: "GET",
        data: data,
        url: "http://localhost:8011"+$("#Commandeline").attr("attr"),
        success: function(data) {
            alert('successfully done');
            
           // document.getElementById("#line"+a).style.visibility='hidden';
            var link = document.getElementById('line'+a);
            link.style.display = 'none';
           // $("#add"+a).css({'visibility':'hidden'});
        },
        error: function(jqXHR, textStatus, errorThrown) {
           // alert('error while post');
            
            alert("http://localhost:8011"+$("#Commandeline").attr("attr"));
        }

    });
	
	//alert(price);
		
		
			 
		}
		
		
		
		
	
		
