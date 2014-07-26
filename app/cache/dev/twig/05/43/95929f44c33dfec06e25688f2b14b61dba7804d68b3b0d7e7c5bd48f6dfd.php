<?php

/* fibeDashboardBundle:Dashboard:index.html.twig */
class __TwigTemplate_054395929f44c33dfec06e25688f2b14b61dba7804d68b3b0d7e7c5bd48f6dfd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeDashboardBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'sideBar_page' => array($this, 'block_sideBar_page'),
            'centerPanel' => array($this, 'block_centerPanel'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeDashboardBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Your conferences";
    }

    // line 5
    public function block_stylesheets_page($context, array $blocks = array())
    {
    }

    // line 9
    public function block_sideBar_page($context, array $blocks = array())
    {
    }

    // line 13
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 14
        echo "  <div class=\"row page-top-header \">
    <div class=\"page-title col-xs-5  col-sm-4 col-md-4 col-lg-3\">
      <span>Conference list</span>
      <a class=\"btn btn-info\" href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("documentation", array("anchor" => "Generalities"));
        echo "\" title=\"Help\">
        <i class=\"fa fa-question\"></i>
      </a>
    </div>

    <div class=\" col-xs-2 col-sm-4 col-md-5 col-lg-7\">
    </div>
    <div class=\"page-btn-list  col-xs-5  col-sm-4 col-md-3 col-lg-2\">
      <a class=\"btn btn-info btn-create create\" href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("schedule_conference_create");
        echo "\">
        <i class=\"fa fa-plus\"></i> New conference
      </a>
    </div>
  </div>
  <div class=\"row page-content\">

    <div class=\"row-fluid\">
      ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["conferences"]) ? $context["conferences"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["conference"]) {
            // line 34
            echo "
        <div class=\"col-lg-5\">
          <div class=\"panel panel-livecon-dashboard\">
            <div class=\"panel-heading\" style=\"min-height:30px;\">
              <h4 style=\"display:inline\"> ";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getConfName", array(), "method"), "html", null, true);
            echo "</h4>
              <img src=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "logoPath"), "html", null, true);
            echo "\" style=\"height:30px;width:auto;float:right;\"
                   class=\"img-rounded img-responsive\"/>
            </div>
            <div class=\"panel-body\">
              <ul class=\"list-group\">
                <li class=\"list-group-item\">
                  <ul class=\"nav nav-pills nav-stacked\">
                    <li>
                      <h5>App Manager
                        ";
            // line 48
            if ($this->env->getExtension('security')->isGranted("EDIT", $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getAppConfig", array(), "method"))) {
                // line 49
                echo "                          <i class=\"fa fa-check\"></i>
                        ";
            } else {
                // line 51
                echo "                          <span class=\"glyphicon glyphicon-ban-circle\"></span>
                        ";
            }
            // line 53
            echo "                      </h5>
                    </li>
                    <li>
                      <h5>Schedule Manager
                        ";
            // line 57
            if ($this->env->getExtension('security')->isGranted("EDIT", (isset($context["conference"]) ? $context["conference"] : null))) {
                // line 58
                echo "                          <i class=\"fa fa-check\"></i>
                        ";
            } else {
                // line 60
                echo "                          <span class=\"glyphicon glyphicon-ban-circle\"></span>
                        ";
            }
            // line 62
            echo "                      </h5>
                    </li>
                    <li>
                      <h5>Datas Manager
                        ";
            // line 66
            if ($this->env->getExtension('security')->isGranted("EDIT", (isset($context["conference"]) ? $context["conference"] : null))) {
                // line 67
                echo "                          <i class=\"fa fa-check\"></i>
                        ";
            } else {
                // line 69
                echo "                          <span class=\"glyphicon glyphicon-ban-circle\"></span>
                        ";
            }
            // line 71
            echo "                      </h5>
                    </li>
                    <li>
                      <h5>Team Manager
                        ";
            // line 75
            if ($this->env->getExtension('security')->isGranted("CREATE", $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getTeam", array(), "method"))) {
                // line 76
                echo "                          <i class=\"fa fa-check\"></i>
                        ";
            } else {
                // line 78
                echo "                          <span class=\"glyphicon glyphicon-ban-circle\"></span>
                        ";
            }
            // line 80
            echo "                      </h5>
                    </li>
                  </ul>
                </li>
                <li class=\"list-group-item\"><h5>Events <span class=\"badge\">";
            // line 84
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "events")), "html", null, true);
            echo "</span></h5>
                </li>
                ";
            // line 86
            if (($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getModule", array(), "method"), "getPaperModule", array(), "method") == 1)) {
                // line 87
                echo "                  <li class=\"list-group-item\"><h5>Papers <span class=\"badge\">";
                echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "papers")), "html", null, true);
                echo "</span></h5>
                  </li>
                ";
            }
            // line 90
            echo "                <li class=\"list-group-item\"><h5>Locations <span class=\"badge\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "locations")), "html", null, true);
            echo "</span>
                  </h5></li>
                <li class=\"list-group-item\"><h5>Persons <span class=\"badge\">";
            // line 92
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "persons")), "html", null, true);
            echo "</span></h5>
                </li>
                <li class=\"list-group-item\"><h5>Topics <span class=\"badge\">";
            // line 94
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "topics")), "html", null, true);
            echo "</span></h5>
                </li>
                ";
            // line 96
            if (($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getModule", array(), "method"), "getOrganizationModule", array(), "method") == 1)) {
                // line 97
                echo "                  <li class=\"list-group-item\"><h5>Organizations <span
                          class=\"badge\">";
                // line 98
                echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "organizations")), "html", null, true);
                echo "</span></h5></li>
                ";
            }
            // line 100
            echo "                <li class=\"list-group-item\"><h5>Conf Managers <span
                        class=\"badge\">";
            // line 101
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "confManagers")), "html", null, true);
            echo "</span></h5></li>
              </ul>
              <a href=\"";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dashboard_enter_conference", array("id" => $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "id"))), "html", null, true);
            echo "\"
                 class=\"edit_conference btn btn-livecon btn-block\">
                <i class=\"fa fa-sign-in\"></i>
              </a>
              ";
            // line 107
            if ($this->env->getExtension('security')->isGranted("OWNER", (isset($context["conference"]) ? $context["conference"] : null))) {
                // line 108
                echo "                <a data-url=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("schedule_conference_delete", array("id" => $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "id"))), "html", null, true);
                echo "\"
                   class=\"delete_conference btn btn-danger btn-block modal-toggle\"
                   data-message=\"Are you sure you want to delete '";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "getConfName", array(), "method"), "html", null, true);
                echo "' conference ?\"
                   data-toggle=\"modal\" data-target=\"#myModal\">
                  <i class=\"fa fa-trash-o\"></i>
                </a>

              ";
            }
            // line 116
            echo "            </div>

          </div>

        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['conference'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 122
        echo "    </div>
  </div>


  <!-- Delete Confirmation Modal -->

  <div id=\"deleteConfirmation\" class=\"modal fade bs-modal-sm\" tabindex=\"-1\" role=\"dialog\"
       aria-labelledby=\"mySmallModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-sm\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title\">Delete Conference</h4>
        </div>
        <div class=\"modal-body\">
        </div>
        <div class=\"modal-footer\">
          <a href=\"#\" id=\"confirm\" class=\"btn btn-danger\">Yes</a>
          <a href=\"#\" data-dismiss=\"modal\" aria-hidden=\"true\" class=\"btn secondary\">Canceled</a>
        </div>
      </div>
    </div>
  </div>

";
    }

    // line 148
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 149
        echo "  ";
        $this->displayParentBlock("javascripts_page", $context, $blocks);
        echo "
  <script type=\"text/javascript\">

    \$(document).ready(function ()
    {
      \$('#deleteConfirmation').modal('hide');

      \$('.delete_conference').click(function ()
      {
        var message = \$(this).attr('data-message');
        var deleteUrl = \$(this).attr('data-url');

        \$('#confirm').attr('href', deleteUrl);
        \$('.modal-body').append(\"<h5>\" + message + \"</h5>\");

        \$('#deleteConfirmation').modal('show');

      })

    });

  </script>
";
    }

    public function getTemplateName()
    {
        return "fibeDashboardBundle:Dashboard:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 149,  280 => 148,  252 => 122,  241 => 116,  232 => 110,  226 => 108,  224 => 107,  217 => 103,  212 => 101,  209 => 100,  204 => 98,  201 => 97,  199 => 96,  194 => 94,  189 => 92,  183 => 90,  176 => 87,  174 => 86,  169 => 84,  163 => 80,  159 => 78,  155 => 76,  153 => 75,  147 => 71,  143 => 69,  139 => 67,  137 => 66,  131 => 62,  127 => 60,  123 => 58,  121 => 57,  115 => 53,  111 => 51,  107 => 49,  105 => 48,  92 => 39,  88 => 38,  82 => 34,  78 => 33,  67 => 25,  56 => 17,  51 => 14,  48 => 13,  43 => 9,  38 => 5,  32 => 3,);
    }
}
