<?php

/* fibeHomePageBundle::base.html.twig */
class __TwigTemplate_ecb7ad2336cf924fec6df4aa013acaea00a21ec2032d6d683a703c59f4fb674b extends Twig_Template
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
        echo "  <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
  ";
        // line 5
        $this->displayBlock('meta_page', $context, $blocks);
    }

    public function block_meta_page($context, array $blocks = array())
    {
        // line 6
        echo "  ";
    }

    // line 9
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
  ";
    }

    // line 17
    public function block_javascripts($context, array $blocks = array())
    {
        // line 18
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  ";
        // line 19
        $this->displayBlock('javascripts_page', $context, $blocks);
    }

    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 20
        echo "  ";
    }

    // line 24
    public function block_body($context, array $blocks = array())
    {
        // line 25
        echo "  ";
        $this->displayBlock('footer', $context, $blocks);
    }

    public function block_footer($context, array $blocks = array())
    {
        // line 26
        echo "  ";
    }

    public function getTemplateName()
    {
        return "fibeHomePageBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 26,  99 => 25,  92 => 20,  86 => 19,  81 => 18,  78 => 17,  67 => 12,  59 => 10,  54 => 9,  50 => 6,  44 => 5,  36 => 3,  154 => 56,  148 => 55,  142 => 52,  136 => 51,  131 => 50,  129 => 49,  125 => 48,  110 => 36,  105 => 34,  101 => 33,  96 => 24,  85 => 22,  82 => 21,  79 => 20,  73 => 13,  68 => 14,  62 => 11,  56 => 9,  53 => 8,  47 => 5,  43 => 8,  39 => 4,  37 => 5,  34 => 4,  31 => 3,);
    }
}
