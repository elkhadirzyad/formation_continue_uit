function construct_table(content,label)
        {
            

        var table_title='<p class="lienAnnonceCategorie" categorie="#" annonce="#"> <span class="fa fa-graduation-cap"></span> '+' '+label+'</p>';
            var table= "<table cellspacing='0' width='100%' id='example' class='advanced table table-bordered table-striped table-hover table-responsive '>	<thead>"+
 
           "<tr><th class='th-sm'>Titre </th><th>Responsable</th><th>Etablissement</th><th>Documents</th> </tr></thead>";

           table=table_title+'<br>'+table+content+'</table>';

           return table;



        }

        function construct_content_table(master_list,type,length)
        {
            
           var masters = "";
           for(var j=0; j<length; j++)
           {
            masters += '<tr height=50><td>'+master_list[j]['titre']+ '</td>'+
            '<td>Pr.'+master_list[j]['Responsable']+'</td>'+
            
            '<td>'+master_list[j]['Etab']+'</td>'
            if (type=="master")
            {
             masters +='<td><a href="/home/masters/contrat/'+master_list[j]['titre']+'">contrat </a>';
             masters +='|<a href="/home/masters/descriptif/'+master_list[j]['desc']+'">descriptif </a> </td>';
            }
            else
            {
            masters +='<td><a href="/home/licences/contrat/'+master_list[j]['titre']+'">contrat </a>';
            masters +='|<a href="/home/licences/descriptif/'+master_list[j]['desc']+'">descriptif </a> </td>';
            }
            
            masters +='</tr>';
    
             
            }

                return masters;



        }

        

        