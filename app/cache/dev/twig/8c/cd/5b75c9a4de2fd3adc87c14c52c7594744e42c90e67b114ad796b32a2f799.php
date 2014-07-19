<?php

/* FOSUserBundle:Team:index.html.twig */
class __TwigTemplate_8ccd5b75c9a4de2fd3adc87c14c52c7594744e42c90e67b114ad796b32a2f799 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeConferenceBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'centerPanel' => array($this, 'block_centerPanel'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeConferenceBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Team";
    }

    // line 5
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 6
        echo "


  ";
        // line 10
        echo "  <div class=\"row page-top-header \">
    <div class=\"page-title col-xs-5  col-sm-4 col-md-3 col-lg-3\">
      <span>Team management</span>
      <a class=\"btn btn-info\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("documentation", array("anchor" => "Collaborative"));
        echo "\" target=\"_blank\"
         title=\"Help\">
        <i class=\"fa fa-question\"></i>
      </a>
    </div>
  </div>
  <div class=\"row page-content\">


    <div id=\"team_list\" class=\"table-responsive\">
      <table class=\"records_list table table-striped table-hover\">
        <thead>
        <tr>
          <th>User</th>
          <th>Email</th>
          <th>Last login</th>
          ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["current_manager_conf_authorizations"]) ? $context["current_manager_conf_authorizations"] : null), "confPermissions"));
        foreach ($context['_seq'] as $context["_key"] => $context["confPermission"]) {
            // line 30
            echo "            <th>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "entityLabel"), "html", null, true);
            echo " Permission</th>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['confPermission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "          <th>Action
          <th>

        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <b>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "username"), "html", null, true);
        echo "</b>
          </td>
          <td><a href=\"mailto:";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "email"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "email"), "html", null, true);
        echo "</a></td>
          <td class=\"moment\">";
        // line 43
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "lastLogin")) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "lastLogin"), "Y-m-d H:i:s"), "html", null, true);
        }
        echo "</td>
          ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["current_manager_conf_authorizations"]) ? $context["current_manager_conf_authorizations"] : null), "confPermissions"));
        foreach ($context['_seq'] as $context["_key"] => $context["confPermission"]) {
            // line 45
            echo "            <td>
              <span class=\"badge authorization-";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "action"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "action"), "html", null, true);
            echo "</span>
            </td>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['confPermission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "        </tr>
        ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["manager_conf_authorizations"]) ? $context["manager_conf_authorizations"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["manager_conf_authorization"]) {
            // line 51
            echo "          <tr>
            <td>
              <b>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "username"), "html", null, true);
            echo "</b>
            </td>
            <td><a
                  href=\"mailto:";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "email"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "email"), "html", null, true);
            echo "</a>
            <td class=\"moment\">";
            // line 57
            if ($this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "lastLogin")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "lastLogin"), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>

            ";
            // line 59
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "confPermissions"));
            foreach ($context['_seq'] as $context["_key"] => $context["confPermission"]) {
                // line 60
                echo "              <td>
                <span class=\"badge authorization-";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "action"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "action"), "html", null, true);
                echo "</span>
              </td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['confPermission'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "            ";
            if (($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "isOwner") == false)) {
                // line 65
                echo "              ";
                if ($this->env->getExtension('security')->isGranted("DELETE", (isset($context["team"]) ? $context["team"] : null))) {
                    // line 66
                    echo "                <td>
                  <form id=\"delete-form";
                    // line 67
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
                    echo "\"
                        action=\"";
                    // line 68
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("conference_team_delete", array("id" => $this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "id"))), "html", null, true);
                    echo "\"
                        method=\"post\">
                    <button type=\"submit\" class=\"btn btn-large btn-danger delete\"><i class=\"fa fa-trash-o\"></i></button>
                    <input type=\"hidden\" name=\"_method\" value=\"DELETE\"/>
                    ";
                    // line 72
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["delete_forms"]) ? $context["delete_forms"] : null), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), array(), "array"), 'widget');
                    echo "
                  </form>
                </td>
              ";
                }
                // line 76
                echo "              ";
                // line 77
                echo "              ";
                if (($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "restricted") == false)) {
                    // line 78
                    echo "                <td>
                  <a class=\"btn btn-large btn-warning edit\"
                     href=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("conference_team_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["manager_conf_authorization"]) ? $context["manager_conf_authorization"] : null), "user"), "id"))), "html", null, true);
                    echo "\"><i
                        class=\"fa fa-pencil\"></i></a>
                </td>
              ";
                }
                // line 84
                echo "            ";
            }
            // line 85
            echo "          </tr>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manager_conf_authorization'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "        </tbody>
      </table>
    </div>


    ";
        // line 92
        if ($this->env->getExtension('security')->isGranted("CREATE", (isset($context["team"]) ? $context["team"] : null))) {
            // line 93
            echo "      <!--   Add user in conference  -->
      <a class=\"btn btn-info\" id=\"addUserInConference\" onclick=\"\$('#addUserInConferenceForm').toggle('slow')\">
        <i class=\"icon-plus icon-white\"></i> Add user in conference
      </a>
      <br/>
      <div id=\"addUserInConferenceForm\" style=\"display:none;\">
        <div class=\"row-fluid\">
          <div class=\"well\">
            <form action=\"";
            // line 101
            echo $this->env->getExtension('routing')->getPath("conference_team_add");
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["add_teamate_form"]) ? $context["add_teamate_form"] : null), 'enctype');
            echo ">

              ";
            // line 103
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["add_teamate_form"]) ? $context["add_teamate_form"] : null), "user"), 'row');
            echo "

              <div style=\"padding-top: 1em;\" class=\"form-horizontal\">
                ";
            // line 107
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["add_teamate_form"]) ? $context["add_teamate_form"] : null), "confPermissions"));
            foreach ($context['_seq'] as $context["_key"] => $context["confPermission"]) {
                // line 108
                echo "                  ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "vars"), "value"), "restricted") == false)) {
                    // line 109
                    echo "                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\">";
                    // line 110
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "vars"), "value"), "entityLabel"), "html", null, true);
                    echo "</label>

                      <div class=\"col-sm-10\">
                        ";
                    // line 113
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["confPermission"]) ? $context["confPermission"] : null), "action"), 'widget');
                    echo "
                      </div>
                    </div>
                    <div class=\"hide\">
                      ";
                    // line 117
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["confPermission"]) ? $context["confPermission"] : null), 'rest');
                    echo "
                    </div>
                  ";
                }
                // line 120
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['confPermission'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "              </div>

              <div class=\"hide\">
                ";
            // line 124
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["add_teamate_form"]) ? $context["add_teamate_form"] : null), 'rest');
            echo "
              </div>
              <br/>
              <button type=\"submit\" class=\"btn btn-block btn-success\">
                <i class=\"fa fa-check\"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    ";
        }
        // line 135
        echo "  </div>
