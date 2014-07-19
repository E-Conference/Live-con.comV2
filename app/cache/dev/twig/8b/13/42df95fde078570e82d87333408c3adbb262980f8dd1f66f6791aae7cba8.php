<?php

/* DataBundle::base.html.twig */
class __TwigTemplate_8b1342df95fde078570e82d87333408c3adbb262980f8dd1f66f6791aae7cba8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'meta_page' => array($this, 'block_meta_page'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'javascripts' => array($this, 'block_javascripts'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_meta($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->displayBlock('meta_page', $context, $blocks);
    }

    public function block_meta_page($context, array $blocks = array())
    {
        // line 5
        echo "  ";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "  ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
  ";
        // line 12
        $this->displayBlock('stylesheets_page', $context, $blocks);
    }

    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 13
        echo "
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/homepage.css"), "html", null, true);
        echo "\"/>
    <!-- reset -->
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/reset.css"), "html", null, true);
        echo "\"/>
    <!-- grid system 16 -->
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\"
          href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/960_12_col.css"), "html", null, true);
        echo "\"/>

    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/style.css"), "html", null, true);
        echo "\"/>
  ";
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
        // line 26
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/jquery.easing.1.3.js"), "html", null, true);
        echo "\"></script>
  <script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/greensock/TweenMax.min.js"), "html", null, true);
        echo "\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/jquery.superscrollorama.js"), "html", null, true);
        echo "\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/jquery.plusanchor.js"), "html", null, true);
        echo "\"></script>
  ";
        // line 33
        $this->displayBlock('javascripts_page', $context, $blocks);
    }

    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 34
        echo "  ";
    }

    // line 38
    public function block_body($context, array $blocks = array())
    {
        // line 39
        echo "  ";
        $this->displayBlock('footer', $context, $blocks);
        // line 41
        echo "
";
    }

    // line 39
    public function block_footer($context, array $blocks = array())
    {
        // line 40
        echo "  ";
    }

    public function getTemplateName()
    {
        return "DataBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 40,  144 => 39,  139 => 41,  136 => 39,  133 => 38,  129 => 34,  123 => 33,  119 => 32,  115 => 31,  111 => 30,  106 => 28,  102 => 27,  97 => 26,  88 => 21,  83 => 19,  77 => 16,  72 => 14,  69 => 13,  63 => 12,  58 => 11,  55 => 10,  50 => 8,  46 => 5,  146 => 89,  135 => 81,  130 => 80,  127 => 79,  103 => 57,  94 => 25,  85 => 45,  62 => 24,  60 => 23,  44 => 9,  42 => 8,  39 => 4,  36 => 3,  30 => 3,);
    }
}
