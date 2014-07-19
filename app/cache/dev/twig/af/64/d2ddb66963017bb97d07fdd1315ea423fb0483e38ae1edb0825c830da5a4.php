<?php

/* fibeWWWConfBundle:Category:list.html.twig */
class __TwigTemplate_af64d2ddb66963017bb97d07fdd1315ea423fb0483e38ae1edb0825c830da5a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        if (array_key_exists("nbResult", $context)) {
            // line 3
            echo "<div id=\"resultsFound\"><h4>";
            echo twig_escape_filter($this->env, (isset($context["nbResult"]) ? $context["nbResult"] : null), "html", null, true);
            echo " results found</h4></div>
";
        }
        // line 5
        echo "<table class=\"table table-hover .table-responsive records_list\">
    <thead>
        <tr> 
            <th>Name</th>
            <th>Description</th>
            <th>Color</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "currentPageResults"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 16
            echo "        <tr>
            <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "name"), "html", null, true);
            echo "</td>

            <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "description"), "html", null, true);
            echo "</td>

            <td>
                <div style=\"width:28px;height:28px;border:1px solid #222;background:";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "color"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "color"), "html", null, true);
            echo "\">
                </div>
            </td>
            <td>
                <a class=\"btn btn-default\" href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("schedule_category_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\">
                    <i class=\"fa fa-eye\"></i>
                </a>
               
                ";
            // line 30
            if ($this->env->getExtension('security')->isGranted("EDIT", (isset($context["entity"]) ? $context["entity"] : null))) {
                echo " 
                    <a class=\"btn btn-warning edit\" href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("schedule_category_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
                echo "\">
                         <i class=\"fa fa-pencil\"></i>
                    </a>
                ";
            }
            // line 35
            echo "            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    </tbody>
</table>


";
    }

    public function getTemplateName()
    {
        return "fibeWWWConfBundle:Category:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 38,  87 => 35,  80 => 31,  69 => 26,  60 => 22,  54 => 19,  49 => 17,  46 => 16,  42 => 15,  30 => 5,  24 => 3,  22 => 2,  19 => 1,  78 => 30,  76 => 30,  70 => 25,  62 => 20,  59 => 19,  57 => 18,  47 => 11,  38 => 6,  35 => 5,  29 => 3,);
    }
}