";
    }

    // line 138
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 139
        echo "
  <script type=\"text/javascript\">


    function filter()
    {
      \$datas = \$(\"#filter_form\").serialize();

      //start send the post request
      \$.post(\"";
        // line 148
        echo $this->env->getExtension('routing')->getPath("schedule_confevent_filter");
        echo "\",
          \$datas,
          function (response)
          {
            \$('#confevent_list').html(response);
            \$(\"#resultsFound\").show();

          }, \"html\");
      return false;
    }
    ;
  </script>

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Team:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 148,  343 => 139,  340 => 138,  335 => 135,  321 => 124,  316 => 121,  310 => 120,  304 => 117,  297 => 113,  291 => 110,  288 => 109,  285 => 108,  280 => 107,  274 => 103,  267 => 101,  257 => 93,  255 => 92,  248 => 87,  233 => 85,  230 => 84,  223 => 80,  219 => 78,  216 => 77,  214 => 76,  207 => 72,  200 => 68,  196 => 67,  193 => 66,  190 => 65,  187 => 64,  176 => 61,  173 => 60,  169 => 59,  162 => 57,  156 => 56,  150 => 53,  146 => 51,  129 => 50,  126 => 49,  115 => 46,  112 => 45,  108 => 44,  102 => 43,  96 => 42,  91 => 40,  81 => 32,  72 => 30,  68 => 29,  49 => 13,  44 => 10,  39 => 6,  36 => 5,  30 => 3,);
    }
}
