<?php

/* DataBundle:Conference:conferencesList.html.twig */
class __TwigTemplate_f7d6d96c458d1b94e8090d177cf7ab23957ec6165ab6d6d82fbbb26705153a7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'centerPanel' => array($this, 'block_centerPanel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('centerPanel', $context, $blocks);
    }

    public function block_centerPanel($context, array $blocks = array())
    {
        // line 2
        echo "
  <div class=\"row page-content\">

    ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["conference"]) {
            // line 6
            echo "      <div class=\"col-lg-3\">
        <div class=\"panel panel-livecon\">

          <div class=\"panel-heading\">
            <h4> ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getConfName", array(), "method"), "html", null, true);
            echo "</h4>
          </div>
          <div class=\"panel-body\">
            <img src=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "logoPath"), "html", null, true);
            echo "\"
                 style=\"height:80px;width:auto;display: block;max-width: 100%;\" class=\"img-rounded show_dataconf\"
                 data-url=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mobileAppPublic_index", array("slug" => $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "slug"))), "html", null, true);
            echo "\"/>
          </div>
        </div>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['conference'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "
  </div>

";
    }

    public function getTemplateName()
    {
        return "DataBundle:Conference:conferencesList.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  64 => 20,  53 => 15,  47 => 13,  41 => 10,  35 => 6,  31 => 5,  26 => 2,  20 => 1,  147 => 40,  144 => 39,  139 => 41,  136 => 39,  133 => 38,  129 => 34,  123 => 33,  119 => 32,  115 => 31,  111 => 30,  106 => 28,  102 => 27,  97 => 26,  88 => 21,  83 => 19,  77 => 16,  72 => 14,  69 => 13,  63 => 12,  58 => 11,  55 => 10,  50 => 8,  46 => 5,  146 => 89,  135 => 81,  130 => 80,  127 => 79,  103 => 57,  94 => 25,  85 => 45,  62 => 24,  60 => 23,  44 => 9,  42 => 8,  39 => 4,  36 => 3,  30 => 3,);
    }
}
