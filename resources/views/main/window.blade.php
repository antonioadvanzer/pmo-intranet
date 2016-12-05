@extends('layout.mainLayout')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- desktop-->
    <div class="container" align="center">
        <h1 class="titleMenu">Archivos</h1>
    </div>
    <div id="desktop" class="container" >
        <br><br>
        <input id="folder" type="hidden" value="{{ $link }}">
        <div id="cw" class="window" style="background-color:white;">
            <!--<div class="ico folder">
                <br><br><br><br><br><a href="#">Arquitectura e instalaci&oacute;n</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Diseño organizacional y operaciones</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Personalizaci&oacute;n de instancia</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Planos de negocio</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Configuraci&oacute;n (gaps cliente)</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Agregados funcionales</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Datos maestros</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Pruebas unitarias</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Pruebas integrales</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Manuales de usuario</a>
            </div>
            <div class="ico folder">
                <br><br><br><br><br><a href="#">Roles y perfiles</a>
            </div>
            <div class="icon ppt">PPT
                <br><br><br><br><a href="#">Modelo implementado (final)</a>
            </div>
            <div class="icon mpp">MPP
                <br><br><br><br><a href="#">Plan de proyecto final (real)</a>
            </div>-->
            
        </div>
        
        <br><br><br><br><br><br><br><br>
        
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            getResource($("#folder").val());
            //getResource("ss");
            
            this.current = $("#folder").val();
            
            
            /*$("div.element-dir").bind("click", function(e) {
                //route = $(this).find(".dir").value();
                //alert(route);
                alert("aaa");
            });*/
            
        });
        
        var before = "";
        var current = "";
        var after = "";
        var window = "";
        
        function getViewer(file){
            return "<iframe src='http://docs.google.com/gview?url="+file+"&embedded=true' width ='100%' height='600'></iframe>";
        }
        
        function getResource(dir){
            
            this.before = current;
            this.current = dir;
            
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
                    
            $.ajax({

                url: "{{ URL::to('foldersAndFiles') }}",
                type: "POST",
                data:{
                    _token: $('meta[name=_token]').attr('content'),
                    dir: dir
                    },
                dataType: "json"

            }).done(function(data) {
                console.log(data);
                $("#cw").html("");
                var icon = "";
                var type = "";
                var element = "";
                
                if(data.length > 0){
                
                    for(i = 0; i < data.length; i++){
                    
                    if(data[i]["type"] == "dir"){
                        icon = "ico folder";
                        element = 'element-dir';
                        
                    }else if(data[i]["type"] == "file"){
                        element = 'element-file';
                        switch(data[i]["extension"]){
                            case "pdf":
                                icon = "icon pdf";
                            break;
                            case "doc":
                                icon = "icon doc";
                            break;
                            case "xls":
                                icon = "icon xls";
                            break;
                            case "ppt":
                                icon = "icon ppt";
                            break;
                            case "docx":
                                icon = "icon doc";
                            break;
                            case "xlsx":
                                icon = "icon xls";
                            break;
                            case "pptx":
                                icon = "icon ppt";
                            break;
                            case "mpp":
                                icon = "icon mpp";
                            break;
                        }
                    }
                            
                     value = '<div id="'+element+i+'" class="'+icon+'">'+data[i]["extension"]
                                +'<br><br><br><br><br>'
                                +'<input class="dir" type="hidden" value="'+data[i]["route"]+'">'
                                +'<input class="type" type="hidden" value="'+data[i]["type"]+'">'
                                +'<input class="asset" type="hidden" value="'+data[i]["asset"]+'">'
                                +'<a href="#">'+data[i]["name"]+'</a>'
                                +'</div>';
                    
                    $("#cw").append(value);
                    
                    $("#element-dir"+i).click(function(e) {
                        route = $(this).find(".dir").val();
                        //alert(route);
                        getResource(route);
                        //getResource("ss");
                        
                        before = this.current;
                        current = route;
                    });
                        
                    $("#element-file"+i).click(function(e) {
                        route = $(this).find(".asset").val();
                        
                        viewer = getViewer(route);
                        
                        window = $("#cw").html();
                        
                        $("#cw").html(viewer);
                       
                    });
                }
                
                }else{
                    $("#cw").append("<div align='center' class='alert alert-info'>Esta carpeta esta vacia</div><br><br><br><br><br><br>");
                }
                
            }).fail(function(data) {
                console.log(data);
                $("#cw").append("<div class='alert alert-danger'>Falla al cargar los archivos</div>");
            });
        }
   
    </script>
@endsection