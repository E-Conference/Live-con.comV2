<?php

/* fibeHomePageBundle::base.html.twig */
class __TwigTemplate_ffad90de9e8070ff9a7c9f9d5854e49356edc2762f737092b1d84c8c0a53f51a extends Twig_Template
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
        return array (  106 => 26,  99 => 25,  96 => 24,  92 => 20,  86 => 19,  73 => 13,  67 => 12,  62 => 11,  59 => 10,  54 => 9,  50 => 6,  44 => 5,  39 => 4,  36 => 3,  502 => 335,  498 => 334,  494 => 333,  489 => 331,  485 => 329,  482 => 328,  463 => 312,  454 => 306,  445 => 300,  405 => 263,  401 => 262,  394 => 258,  390 => 257,  382 => 252,  378 => 251,  371 => 247,  367 => 246,  361 => 243,  357 => 242,  349 => 237,  335 => 226,  326 => 220,  291 => 188,  275 => 175,  268 => 171,  257 => 163,  243 => 152,  229 => 141,  212 => 127,  190 => 108,  171 => 92,  163 => 87,  146 => 73,  138 => 68,  121 => 54,  113 => 49,  81 => 18,  78 => 17,  75 => 17,  69 => 13,  64 => 11,  58 => 8,  52 => 6,  49 => 5,  43 => 4,  38 => 5,  35 => 4,  32 => 3,);
    }
}
