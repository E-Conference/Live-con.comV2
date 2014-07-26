<?php

/* fibeSecurityBundle:Form:fields.html.twig */
class __TwigTemplate_ca9483a88e644fe632e1cfa5ba2fb61144dc5fafe12312f789e28b2d55a20469 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'permission_choice_widget' => array($this, 'block_permission_choice_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('permission_choice_widget', $context, $blocks);
    }

    public function block_permission_choice_widget($context, array $blocks = array())
    {
        // line 2
        echo "  ";
        ob_start();
        // line 3
        echo "    ";
        if ((isset($context["expanded"]) ? $context["expanded"] : null)) {
            // line 4
            echo "      <ul ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
        ";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 6
                echo "          <li>
            ";
                // line 7
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : null), 'widget');
                echo "
            ";
                // line 8
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : null), 'label');
                echo "
          </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "      </ul>
    ";
        } else {
            // line 13
            echo "      ";
            // line 14
            echo "      ";
            $this->displayBlock("choice_widget", $context, $blocks);
            echo "
    ";
        }
        // line 16
        echo "  ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "fibeSecurityBundle:Form:fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  63 => 14,  57 => 11,  44 => 7,  41 => 6,  32 => 4,  29 => 3,  26 => 2,  20 => 1,  123 => 33,  119 => 32,  116 => 31,  113 => 30,  106 => 26,  102 => 25,  99 => 24,  78 => 15,  75 => 14,  72 => 13,  69 => 16,  61 => 13,  55 => 5,  51 => 4,  48 => 8,  45 => 2,  42 => 1,  38 => 30,  35 => 29,  33 => 23,  30 => 22,  28 => 12,  25 => 11,  23 => 1,  225 => 102,  217 => 97,  212 => 95,  203 => 89,  195 => 84,  190 => 82,  182 => 77,  174 => 72,  169 => 70,  161 => 65,  153 => 60,  148 => 58,  140 => 53,  131 => 47,  126 => 45,  118 => 40,  108 => 35,  103 => 33,  96 => 23,  90 => 26,  88 => 19,  84 => 23,  82 => 16,  79 => 21,  73 => 16,  68 => 14,  62 => 11,  56 => 9,  53 => 8,  47 => 5,  43 => 8,  39 => 6,  37 => 5,  34 => 4,  31 => 3,);
    }
}
