<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_9c2169369ef08a7bf3aa8d014f761d6200e43831f90a92f2964e0674c1693c24 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeHomePageBundle::base.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeHomePageBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "
  ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 6
        echo "

  ";
        // line 8
        $this->displayBlock('stylesheets_page', $context, $blocks);
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Livecon upgrade your conference";
    }

    // line 8
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 9
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/homepage.css"), "html", null, true);
        echo "\"/>
    <!-- reset -->
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/reset.css"), "html", null, true);
        echo "\"/>
    <!-- grid system 16 -->
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\"
          href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/960_12_col.css"), "html", null, true);
        echo "\"/>

    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/style.css"), "html", null, true);
        echo "\"/>
  ";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        $this->env->loadTemplate("fibeHomePageBundle::topBar.html.twig")->display($context);
        // line 23
        echo "<div id=\"login_page\">

  ";
        // line 25
        if (array_key_exists("error", $context)) {
            // line 26
            echo "    <div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message"), "html", null, true);
            echo "</div>
  ";
        }
        // line 28
        echo "
  <div id=\"background\"></div>
  <div class=\"container_12\">
    <div id=\"signin\" class=\"grid_4\">
      <a href=\"http://live-con.com/\" title=\"Livecon UPGRATE YOUR CONFERENCE\"><img
            src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/logo.png"), "html", null, true);
        echo "\" alt=\"Livecon\" id=\"logo\"/></a>

      <form action=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\"
            class=\"form-horizontal\">

        <div class=\"control-group\">
          <label class=\"control-label stage\">
            ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username"), 'label');
        echo "
          </label>

          <div class=\"controls\">
            <div style=\"color:#811B06\">
              ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username"), 'errors');
        echo "
            </div>
            ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username"), 'widget');
        echo "

          </div>
        </div>
        <div class=\"control-group\">
          <label class=\"control-label\">
            ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email"), 'label');
        echo "
          </label>

          <div class=\"controls\">
            <div style=\"color:#811B06\">
              <strong>";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email"), 'errors');
        echo "</strong>
            </div>
            ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email"), 'widget');
        echo "
          </div>
        </div>
        <div class=\"control-group\">
          <label class=\"control-label\">
            ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), "first"), 'label');
        echo "
          </label>

          <div class=\"controls stage\">
            <div style=\"color:#811B06\">
              <strong>";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), "first"), 'errors');
        echo "</strong>
            </div>
            ";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), "first"), 'widget');
        echo "
          </div>
        </div>
        <div class=\"control-group\">
          <label class=\"control-label\">
            ";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), "second"), 'label');
        echo "
          </label>

          <div class=\"controls stage\">
            <div style=\"color:#811B06\">
              <strong>";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), "second"), 'errors');
        echo "</strong>
            </div>
            ";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), "second"), 'widget');
        echo "
          </div>
        </div>
        <div class=\"control-group\">
          <label class=\"control-label\">
            ";
        // line 89
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "captcha"), 'label');
        echo "
            <a onclick=\"location.reload()\"><i class=\"fa fa-refresh\"></i></a>
          </label>

          <div class=\"controls stage\">
            <div style=\"color:#811B06\">
              <strong>";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "captcha"), 'errors');
        echo "</strong>
            </div>
            ";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "captcha"), 'widget');
        echo "
          </div>
        </div>

        <div style=\"visibility:hidden;display:none;height:0px;\" id=\"hiddenInputs\">
          ";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
        </div>
        <div class=\"control-group\">
          <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-success\">
              <i class=\"icon-plus icon-white\"></i> Register user
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 102,  217 => 97,  212 => 95,  203 => 89,  195 => 84,  190 => 82,  182 => 77,  174 => 72,  169 => 70,  161 => 65,  153 => 60,  148 => 58,  140 => 53,  131 => 47,  126 => 45,  118 => 40,  108 => 35,  103 => 33,  96 => 28,  90 => 26,  88 => 25,  84 => 23,  82 => 22,  79 => 21,  73 => 16,  68 => 14,  62 => 11,  56 => 9,  53 => 8,  47 => 5,  43 => 8,  39 => 6,  37 => 5,  34 => 4,  31 => 3,);
    }
}
