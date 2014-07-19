<?php

/* ::base.html.twig */
class __TwigTemplate_0f775609d6b66dce538c614418e9b5a906d9ee7eef85e5a68d4a1dd1c7152f7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\"/>
  ";
        // line 5
        $this->displayBlock('meta', $context, $blocks);
        // line 6
        echo "  <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

  ";
        // line 8
        $this->displayBlock('javascripts', $context, $blocks);
        // line 63
        echo "
  ";
        // line 64
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 91
        echo "
</head>
<body>
<div class=\"page\">

  ";
        // line 96
        $this->displayBlock('body', $context, $blocks);
        // line 99
        echo "  ";
        $this->displayBlock('footer', $context, $blocks);
        // line 102
        echo "</div>
</body>

</html>














";
    }

    // line 5
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_javascripts($context, array $blocks = array())
    {
        // line 9
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/json2.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrapAlert.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/select2.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap-switch.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/moment.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
      \$(function ()
      {

        \$(\"select\").select2({width: \"resolve\"});

        \$('.switch').bootstrapSwitch();

        \$(\".duration\").each(function ()
        {
          //DateInterval example : P612DT18H30M00S
          if (\$(this).text())
          {

            var s = \$(this).text().split(\"M\")[1].split(\"S\")[0],
                m = \$(this).text().split(\"H\")[1].split(\"M\")[0],
                h = \$(this).text().split(\"T\")[1].split(\"H\")[0],
                d = \$(this).text().split(\"P\")[1].split(\"D\")[0] % 7,
                w = \$(this).text().split(\"P\")[1].split(\"D\")[0] / 7
                ;
            var momentDur = moment.duration({
              seconds: s,
              minutes: m,
              hours: h,
              days: d,
              weeks: w
            });
            \$(this).text(momentDur.humanize());
          }
        });
      });
    </script>
    <!-- Ajax Spinner -->
    <script type=\"text/javascript\">
      \$(document).ajaxStart(function ()
      {
        \$('body').addClass('wait');

      }).ajaxComplete(function ()
      {

        \$('body').removeClass('wait');

      });
    </script>

  ";
    }

    // line 64
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 65
        echo "
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\"/>

    <link rel=\"stylesheet\" href=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/select2.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/select2-bootstrap.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap-switch.min.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\"/>


    <style type=\"text/css\">
      .content
      {
        background-image: url(\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/bg_texture2.jpg"), "html", null, true);
        echo "\");
        background-position: initial initial;
        background-repeat: initial initial;
      }

      /* select 2 required msg*/
      .select2-offscreen, .select2-offscreen:focus
      {
        left: auto !important;
        top: auto !important;
      }
    </style>
  ";
    }

    // line 96
    public function block_body($context, array $blocks = array())
    {
        // line 97
        echo "
  ";
    }

    // line 99
    public function block_footer($context, array $blocks = array())
    {
        // line 100
        echo "    ";
        $this->env->loadTemplate("::footer.html.twig")->display($context);
        // line 101
        echo "  ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  237 => 101,  234 => 100,  231 => 99,  226 => 97,  223 => 96,  206 => 78,  197 => 72,  193 => 71,  189 => 70,  185 => 69,  181 => 68,  176 => 66,  173 => 65,  170 => 64,  118 => 15,  114 => 14,  110 => 13,  102 => 11,  98 => 10,  93 => 9,  90 => 8,  85 => 6,  80 => 5,  55 => 99,  53 => 96,  46 => 91,  41 => 63,  33 => 6,  31 => 5,  25 => 1,  106 => 12,  99 => 25,  96 => 24,  92 => 20,  86 => 19,  73 => 13,  67 => 12,  62 => 11,  59 => 10,  54 => 9,  50 => 6,  44 => 64,  39 => 8,  36 => 3,  502 => 335,  498 => 334,  494 => 333,  489 => 331,  485 => 329,  482 => 328,  463 => 312,  454 => 306,  445 => 300,  405 => 263,  401 => 262,  394 => 258,  390 => 257,  382 => 252,  378 => 251,  371 => 247,  367 => 246,  361 => 243,  357 => 242,  349 => 237,  335 => 226,  326 => 220,  291 => 188,  275 => 175,  268 => 171,  257 => 163,  243 => 152,  229 => 141,  212 => 127,  190 => 108,  171 => 92,  163 => 87,  146 => 73,  138 => 68,  121 => 54,  113 => 49,  81 => 18,  78 => 17,  75 => 17,  69 => 13,  64 => 11,  58 => 102,  52 => 6,  49 => 5,  43 => 4,  38 => 5,  35 => 4,  32 => 3,);
    }
}
