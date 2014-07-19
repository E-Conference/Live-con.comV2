<?php

/* fibeConferenceBundle:Import:index.html.twig */
class __TwigTemplate_2037b77e90d98a9d9fb89755205f3f7e1b1ad7a15489e7bb92ddf2c4af516a59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeConferenceBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'centerPanel' => array($this, 'block_centerPanel'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeConferenceBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Import data";
    }

    // line 4
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 5
        echo "
        <style>
        .col-sm-12 > .panel {
            margin-top: 1.5em;
        }

        .popover {
          position: absolute;
          top: 0;
          left: 0;
          z-index: 1010;
          display: none;
          max-width: 600px;
          min-width: 300px;
          padding: 1px;
          text-align: left;
          white-space: normal;
          background-color: #ffffff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 6px;
             -moz-border-radius: 6px;
                  border-radius: 6px;
          -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
             -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
          -webkit-background-clip: padding-box;
             -moz-background-clip: padding;
                  background-clip: padding-box;
        }
        .popover-content {
            
          max-height: 600px;  
        }

        #datafile-form .list-group-item{
            cursor: move;
        }
        .panel-heading, .panel>.list-group .list-group-item { 
            padding: 0.5em;
        }
        </style>
    ";
    }

    // line 48
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 49
        echo "    ";
        $this->displayParentBlock("centerPanel", $context, $blocks);
        echo "


    <div class=\"col-sm-12 col-md-12 col-lg-12\">

        <h2 id=\"desc-header\" class=\"text-info\">Step 1 : Please select the file to import</h2>
        <div id=\"progress-header\" class=\"progress progress-striped active\">
          <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" style=\"width: 5%;\">
          </div>
        </div>

        <div id=\"page-data-file\" class=\"page\">
             <form id=\"datasetFileForm\"  class=\"input-append\">
                <label for=\"datasetFile\"> 
                    Available input format are : 
                        <span class=\"badge badge-success\" ><i class=\"fa fa-check\" ></i>  XML</span>
                        <span class=\"badge badge-success\"><i class=\"fa fa-check\" ></i>  XLS</span>
                      
                    
                </label> 
                <div class=\"input-group\">
               <span class=\"input-group-addon\">File to import</span>
                        
                    <input id=\"datasetFile\" class=\"btn btn-primary \" title=\"Search for a file to add\" type=\"file\"/>
                </div> 
            </form>  
            <h3 class=\"text-info\">Clean conference</h3> 
            <a  class=\"empty-conf btn btn-danger btn-xs\" 
                ";
        // line 77
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "isEmpty")) {
            // line 78
            echo "                disabled=\"disabled\" 
                ";
        } else {
            // line 79
            echo " 
                ";
        }
        // line 81
        echo "                href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("schedule_conference_empty", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "id"))), "html", null, true);
        echo "\"> 
                <i class=\"fa fa-trash-o\"></i> Clean conference
            </a> 
        </div>

        <div id=\"page-mapping-file\" data-progress=\"20\" data-desc=\"Step 2 : Please select a mapping file to use\" class=\"page\" style=\"display:none;\">   
            <form id=\"form-known-mapping-format\">
                <label>
                    Choose a known format : 
                </label><br/>
                <select id=\"known-mapping-format\" required=\"false\">
                    <option selected=\"selected\" value=\"swc\">RDF/OWL ( SWC / FOAF ontology ) </option>
                    <option value=\"ocs\">OCS format</option>
                </select>
                <button type=\"submit\" class=\"btn btn-default \"><i class=\"fa fa-play\"></i> Process import</button>
            </form>
            <br/>
            <label> 
                Or import your own format :
            </label> <br/>
             <select id=\"file-format\" required=\"false\">  
                    <option selected=\"selected\" value=\"xml\">xml</option> 
                    <option value=\"xlsx\">xlsx</option> 
                </select>  
            <button id=\"new-mapping\" class=\"btn btn-default \"><i class=\"fa fa-plus\"> </i>  New mapping file </button>
        </div>

        <div id=\"page-new-mapping-file\" data-progress=\"35\" data-desc=\"Step 3 : Drag and drop your data and import them!\"  class=\"page\" style=\"display:none;\">
            <div style=\"margin: 15px;\"> 
                <button id=\"submit-new-mapping\" class=\"btn btn-success btn-lg\"><i class=\"fa fa-play-circle\"></i> Try your mapping </button>
            </div>
            <div id=\"datafile-form\" class=\"col-sm-6 col-md-6 col-lg-6\"></div>
            <div id=\"model-form\"  class=\"col-sm-6 col-md-6 col-lg-6\"></div>
        </div>   

        <div id=\"page-result\" class=\"page\" data-progress=\"70\" data-desc=\"Final step : send us the dataset\"  style=\"display:none;\">
            <button id=\"back-to-mapping\" style=\"display:none;\" type=\"submit\" id=\"send-data\" class=\"btn btn-primary btn-lg \"><i class=\"fa fa-arrow-left\"></i> Back to the mapping </button>
            <button type=\"submit\" id=\"send-data\" class=\"btn btn-success btn-lg \"><i class=\"fa fa-upload\"></i> Send </button>
            <h3 class=\"text-info\">Results</h3>
            <div id=\"result-extract\"></div>
        </div>  

        <div id=\"page-sending-file\" class=\"page\" data-progress=\"90\" data-desc=\"Sending file... \"  style=\"display:none;\"> 
        </div>   

        <div id=\"page-end\" class=\"page\" data-progress=\"100\" data-desc=\"You're done !\"  style=\"display:none;\"> 
            <h3 class=\"text-info\">Results</h3>
            <div id=\"result-import\"></div>
        </div>            
    </div>


  <!-- Modal -->
  <div class=\"modal fade\" id=\"confirmModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h3 class=\"modal-title\" id=\"myModalLabel\">Confirm empty</h3>
        </div>
        <div class=\"modal-body\">
          <form>
            <div class=\"modal-body\">
              <h4 class=\"text-wrning\">In order to confirm, type <b>Empty !</b> if you really want to empty the conference.</h4>
              <div class=\"input-group input-group-lg\"> 
                <input name=\"confirmEmptyInput\" id=\"confirmEmptyInput\" type=\"text\" class=\"form-control input-lg\" value=\"Empty ?\">
              </div> 
            </div>
            <div class=\"modal-footer\">
              <a class=\"btn btn-default\" data-dismiss=\"modal\">Close</a>
              <button type=\"submit\" class=\"btn btn-primary\">Save changes</button>
            </div>
          </form> 
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
   
 ";
    }

    // line 162
    public function block_javascripts_page($context, array $blocks = array())
    {
        echo " 
        <script type=\"text/javascript\" src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui.custom.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeexternalization/js/moment.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script> 

        <script src=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/Pager.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        
        <script src=\"";
        // line 168
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/Mapper.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        <script src=\"";
        // line 169
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/Importer.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        <script src=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/dbMapping/jsonModel.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>

        <script src=\"";
        // line 172
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xmlImport/xmlMapper.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        
        <script src=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xlsxImport/jszip.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        <script src=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xlsxImport/xlsx.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        <script src=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xlsxImport/xlsxMapper.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>

        <script src=\"";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xmlImport/rdf_config.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>
        <script src=\"";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xmlImport/ocs_config.js"), "html", null, true);
        echo "\" type=\"text/javascript\" ></script>

        <script src=\"";
        // line 181
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-file-input/bootstrap.file-input.js"), "html", null, true);
        echo "\"></script>  
        <script src=\"";
        // line 182
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-file-input/file-dropper.js"), "html", null, true);
        echo "\"></script>  

        <script type=\"text/javascript\" >

        var mapper = new Mapper();
        \$(document).ready(function(){

            /*********      handle change page workflow  **********/
            Pager.initialize(\$(\"#page-data-file\")); 
            var selectDataFile           = document.getElementById(\"datasetFile\");  
            var formKnownMappingFormat   = document.getElementById(\"form-known-mapping-format\");  
            var selectKnownMappingFormat = document.getElementById(\"known-mapping-format\");  
            var selectFileFormat         = document.getElementById(\"file-format\");  
            var selectMappingFile        = document.getElementById(\"submit-new-mapping\");   
            var newMappingFile           = document.getElementById('new-mapping'); 
            var backToMapping            = document.getElementById('back-to-mapping'); 
            var sendData                 = document.getElementById('send-data'); 
            
            fileDropper(datasetFile,handleDataFileChange);
            
            if(newMappingFile.addEventListener) {
                newMappingFile.addEventListener('click', handleNewMappingFile, false);
            }
            
            if(formKnownMappingFormat.addEventListener) {
                formKnownMappingFormat.addEventListener('click', handleKnownMappingFormat, false);
            } 
            if(selectMappingFile.addEventListener) {
                selectMappingFile.addEventListener('click', handleImport, false);
            } 
            if(backToMapping.addEventListener) {
                backToMapping.addEventListener('click', handleBackToMapping, false);
            } 
            if(sendData.addEventListener) {
                sendData.addEventListener('click', handleSendSerializedConf, false);
            } 




            /*********       run the importer and send the serialized obj to php   **********/ 
            var ConfRdfFile; 


            ///confirm empty 
            \$('.empty-conf').click(function(){
                confirmEmpty(function(){
                    window.location = \"";
        // line 229
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("schedule_conference_empty", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "id"))), "html", null, true);
        echo "\";
                })
                return false;
            }); 
 
         }); 

        


        function handleDragover(e) {
                e.stopPropagation();
                e.preventDefault(); 
                \$(\".droppable-input\").css(\"border-color\",\"green\")
                           .find(\"> span\").css({\"color\":\"#444\"});
        }

        function handleDragleave(e) {
                e.stopPropagation();
                e.preventDefault();
                \$(\".droppable-input\").css(\"border-color\",\"#bbb\")
                           .find(\"> span\").css({\"color\":\"#bbb\"});
        }


         function handleDataFileChange(file) {

            Pager.changePage('#page-mapping-file'); 
            mapper.setFile(file); 
        }
        

        function handleKnownMappingFormat(e){
                e.stopPropagation();
                e.preventDefault(); 
 
                \$(\"#back-to-mapping\").hide();
                \$(mapper).off(\"fileRead\").on(\"fileRead\",function(ev,data){
                    extractDatas();
                })
                mapper.setKnownMapping(\$(\"#known-mapping-format\").val())
                      .readFile();
                      console.log(mapper.getMapping())
        }

         function handleImport(e) {
                e.stopPropagation();
                e.preventDefault();
                mapper.generateMappingFile(); 
                extractDatas();  
                \$(\"#back-to-mapping\").show();
        }

        function handleSendSerializedConf(e) {
                e.stopPropagation();
                e.preventDefault();
                Pager.changePage('#page-sending-file'); 
                bootstrapAlert(\"info\",' sending file...',\"Info : \",\"<i class='fa-2x fa fa-spinner fa-spin'></i>\");
                sendSerializedConf(mapper[\"serialisedDatas\"]); 

                //send file
                function sendSerializedConf(dataArray){
                    var data = {dataArray:JSON.stringify(dataArray)};
                    //DBimport
                    \$.ajax({ 
                        type: \"POST\",
                        cache: false,  
                        url: \"";
        // line 296
        echo $this->env->getExtension('routing')->getPath("schedule_admin_DBimport");
        echo "\",
                        data: data,
                        success:function(a,b,c)
                        {
                            Pager.changePage('#page-end');  
                            
                            \$(\"#result-import\").html(
                                getHtmlResultDiv(mapper[\"serialisedDatas\"],mapper[\"importedLog\"],mapper[\"notImportedLog\"],\"sent\")
                            );
                            bootstrapAlert(\"success\",getMsgUl(mapper[\"serialisedDatas\"],\"imported\"),\"Conference imported : \"+mapper.getConfName()); 
                        },
                        error:function(a,b,c)
                        {
                            bootstrapAlert(\"warning\",'import failed because : '+c);
                            console.log(a)
                            console.log(b)
                            console.log(c) 
                        }
                    });
                }
        } 

        function handleNewMappingFile(e) {

                e.stopPropagation();
                e.preventDefault();
                
                if(\$(\"#file-format\").val() == \"xml\"){
                    mapper.setMapper(xmlMapper); 
                }else{
                    var worker = new Worker(\"";
        // line 326
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibeconference/js/importer/xlsxImport/xlsxWorker.js"), "html", null, true);
        echo "\");
                    xlsxMapper.setWorker(worker);
                    mapper.setMapper(xlsxMapper); 
                }
                Importer().setUtils(mapper.getUtils()); 

                Pager.changePage('#page-new-mapping-file');
                \$(mapper).on(\"fileRead\",function(ev,data){
                    \$(this).off(\"mapEnd\").on(\"mapEnd\",function(ev,knownNodes,knownCollection){
                        this.initUi(\$(\"#datafile-form\"));
                    }); 
                    this.map();
                    Model.initialize(this);
                });
                mapper.readFile();
                Model.modelToTab(\$(\"#model-form\")) ;
        }

        function handleBackToMapping(e){
                e.stopPropagation();
                e.preventDefault();
                Pager.changePage('#page-new-mapping-file');
        }

        function extractDatas(op){
            if(!op)op={}; 
 
            Importer().setMappingConfig(mapper.getMapping()); 
            Importer().setUtils(mapper.getUtils()); 
            Importer().run( 
                mapper.getData(), 
                op,
                function(data,importedLog){
                    Pager.changePage('#page-result');
                    mapper[\"serialisedDatas\"] = data;
                    mapper.setImportedLog(importedLog); 
                    var notImportedLog = mapper.getNotImportedLog();
                    \$(\"#result-extract\").html(getHtmlResultDiv(data,importedLog,notImportedLog,\"extracted\"));
                    bootstrapAlert(\"success\",getMsgUl(mapper[\"serialisedDatas\"],\"extracted\"),\"conference parsed : \"+mapper.getConfName()); 
                },function(msg)
                { 
                    bootstrapAlert(\"warning\", msg || \"there was an error during extraction of datas\",\"Error :\"); 
                    // console.log(Mapper[\"data\"],mapping)
                }
            );  
        }



        //output results of import
        function getHtmlResultDiv(data,importedLog,notImportedLog,endMsg){
            var html=\$('<div class=\"row\"><div class=\"col-md-12 col-lg-4\"><div class=\"panel panel-primary\">\\
                                                  <!-- Default panel contents -->\\
                                                  <div class=\"panel-heading\">'+
                                                  mapper.getConfName()
                                                  +'</div>');

                    html.find(\".panel\").append(getMsgPanel(mapper[\"serialisedDatas\"],endMsg || \"found\"));
 
                    var importedNotImportedPanels = '<div class=\"col-sm-6 col-lg-4\"><div class=\"panel panel-info\">\\
                                                  <!-- Default panel contents -->\\
                                                  <div class=\"panel-heading\">Imported properties : </div>\\
                                                  <ul class=\"list-group\">'; 
                    for(var i in importedLog){
                        importedNotImportedPanels+= '<li class=\"list-group-item\">'+importedLog[i]+\"</li>\";
                    } 

                    importedNotImportedPanels+= '</ul></div></div><div class=\"col-sm-6 col-lg-4\"><div class=\"panel panel-info\">\\
                                                  <!-- Default panel contents -->\\
                                                  <div class=\"panel-heading\">Not imported properties : </div>\\
                                                  <ul class=\"list-group\">';
                    for(var i in notImportedLog){
                        importedNotImportedPanels+= '<li class=\"list-group-item\">'+notImportedLog[i]+\"</li>\";
                    }

                    return html.append(importedNotImportedPanels);
        }

        //confirm with a bootstrap modal then call callback
        function confirmEmpty(callback){
            var confirmModal = \$('#confirmModal');
            confirmModal
                .modal('show')
                .one('shown.bs.modal', function() {
                    \$(this).find(\"input\").first().focus();
                })
                .find(\"form\")
                    .one(\"submit\",function(e){
                        if(confirmModal.find(\"input\").val() === \"Empty !\"){
                            callback();
                            confirmModal.modal('hide');
                            return false;
                        }
                        else{
                            bootstrapAlert(\"info\",' Conference clear cancelled.');
                            confirmModal.modal('hide');
                            return false;
                        }
                    });
        }

        // output imported object
        function getMsgUl(dataArray,endString,panelMode){
            var msg = \"\";
            msg += \"<ul\"+(panelMode?' class=\"list-group\" ':'')+\">\"; 
            for (var i in dataArray) 
                if(dataArray[i] && dataArray[i].length >0)
                    msg +=\"<li\"+(panelMode?' class=\"list-group-item\" ':'')+\">\"+dataArray[i].length +\" \"+i+\" \"+endString+\" !</li>\"

            return msg + \"</ul>\";
        }

        // output imported object
        function getMsgPanel(dataArray,endString){
            var \$html = \"\";
            \$html = \$('<ul class=\"list-group\" >'); 
            for (var entityLabel in dataArray) {
                if(dataArray[entityLabel] && dataArray[entityLabel].length >0){
                    var fields = {};
                    for(var i in dataArray[entityLabel]){
                        var entityData = dataArray[entityLabel][i];
                        for(var setter in entityData)
                        {
                            if(!fields[setter])fields[setter] = {samples:[]}
                            fields[setter].samples.push(entityData[setter])
                        }
                    }
                    var \$li = \$('<li class=\"list-group-item\" ><div class=\"panel panel-primary\"><div class=\"panel-heading\">'+dataArray[entityLabel].length +\" \"+entityLabel+\" \"+endString+\" !\"+'</div><ul class=\"list-group\"></ul></div></li>').appendTo(\$html);
                    for(var setter in fields){
                        var \$setter = \$('<li class=\"list-group-item\">'+fields[setter].samples.length+' '+setter.replace(\"add\", \"\").replace(\"set\", \"\")+'</li>').appendTo(\$li.find('ul'));
                        \$setter.popover({
                            trigger : 'hover',
                            html : true,
                            placement : \"right\",
                            title : ' <b>'+entityLabel+'/'+setter+' </b>',
                            content :  '<ul>'+ fields[setter].samples.map(function(sample,i){ return i<20?\"<li>\"+sample+\"</li>\":\"\"; }).join(\"\")+'</ul>'
                        });
                    }

                }
            }
            return \$html;
        }



         </script>   

";
    }

    public function getTemplateName()
    {
        return "fibeConferenceBundle:Import:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  431 => 326,  398 => 296,  328 => 229,  278 => 182,  274 => 181,  269 => 179,  265 => 178,  260 => 176,  256 => 175,  252 => 174,  247 => 172,  242 => 170,  238 => 169,  234 => 168,  229 => 166,  224 => 164,  220 => 163,  215 => 162,  131 => 81,  127 => 79,  123 => 78,  121 => 77,  89 => 49,  86 => 48,  40 => 5,  37 => 4,  31 => 3,);
    }
}
