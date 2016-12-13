@extends('layout.mainLayout')

@section('content')
    <!-- desktop-->
    <div class="container" align="center">
        <h1 class="titleMenu">{{$title}}</h1>
    </div>
    
    <div class="container">
        <nav id="menu">
            <h1 id="sitename">Route</h1>
            <ul id="foro">
            <li><a href="#">Home</a><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>
            </ul>
        </nav>
    </div>

    <div id="desktop" class="container" >
        
        <input id="folder" type="hidden" value="{{ $link }}">
        
        <div class="window" style="background-color:white;">
            <div class="barra">
                <button id="before" type="button" class="boton" aria-label="Left Align">
                  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                </button>
                <button id="after" type="button" class="boton" aria-label="Left Align">
                  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                </button>
                <button id="close" type="button" class="boton" aria-label="Left Align">
                  <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                
                <label id="titwin">Carpeta o archivo</label>
            </div>
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
            <div id="cw"></div>
            <div id="ff"></div>
        </div>
        
        <br><br><br><br><br><br><br><br>
        
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            getResource($("#folder").val());
            addDir($("#folder").val());
            updatePath();
            changeTitle();
            //getResource("ss");
            
            //this.current = $("#folder").val();
            
            
            $('#before').hide();
            $('#after').hide();
            $('#close').hide();
            $('#ff').hide();
            
        });
        
        var pages = [];
        var pointer = -1;
        //var before = "";
        //var current = "";
        //var after = "";
        //var folder = "";
        
        $('#before').click(function(){
                 //getResource(before);
                getBack();
                updatePath();
        });
        $('#after').click(function(){
             //getResource(after);
            getNext();
            updatePath();
        });
        
        function shortText(text, length){
            
            if(text.length > length){
                text = text.substring(0,length)+"...";
            }
            
            return text
        }
        
        function getViewer(file){
            return "<iframe src='http://docs.google.com/gview?url="+file+"&embedded=true' width ='100%' height='600'></iframe>";
        }
        
        function closeViewer(){
            //console.log(folder);
            //$("#cw").html(folder);
            $('#cw').show();
            $('#before').show();
            $('#close').hide();
            $('#ff').hide();
            changeTitle();
        }
        
        function updatePath(){
            //alert(pages[pointer]);
            element = pages[pointer];
            elements = element.split("/");
            
            path = "";
            
            for(i = 1; i < elements.length; i++){
               path += '<li><a href="#">'+elements[i]+'</a><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>'; 
            }
            //alert(path);
            $("#foro").html(path);
        }
        
        function addDir(dir){
            
            if((pages.length-1) > pointer){
                pages.length = pointer+1;
            }
            
            pointer++;
            pages.push(dir);
            
            //this.current = this.pages.pop();
            //alert(this.pointer+" "+this.current);
            //alert(pointer+" "+pages[pointer-1]+" "+pages.length);
            
            console.log(pages);
            
            if(pages[pointer-1] != null){
                $('#before').show();
            }
            $('#after').hide();
        }
        
        function getBack(){
            pointer--;
            getResource(pages[pointer]);
            if(pages[pointer-1] == null){
                $('#before').hide();
            }
            $('#after').show();
            changeTitle();
        }
        
        function getNext(){
            pointer++;
            getResource(pages[pointer]);
            if(pages[pointer+1] == null){
                $('#after').hide();
            }
            $('#before').show();
            changeTitle();
        }
        
        function changeTitle(title){
            
            if(title == null){
                element = pages[pointer];
                elements = element.split("/");
                $('#titwin').html(elements[elements.length-1]);
            }else{
                $('#titwin').html(title);
            }
        }
        
        function getResource(dir){
            
            //this.updatePosition();
            $("#cw").hide();
            
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
                    
                    name = shortText(data[i]["name"],14);
                    
                    value = '<div id="'+element+i+'" class="'+icon+'">'+data[i]["extension"]
                                +'<br><br><br><br><br>'
                                +'<input class="dir" type="hidden" value="'+data[i]["route"]+'">'
                                +'<input class="type" type="hidden" value="'+data[i]["type"]+'">'
                                +'<input class="asset" type="hidden" value="'+data[i]["asset"]+'">'
                                +'<input class="name" type="hidden" value="'+data[i]["name"]+'">'
                                +'<a href="#">'+name+'</a>'
                                +'</div>';
                    
                    
                    $("#cw").append(value);
                    
                    $("#element-dir"+i).dblclick(function(e) {
                        route = $(this).find(".dir").val();
                        
                        changeTitle($(this).find("a").html());
                        getResource(route);
                        addDir(route);
                        updatePath();
                        
                        //this.before = this.current;
                        //this.current = route;
                    }).mouseover(function(){ 
                        cn = $(this).find(".name").val();
                        $(this).find("a").html(cn);
                    }).mouseout(function(){
                         $(this).find("a").html(shortText($(this).find("a").html(), 14));
                    });
                        
                    $("#element-file"+i).dblclick(function(e) {
                        route = $(this).find(".asset").val();
                        changeTitle($(this).find("a").html());
                        viewer = getViewer(route);
                        
                        //window = $("#cw").html();
                        //folder = $("#cw").html();
                        $("#cw").hide();
                        $('#before').hide();
                        $('#after').hide();
                        
                        $("#ff").html(viewer);
                        $("#ff").show();
                        
                        $('#close').click(function(){
                            closeViewer();
                        });
                        
                        $('#close').show();
                       
                    }).mouseover(function(){ 
                        cn = $(this).find(".name").val();
                        $(this).find("a").html(cn);
                    }).mouseout(function(){
                         $(this).find("a").html(shortText($(this).find("a").html(), 14));
                    });
                }

                }else{
                    $("#cw").append("<div align='center' class='alert alert-warning'>Esta carpeta esta vacia</div><br><br><br><br><br><br>");
                }
                
                $("#cw").show();
                
            }).fail(function(data) {
                console.log(data);
                $("#cw").append("<div class='alert alert-danger'>Falla al cargar los archivos</div>");
            });
        }
   
    </script>
@endsection