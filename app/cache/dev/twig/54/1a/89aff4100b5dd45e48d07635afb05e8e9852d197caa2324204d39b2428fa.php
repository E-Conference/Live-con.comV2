<?php

/* DataBundle:Conference:conferences.html.twig */
class __TwigTemplate_541a89aff4100b5dd45e48d07635afb05e8e9852d197caa2324204d39b2428fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DataBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DataBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "All Livecon Conferences";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "
  ";
        // line 8
        $this->env->loadTemplate("fibeHomePageBundle::topBar.html.twig")->display($context);
        // line 9
        echo "
  <!-- Conferences List -->
  <div id=\"background\"></div>
  <div id=\"entete\" style=\"background:none;min-height:700px\">
    <div class=\"container_12\">
      <div class=\"grid_12\" style=\"border: 2px solid black; border-top:0px\">
        <div class=\"input-group\">
          <span class=\"input-group-addon\"><i class=\"fa fa-search\"></i></span>
          <input type=\"text\" class=\"form-control\" placeholder=\"Find a conference\" id=\"conference_filter_name\"/>
        </div>
      </div>
    </div>

    <div id=\"conferences_list\">
      ";
        // line 23
        $this->env->loadTemplate("DataBundle:Conference:conferencesList.html.twig")->display($context);
        // line 24
        echo "    </div>
  </div>
  <div id=\"footer\">
    <div class=\"container_12\">
      <div class=\"grid_6\">
        <h3>Created by</h3>
        <ul>
          <li><p>Fiona LE PEUTREC

            <p></li>
          <li><p>Florian BACLE</p></li>
          <li><p>Benoît DURANT DE LA PASTELLIERE</p></li>
        </ul>
        <a href=\"http://thibaud-lentheric.com\" title=\"Thibaud LENTHERIC Portfolio\" target=\"_blank\">
          <h3 class=\"design\">Design by</h3>

          <p class=\"design\">Thibaud LENTHERIC</p>
        </a>
      </div>
      <div class=\"grid_2\">
        <a href=\"http://www.live-con.com/login\" title=\"Back Office Access\">
          <img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/backoffice.png"), "html", null, true);
        echo "\"/>
          <h4>Back Office Access</h4>
        </a>
      </div>
      <div class=\"grid_2\">
        <a href=\"https://github.com/E-Conference/\" title=\"GitHub Project\" target=\"_blank\">
          <img src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/github.png"), "html", null, true);
        echo "\"/>
          <h4>GitHub Project</h4>
        </a>
      </div>
      <div class=\"grid_2\">
        <a href=\"http://twitter.com/Livecon\" title=\"Livecon on Twitter\" target=\"_blank\">
          <img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/twitter.png"), "html", null, true);
        echo "\"/>
          <h4><span class=\"logoname\"><b>Live</b>con</span> on Twitter</h4>
        </a>
      </div>
      <div class=\"grid_6\" id=\"version\"><p>Live-con · v1.0 | licensed under</p></div>
    </div>
  </div>


  <!-- DataConf show Modal -->

  <div id=\"dataconf_iframe\" class=\"modal fade\" tabindex=\"-1\" aria-hidden=\"true\" role=\"dialog\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <iframe src=\"\" width=\"1000px\" height=\"600px\"></iframe>
      </div>
    </div>
  </div>

";
    }

    // line 79
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 80
        echo "  ";
        $this->displayParentBlock("javascripts_page", $context, $blocks);
        echo "
  <script type=\"text/javascript\" src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
  <script type=\"text/javascript\">
    \$(document).ready(function ()
    {

      \$(\"#conference_filter_name\").keypress(function ()
      {
        var nameConf = \$(\"#conference_filter_name\").val();
        \$.post(\"";
        // line 89
        echo $this->env->getExtension('routing')->getPath("datas_conferences_filter");
        echo "\",
            {name: nameConf },
            function (response)
            {
              \$('#conferences_list').html(response);
            }, \"html\");
      });

      \$('#dataconf_iframe').modal('hide');

      \$('.show_dataconf').click(function ()
      {
        var dataconfUrl = \$(this).attr('data-url');

        \$('#dataconf_iframe').find(\"iframe\").attr('src', dataconfUrl);
        \$('#dataconf_iframe').modal('show');

      })

    });

  </script>
  <script type=\"text/javascript\">
    \$(function ()
    {

      // Scroll to
      \$('body').plusAnchor({
        easing: 'easeInOutExpo',
        speed: 1000,
        offsetTop: -70
      });

      var controller = \$.superscrollorama();

      controller.addTween('#t_before .elements',
          TweenMax.from(\$('#t_before h2'), .3, {css: {paddingRight: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);
      controller.addTween('#t_before .elements',
          TweenMax.from(\$('#t_before .element01'), .3, {css: {left: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);
      controller.addTween('#t_before .elements',
          TweenMax.from(\$('#t_before .element02'), .45, {css: {left: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);

      controller.addTween('#t_during .elements',
          TweenMax.from(\$('#t_during h2'), .3, {css: {paddingRight: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);
      controller.addTween('#t_during .elements',
          TweenMax.from(\$('#t_during .element01'), .3, {css: {left: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);
      controller.addTween('#t_during .elements',
          TweenMax.from(\$('#t_during .element02'), .45, {css: {left: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);

      controller.addTween('#t_after .elements',
          TweenMax.from(\$('#t_after h2'), .3, {css: {paddingRight: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);
      controller.addTween('#t_after .elements',
          TweenMax.from(\$('#t_after .element01'), .3, {css: {left: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);
      controller.addTween('#t_after .elements',
          TweenMax.from(\$('#t_after .element02'), .45, {css: {left: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);

      controller.addTween('#overview01',
          TweenMax.from(\$('#overview01'), .45, {css: {marginLeft: 520, opacity: 0}, ease: Cubic.easeoUt}), 0, -100);

      controller.addTween('#overview02',
          TweenMax.from(\$('#overview02'), .45, {css: {marginLeft: 420, top: 580, opacity: 0}, ease: Cubic.easeoUt}), 0, -250);

      controller.addTween('#overview03',
          TweenMax.from(\$('#overview03'), .45, {css: {marginLeft: -200, opacity: 0}, ease: Cubic.easeoUt}), 0, -100);

      controller.addTween('#overview04',
          TweenMax.from(\$('#overview04'), .45, {css: {marginLeft: 200, opacity: 0}, ease: Cubic.easeoUt}), 0, -100);

      controller.addTween('#after',
          TweenMax.from(\$('#overview05'), .45, {css: {left: -200, top: 100, opacity: 0}, ease: Cubic.easeoUt}), 0, 100);

      controller.addTween('#overview05',
          TweenMax.from(\$('#overview06'), .45, {css: {left: -200, top: 100, opacity: 0}, ease: Cubic.easeoUt}), 0, -75);

      controller.addTween('#app',
          TweenMax.from(\$('#app01'), .45, {css: {left: -200, opacity: 0}, ease: Cubic.easeoUt}), 0, 150);

      controller.addTween('#app',
          TweenMax.from(\$('#app02'), .45, {css: {right: -200, opacity: 0}, ease: Cubic.easeoUt}), 0, 150);

    });
  </script>

";
    }

    public function getTemplateName()
    {
        return "DataBundle:Conference:conferences.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 89,  135 => 81,  130 => 80,  127 => 79,  103 => 57,  94 => 51,  85 => 45,  62 => 24,  60 => 23,  44 => 9,  42 => 8,  39 => 7,  36 => 6,  30 => 3,);
    }
}
