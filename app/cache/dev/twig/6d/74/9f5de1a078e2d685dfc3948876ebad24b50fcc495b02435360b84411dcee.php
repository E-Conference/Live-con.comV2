<?php

/* fibeSecurityBundle:Form:fields.html.twig */
class __TwigTemplate_6d749f5de1a078e2d685dfc3948876ebad24b50fcc495b02435360b84411dcee extends Twig_Template
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
        return array (  63 => 14,  57 => 11,  29 => 3,  26 => 2,  20 => 1,  123 => 33,  119 => 32,  116 => 31,  88 => 19,  82 => 16,  72 => 13,  61 => 13,  51 => 4,  48 => 8,  45 => 2,  42 => 1,  30 => 22,  28 => 12,  37 => 5,  27 => 4,  23 => 1,  19 => 1,  237 => 101,  234 => 100,  231 => 99,  226 => 97,  223 => 96,  206 => 78,  197 => 72,  193 => 71,  189 => 70,  185 => 69,  181 => 68,  176 => 66,  173 => 65,  170 => 64,  118 => 15,  114 => 14,  110 => 13,  102 => 25,  98 => 10,  93 => 9,  90 => 8,  85 => 6,  80 => 5,  55 => 5,  53 => 96,  46 => 11,  41 => 6,  33 => 23,  31 => 5,  25 => 11,  106 => 26,  99 => 24,  96 => 23,  92 => 20,  86 => 19,  73 => 13,  67 => 12,  62 => 11,  59 => 10,  54 => 13,  50 => 12,  44 => 7,  39 => 8,  36 => 3,  502 => 335,  498 => 334,  494 => 333,  489 => 331,  485 => 329,  482 => 328,  463 => 312,  454 => 306,  445 => 300,  405 => 263,  401 => 262,  394 => 258,  390 => 257,  382 => 252,  378 => 251,  371 => 247,  367 => 246,  361 => 243,  357 => 242,  349 => 237,  335 => 226,  326 => 220,  291 => 188,  275 => 175,  268 => 171,  257 => 163,  243 => 152,  229 => 141,  212 => 127,  190 => 108,  171 => 92,  163 => 87,  146 => 73,  138 => 68,  121 => 54,  113 => 30,  81 => 18,  78 => 15,  75 => 14,  69 => 16,  64 => 11,  58 => 14,  52 => 6,  49 => 5,  43 => 4,  38 => 30,  35 => 29,  32 => 4,);
    }
}
