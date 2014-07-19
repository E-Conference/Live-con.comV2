<?php

/* fibeMobileAppBundle:MobileAppTheme:index.html.twig */
class __TwigTemplate_1f42d5cf84cf7f56a74a183503d690573a00c25d5458b48928ef4f46cdf62fc8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeMobileAppBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'centerPanel' => array($this, 'block_centerPanel'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeMobileAppBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Mobile App' theme";
    }

    // line 5
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 6
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/spectrum/spectrum.css"), "html", null, true);
        echo "\" />  
";
    }

    // line 9
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 10
        echo "
     <div class=\"row page-top-header \">
            <div class=\"page-title  col-xs-5  col-sm-4 col-md-3 col-lg-2\">
                <span>Your app'</span>
                <a class=\"btn btn-info\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("documentation", array("anchor" => "Mobile_App"));
        echo "\" target=\"_blank\" title=\"Help\">
                     <i class=\"fa fa-question\"></i> 
                </a>
            </div>

            <div class=\" col-xs-2 col-sm-4 col-md-6 col-lg-8\">
            </div>
            <div class=\"page-btn-list  col-xs-5  col-sm-4 col-md-3 col-lg-2\">
                <a class=\"btn btn-info\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mobileAppPublic_index", array("slug" => $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "slug"))), "html", null, true);
        echo "\" title=\"View your application in full screen\" target=”_blank”>
                     <i class=\"fa fa-eye\"></i>
                </a>
            </div>
        </div>
        <div class=\"row page-content\">
             <div class=\"row\">
       
                  <div class='col-xs-12 col-sm-12 col-mg-6 col-lg-6' id=\"iframe-container\">
                    <div  id=\"iframe-phone\">
                          <iframe  width=\"315\" height=\"560\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mobileAppPublic_index", array("slug" => $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "slug"))), "html", null, true);
        echo "\" ></iframe>
                     </div>
                   
                  </div>
                  <div class=\"col-xs-12 col-sm-12 col-mg-6 col-lg-6\">
                      <div class=\"well\">
                        <h4>Color board</h4> 
                        <div id=\"palette\" class=\"well\"> 
                         
                        </div>
                         <a href=\"#\" id=\"generateTheme\" class=\"edit btn btn-success\" style=\"width:100%\"><i class=\"fa fa-magic\"></i>  Generate theme</a>
                      </div>
                    ";
        // line 44
        if ($this->env->getExtension('security')->isGranted("EDIT", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "appConfig"))) {
            // line 45
            echo "                        ";
            $this->env->loadTemplate("fibeMobileAppBundle:MobileAppTheme:edit.html.twig")->display($context);
            // line 46
            echo "                    ";
        }
        // line 47
        echo "                   </div>
      
            </div>
        </div>
  ";
    }

    // line 52
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 53
        echo "
  <script type=\"text/javascript\" src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/spectrum/spectrum.js"), "html", null, true);
        echo "\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/colorThief.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-file-input/bootstrap.file-input.js"), "html", null, true);
        echo "\"></script>  
  <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-file-input/file-dropper.js"), "html", null, true);
        echo "\"></script>  

  <script type=\"text/javascript\">
  \$( document ).ready(function() {
    \$(\"#generateTheme\").click(function(e){
        e.preventDefault();
        generateTheme();
    })
  

      var initPalette = [\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorHeader"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorNavBar"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorContent"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorContent"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorNavBar"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorFooter"), "html", null, true);
        echo "\", \" ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorFooter"), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorButton"), "html", null, true);
        echo "\"]
       \$(\".color\").spectrum({
        flat: false,
        showInput: true,
        showInitial: true,
        showAlpha: false,
        disabled: false,
        localStorageKey: \"color\",
        showPalette: true,
        showPaletteOnly: false,
        showSelectionPalette: true,
        clickoutFiresChange: false,
        cancelText: \"cancelText\",
        chooseText: \"choose\",
        className: \"colorpicker\",
        preferredFormat: \"hex\",
        maxSelectionSize: 12,
        palette: [initPalette],
        selectionPalette: initPalette || []
     });

      var imageObjet = new Image();
      imageObjet.onload = function() {

     
          var colorThief = new ColorThief();
          var palette = colorThief.getPalette(this, 6);
          var paletteTab = [];

          \$.each(palette, function(i, colorRow){
              var colorText = colorToHex(colorRow[0], colorRow[1], colorRow[2]);
              var newColorBox = \$(\"<input class='color form-control' value='\"+colorText+\"'/>\");
              \$(\"#palette\").prepend(newColorBox);
              paletteTab.push(colorText);
          })

           \$(\".color\").spectrum({
              flat: false,
              showInput: true,
              showInitial: true,
              showAlpha: false,
              disabled: false,
              localStorageKey: \"color\",
              showPalette: true,
              showPaletteOnly: false,
              showSelectionPalette: true,
              clickoutFiresChange: false,
              cancelText: \"cancelText\",
              chooseText: \"choose\",
              className: \"colorpicker\",
              preferredFormat: \"hex\",
              maxSelectionSize: 12,
              palette: [paletteTab],
              selectionPalette: paletteTab || []
          });
      };
       imageObjet.src = \"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/"), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "logoPath"), "html", null, true);
        echo "\";



      function colorToHex(redCol, greenCol, blueCol) {
          
          var rgb = blueCol | (greenCol << 8) | (redCol << 16);
          return '#' + rgb.toString(16);
      };

     
  });

  function generateTheme(){
    var palette = \$(\".color\").spectrum(\"option\",\"palette\")[0];
    var tabRandomised = [];
    for(i=0; i<6; i++){
      tabRandomised.push(Math.floor((Math.random()*5)+1));
    }

    \$(\".edit-app-theme\").hide(\"slow\", function(){

      \$(\".BGColorHeader\").spectrum(\"set\", palette[tabRandomised[0]]);
      \$(\".TitleColorHeader\").spectrum(\"set\", palette[\"black\"]);
      \$(\".BGColorNavBar\").spectrum(\"set\", palette[tabRandomised[1]]);
      \$(\".TitleColorNavBar\").spectrum(\"set\", palette[\"black\"]);
      \$(\".BGColorContent\").spectrum(\"set\", \"#f3f6f6\");
      \$(\".TitleColorContent\").spectrum(\"set\", palette[\"black\"]);
      \$(\".BGColorButton\").spectrum(\"set\", palette[tabRandomised[4]]);
      \$(\".TitleColorButton\").spectrum(\"set\", palette[\"black\"]);
      \$(\".BGColorFooter\").spectrum(\"set\", palette[tabRandomised[1]]);
      \$(\".TitleColorFooter\").spectrum(\"set\", palette[\"black\"]);
      \$(\".edit-app-theme\").show(\"slow\");
    }); 
  }
  </script>
";
    }

    public function getTemplateName()
    {
        return "fibeMobileAppBundle:MobileAppTheme:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 124,  143 => 68,  130 => 58,  126 => 57,  121 => 55,  117 => 54,  114 => 53,  111 => 52,  103 => 47,  100 => 46,  97 => 45,  95 => 44,  80 => 32,  67 => 22,  56 => 14,  50 => 10,  47 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
