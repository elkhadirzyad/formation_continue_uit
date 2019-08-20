function detailcommand(idCommande) {
	
	
	
	var json = $.parseJSON($("#json" + idCommande).text());
	

	
	var detailHtml = "";
	if(json) {
		for(var index = 0; index < json.length; index++) {
			detailHtml += 
						"<tr>"+
							"<td>" + json[index].article.codeArticle + "</td>"+
							"<td>" + json[index].quatity + "</td>"+
							"<td>" + json[index].prixunitaire + "</td>"+
							"<td>0</td>"+
						"</tr>";
		}
		$("#detailCommande").html(detailHtml);
	}
		
}
	///////////////////////////////get product cart////////////////////////////////////////


	

