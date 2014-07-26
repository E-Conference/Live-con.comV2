<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_315b7cba1a390d78421f6a9db503c1736e06beb0f4125a7f91156dab0f978d0d extends Twig_Template
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

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "  ";
        $this->env->loadTemplate("fibeHomePageBundle::topBar.html.twig")->display($context);
        // line 22
        echo "
  <div id=\"login_page\">


    <div id=\"background\"></div>
    <div class=\"container_12\">

      <div id=\"login\" class=\"grid_4\">
        <a href=\"http://live-con.com/\" title=\"Livecon UPGRATE YOUR CONFERENCE\"><img
              src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/logo.png"), "html", null, true);
        echo "\" alt=\"Livecon\"/></a>

        <div style=\"color:#811B06\"><strong>";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
        echo "</strong></div>
        <form id=\"login-form\" action=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
          <label for=\"username\"><p>Login :</p></label>
          <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\"/>

          <label for=\"password\"><p>Password :</p></label>
          <input type=\"password\" id=\"password\" name=\"_password\"/>
          <br/>
          <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\"/>
          <label for=\"remember_me\">Remember me</label>

          <br/>
          <input class=\"btn btn-success\" id=\"submitButton\" type=\"submit\" value=\"Connexion\"/>
        </form> 

        ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('hwi_oauth')->getResourceOwners());
        foreach ($context['_seq'] as $context["_key"] => $context["owner"]) {
            // line 49
            echo "            ";
            // line 50
            echo "          ";
            if (((isset($context["owner"]) ? $context["owner"] : null) != "twitter")) {
                echo "  
          <a class=\"btn btn-success btn-connect btn-connect-";
                // line 51
                echo twig_escape_filter($this->env, (isset($context["owner"]) ? $context["owner"] : null), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('hwi_oauth')->getLoginUrl((isset($context["owner"]) ? $context["owner"] : null)), "html", null, true);
                echo "\">
            Connect with ";
                // line 52
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["owner"]) ? $context["owner"] : null), array(), "HWIOAuthBundle"), "html", null, true);
                echo "
          </a> 
          ";
            }
            // line 55
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['owner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "      </div>
    </div>
  </div>






";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 56,  148 => 55,  142 => 52,  136 => 51,  131 => 50,  129 => 49,  125 => 48,  110 => 36,  105 => 34,  101 => 33,  96 => 31,  85 => 22,  82 => 21,  79 => 20,  73 => 16,  68 => 14,  62 => 11,  56 => 9,  53 => 8,  47 => 5,  43 => 8,  39 => 6,  37 => 5,  34 => 4,  31 => 3,);
    }
}
