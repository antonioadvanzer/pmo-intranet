@extends('layout.mainLayout')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- desktop-->
    <div class="container" align="center">
        <!--<h1 class="titleMenu">Unidades de Negocio</h1>-->
    </div>
    <div id="desktop" class="container" >
        <br><br>
        
        <nav id="mm" class='menu'>
            <!--<a class="nav" href="pmo/organizacion.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-sitemap" aria-hidden="true"></i>--
                </div>
                <i class="fa fa-sitemap fa-6" aria-hidden="true"></i>
                <div class="icon">Organización</div>
            </a>
            <a class="nav" href="pmo/modelo.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-gear fa-spin"></i>--
                </div>
                <i class="fa fa-gear fa-spin fa-6" aria-hidden="true"></i>
                <div class="icon">Modelo</div>
            </a>
            <a class="nav" href="pmo/planeacion_y_metodologia.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-book fa-fw"></i>--
                </div>
                <i class="fa fa-book fa-fw fa-6" aria-hidden="true"></i>
                <div class="icon">Planeación y Metodología</div>
            </a>
            <a class="nav" href="pmo/seguimiento.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-retweet"></i>--
                </div>
                <i class="fa fa-retweet fa-6" aria-hidden="true"></i>
                <div class="icon">Seguimiento</div>
            </a>
            <a class="nav" href="pmo/implementacion.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-cloud-laravel-upload"></i>--
                </div>
                <i class="fa fa-cloud-laravel-upload fa-6" aria-hidden="true"></i>
                <div class="icon">Implementación</div>
            </a>
            <a class="nav" href="pmo/golive.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-rss"></i>--
                </div>
                <i class="fa fa-rss fa-6" aria-hidden="true"></i>
                <div class="icon">GoLive</div>
            </a>
            <a class="nav" href="pmo/cierre_de_proyecto.html" target="main">
                <div class="icon">
                    <--<i class="fa fa-sign-out"></i>--
                </div>
                <i class="fa fa-sign-out fa-6" aria-hidden="true"></i>
                <div class="icon">Cierre del Proyecto</div>
            </a>-->
            
            @foreach($pmo as $p)
            
            <!--<a class="nav" href="pmo-web/main" target="main">-->
            <a class="nav" href="#">
                <div class="icon">
                    <!--<i class="fa fa-sitemap" aria-hidden="true"></i>-->
                </div>
                <input class="dirgd" type="hidden" value="{{ $p['link'] }}">
                <i class="fa {{ $p['icon'] }} fa-6" aria-hidden="true"></i>
                <div class="icon">{{ $p['elementName'] }}</div>
            </a>
            
            @endforeach
            
        </nav>
            
        <!-- Modal Window -->
        <div id="modal" class="hide" style="background-color:white;">
            <div id="barra">
                <div class="col-xs-8" align="left">
                    <span class="glyphicon glyphicon-remove" id="back"></span>
                </div>
                <div class="col-xs-8" align="center">
                    <label id="title">Titulo</label>
                </div>
            </div>
            
            <!--<iframe name="main" frameborder=0 width="100%" height="85%"></iframe>-->
            <div class="container">
                <nav id="menu">
                    <h1 id="sitename">Route</h1>
                    <ul id="foro">
                    <li><a href="#">Home</a><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>
                    </ul>
                </nav>
            </div>
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
            <div id="cw"></div>
            <div id="ff"></div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        
        var pages = [];
        var pointer = -1;
        
        $(document).ready(function(){
            
            $('#before').hide();
            $('#after').hide();
            $('#close').hide();
            $('#ff').hide();
        });
        
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
        
        // Open Modal Window
        $(".menu a").click(function(e) {

            //$("#mm").animate({right: '50%',opacity: '0.09',});
            //$("#mm").addClass("hide");

            var title = $(this).text();
            //alert(title);

            $("#title").text(title);

            $("#mm").hide('slow');

            $("#modal").show('slow');

            $("#modal").removeClass("hide");
            $("#modal").addClass("window");

            getResource($(this).find(".dirgd").val());
            addDir($(this).find(".dirgd").val());
            updatePath();
        });

        // Close Modal Window
        $("#back").click(function() {

            $("#modal").hide('fast');

            $("#modal").removeClass("window");
            //$("#modal").addClass("hide");

            $("#mm").show('slow');

            //$("#mm").animate({left: '50%',opacity: '0.1',});
            
            pages = [];
            pointer = -1;
            $('#before').hide();
            $('#after').hide();
        });
        
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
                            
                     value = '<div id="'+element+i+'" class="'+icon+'">'+data[i]["extension"]
                                +'<br><br><br><br><br>'
                                +'<input class="dir" type="hidden" value="'+data[i]["route"]+'">'
                                +'<input class="type" type="hidden" value="'+data[i]["type"]+'">'
                                +'<input class="asset" type="hidden" value="'+data[i]["asset"]+'">'
                                +'<a href="#">'+data[i]["name"]+'</a>'
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