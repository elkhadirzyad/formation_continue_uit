$(document).ready(function () {

    


    /*** charger annonce principale ***/
$(".lienAnnoncePrincipal").click(function (e) {
    e.preventDefault();
    

    $("#list_from_ajax").html("");

var idAnnonce=$(this).attr('annonce');

var t= $(this).text();

$("#titreEvents span.leTitre").html(t);
$("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
//document.getElementById("list_from_ajax").innerHTML='<object type="html" data="test.html" ></object>';
$("#list_from_ajax").load('annonces/annonce'+idAnnonce+'.html');

    
});





    /****** charger evenement *******/
    $(".lienEvenement").click(function (e) {
        e.preventDefault();
        var heightCar=$("#myCarousel").css('height'), heightHead=$("header").css('height');

        $("#detailAnnonce").html("");

        var idAnnonce=$(this).attr('annonce');
        $.ajax({
            type:'post',
            dataType: 'json',
            url: Routing.generate('detailAnnonceFront',{id:idAnnonce}),
            beforeSend: function () {
                $("#loaderAnnonce").css('display','block');
                //$("html, body").animate({ scrollTop: $('#scroll').offset().top }, 1000);
            },
            success: function (data) {
                $("#titreEvents span.leTitre").text("EVENEMENT");
                $("#titreEvents a").css(
                    {
                        'font-size':'25px',
                        'margin-top':'-6px',
                        'margin-left':'40px'
                    }
                );
                $("#titreEvents a").html("<span class='fa fa-home'></span>");
                $("#loaderAnnonce").css('display','none');
                $("#detailAnnonce").html(data);

            }
        });

    });


    /****** charger colloque *******/
    $(".lienColloque").click(function (e) {
        e.preventDefault();
        var heightCar=$("#myCarousel").css('height'), heightHead=$("header").css('height');

        $("#detailAnnonce").html("");

        var idAnnonce=$(this).attr('annonce');
        $.ajax({
            type:'post',
            dataType: 'json',
            url: Routing.generate('detailAnnonceFront',{id:idAnnonce}),
            beforeSend: function () {
                $("#loaderAnnonce").css('display','block');
                $("html, body").animate({ scrollTop: $('#scroll').offset().top }, 1000);
            },
            success: function (data) {
                $("#titreEvents span.leTitre").text("COLLOQUE");
                $("#titreEvents a").css(
                    {
                        'font-size':'25px',
                        'margin-top':'-6px',
                        'margin-left':'40px'
                    }
                );
                $("#titreEvents a").html("<span class='fa fa-home'></span>");
                $("#loaderAnnonce").css('display','none');
                $("#detailAnnonce").html(data);

            }
        });

    });


    $(".lienFaculte").click(function () {
        $("#detailAnnonce").html("");
        $.ajax({
            type:'post',
            dataType: 'json',
            url: Routing.generate('pageFaculteFront'),
            beforeSend: function () {
                $("#loaderAnnonce").css('display','block');
                $("html, body").animate({ scrollTop: $('#scroll').offset().top }, 1000);
            },
            success: function (data) {
                $("#titreEvents span.leTitre").text("FACULTE");
                $("#titreEvents a").css(
                    {
                        'font-size':'25px',
                        'margin-top':'-6px',
                        'margin-left':'40px'
                    }
                );
                $("#titreEvents a").html("<span class='fa fa-home'></span>");
                $("#loaderAnnonce").css('display','none');
                $("#detailAnnonce").html(data);

            }
        });

    });

    $(".lienRecherche").click(function () {
        $("#detailAnnonce").html("");
        $.ajax({
            type:'post',
            dataType: 'json',
            url: Routing.generate('pageRechercheFront'),
            beforeSend: function () {
                $("#loaderAnnonce").css('display','block');
                $("html, body").animate({ scrollTop: $('#scroll').offset().top }, 1000);
            },
            success: function (data) {
                $("#titreEvents span.leTitre").text("RECHERCHE");
                $("#titreEvents a").css(
                    {
                        'font-size':'25px',
                        'margin-top':'-6px',
                        'margin-left':'40px'
                    }
                );
                $("#titreEvents a").html("<span class='fa fa-home'></span>");
                $("#loaderAnnonce").css('display','none');
                $("#detailAnnonce").html(data);

            }
        });

    });

    $(".corps_administratif").click(function () {

        $("#list_from_ajax").html("");
        const url=this.href;
        var t= $(this).text();
       
       
        $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
           
           $("#titreEvents span.leTitre").html(t);

          
   

            $("#loaderAnnonce").css('display','none');
            $("#list_from_ajax").load('static_pages/corps.html');
           

        
        
    });


    $(".lienContact").click(function () {

        //e.preventDefault();

        $("#list_from_ajax").html("");
        const url=this.href;
        var t= $(this).text();
       
       
        $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
           
           $("#titreEvents span.leTitre").html(t);

          
   

            $("#loaderAnnonce").css('display','none');
            $("#list_from_ajax").load('static_pages/contact.html');
           

       


      
    });


    $(".lienMotDoyen").click(function () {

        $("#list_from_ajax").html("");
        const url=this.href;
        //var t= $(this).text();
       
       
        $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
           
           $("#titreEvents span.leTitre").html("Mot Du Directeur");

          
   

            $("#loaderAnnonce").css('display','none');
            $("#list_from_ajax").load('static_pages/motDirecteur.html');

        
    });

    $(".presentation").click(function () {

        $("#list_from_ajax").html("");
        const url=this.href;
        var t= $(this).text();
       
       
        $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
           
           $("#titreEvents span.leTitre").html(t);

          
   

            $("#loaderAnnonce").css('display','none');
            $("#list_from_ajax").load('static_pages/presentation.html');

        
    });


         /////////// generate array from ////////////////////////
    $(".cycle").click(function (e) {
        e.preventDefault();

        $("#list_from_ajax").html("");
        const url=this.href;
        var t= $(this).text();

        $("#loaderAnnonce").css('display','block');
        $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',

            beforeSend: function(){
                $("#loaderAnnonce").css('display','block');
        $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
              },
            
            success: function(response) {
                console.log(response);
                $("#titreEvents span.leTitre").html(t);
           var result = "";
           
           
            result += construct_table(construct_content_table(response.cycle,response.type,response.cycle.length),"Liste des formations");
            
            ///////// make advanced table 

            result=result +'<script>'+
            '$(".advanced").dataTable();'+'</script>';

             ///////// it ends here

            $("#loaderAnnonce").css('display','none');
            $("#list_from_ajax").html(result);
            }
        });

       


    });

        /////////////// get list inside div //////////////////////

        
    ////////////////////// ajax inside div //////////////////////////

    $(".domaine").click(function (e) {
        e.preventDefault();

        $("#list_from_ajax").html("");
        const url=this.href;
        var t= $(this).text();


      
           
            
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                beforeSend: function(){
                    $("#loaderAnnonce").css('display','block');
            $("html, body").animate({ scrollTop: $(window).height()-100 }, 600);
                  },

                
                success: function(response) {

                    console.log(response);

                    $("#titreEvents span.leTitre").html("DOMAINES DE SPECIALITÉ "+">>"+""+t);

           
       
           
        var masters=response.master;

        var licences=response.licence;
        
        table_master="";

        table_licence="";

        
       // alert(response.data.var);
        if (masters.length!=0)
        {
        table_content_master=construct_content_table(masters,'master',masters.length);
        

        table_master=construct_table(table_content_master,"Liste des masters");
  
        }

        

        if (licences.length!=0)
        {
        table_content_licence=construct_content_table(licences,'licence',licences.length);

        table_licence=construct_table(table_content_licence,"Liste des licences");

        }
       
            ///////// make advanced tables

         tables=table_master+table_licence+'<script>'+
         '$(".advanced").dataTable();'+'</script>';

         ////////////// it ends here
       
       
        $("#loaderAnnonce").css('display','none');
         $("#list_from_ajax").html(tables);
                   
           
      },
          
      error: function(response){

        alert("error");

    }   
       

        


    })

    


   
   




});

})