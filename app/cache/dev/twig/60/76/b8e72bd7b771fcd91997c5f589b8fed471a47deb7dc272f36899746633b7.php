<?php

/* fibeHomePageBundle:HomePage:index.html.twig */
class __TwigTemplate_6076b8e72bd7b771fcd91997c5f589b8fed471a47deb7dc272f36899746633b7 extends Twig_Template
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
            'javascripts_page' => array($this, 'block_javascripts_page'),
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
        echo "  ";
        $this->displayBlock('title', $context, $blocks);
        // line 5
        echo "  ";
        $this->displayBlock('stylesheets_page', $context, $blocks);
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Livecon upgrade your conference";
    }

    // line 5
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 6
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/homepage.css"), "html", null, true);
        echo "\"/>
    <!-- reset -->
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/reset.css"), "html", null, true);
        echo "\"/>
    <!-- grid system 16 -->
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\"
          href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/960_12_col.css"), "html", null, true);
        echo "\"/>

    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/css/style.css"), "html", null, true);
        echo "\"/>
  ";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "  ";
        $this->env->loadTemplate("fibeHomePageBundle::topBar.html.twig")->display($context);
        // line 19
        echo "  <div id=\"entete\">
    <div class=\"container_12\">
      <div class=\"grid_5 omega\">
        <h1><span class=\"logoname\"><b>Live</b>con</span> upgrade your conference</h1>

        <h2>Be efficient with simple tools, be reactive.</h2>

        <p><span
              class=\"logoname\"><b>Live</b>con</span> is a free conference management system based on smart and
          innovating tools.<br/>It carries you through your event organization to make the most of your time. It
          enhances your attendees experience with a mobile friendly application deployed for you.
        </p>
        <a href=\"#overview\">
          <div class=\"btn grid_4 alpha omega\">Why should i choose <span class=\"logoname\"><b>Live</b>con</span> ?</div>
        </a>
      </div>
    </div>
  </div>

  <div id=\"overview\">
    <div class=\"container_12\">
      <h1>Overview</h1>
      <hr/>
      <div id=\"t_before\" class=\"clearfix\">
        <a href=\"#before\" title=\"Before Conference\">
          <div class=\"grid_6\">
            <h2>Before your conference</h2>
          </div>
          <div class=\"grid_6 alpha elements\">
            <div class=\"element element01\">
              <img src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/import.png"), "html", null, true);
        echo "\"/>

              <p>Start from scratch or from xml/xls files.</p>
            </div>
            <div class=\"element element02\">
              <img src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/custom.png"), "html", null, true);
        echo "\"/>

              <p>Customize your mobile application as you wish.</p>
            </div>
          </div>
        </a>
      </div>
      <div id=\"t_during\" class=\"clearfix\">
        <a href=\"#during\" title=\"During Conference\">
          <div class=\"grid_6\">
            <h2>During your conference</h2>
          </div>
          <div class=\"grid_6 alpha elements\">
            <div class=\"element element01\">
              <img src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/schedule.png"), "html", null, true);
        echo "\"/>

              <p>Keep your schedule up to date.</p>
            </div>
            <div class=\"element element02\">
              <img src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/reloaded.png"), "html", null, true);
        echo "\"/>

              <p>Let the application broadcast the changes for you.</p>
            </div>
          </div>
        </a>
      </div>
      <div id=\"t_after\" class=\"clearfix\">
        <a href=\"#after\" title=\"After Conference\">
          <div class=\"grid_6\">
            <h2>After your conference</h2>
          </div>
          <div class=\"grid_6 alpha elements\">
            <div class=\"element element01\">
              <img src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/publish.png"), "html", null, true);
        echo "\"/>

              <p>Open your data to the Web 3.0 and increase your conference visibility.</p>
            </div>
            <div class=\"element element02\">
              <img src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/like.png"), "html", null, true);
        echo "\"/>

              <p>Let people find what they liked using the app.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div id=\"before\">
    <div class=\"container_12\">
      <h1>Before your conference</h1>

      <div class=\"illustration\"></div>
      <div id=\"overview01\" class=\"clearfix\">
        <div class=\"grid_1\"><img src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/import.png"), "html", null, true);
        echo "\"/></div>
        <div class=\"number grid_1\">1.</div>
        <div class=\"grid_3\"><h3>Start from scratch or import your data from an xml or xls file.</h3></div>
      </div>
      <div class=\"explain grid_4 clearfix\">
        <p><span
              class=\"logoname\"><b>Live</b>con</span> provides you an import fonctionnality, which lets you start from
          your OCS data, from xml and xls file, or from scratch. Your live conference is a set of sub events following a
          web standard hierarchy that can be managed thanks to a visual calendar by specifying:
          <br/>
          <b>Who: </b> The actors involved in each of your event and their roles (chair, speaker…).<br/>
          <b>What: </b> The papers presented associated with their authors, a main theme and a format (talk, panel,
          session, workshop, tutorial, break….).<br/>
          <b>Where: </b> The rooms where the events take place.<br/>
          <b>When: </b> The dates when the events take place.<br/><br/>
          Your mobile application is already available, customize it as you wish!
        </p>
      </div>
      <div id=\"overview02\" class=\"clearfix\">
        <div class=\"grid_1\"><img src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/custom.png"), "html", null, true);
        echo "\"/></div>
        <div class=\"number grid_1\">2.</div>
        <div class=\"grid_3\"><h3>Customize your mobile application as you wish.</h3></div>
      </div>
    </div>
  </div>

  <div id=\"during\">
    <div class=\"container_12\">
      <h1>During your conference</h1>

      <div class=\"grid_5 alpha omega\">
        <div id=\"overview03\" class=\"clearfix\">
          <div class=\"clearfix\">
            <div class=\"grid_1\"><img src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/schedule.png"), "html", null, true);
        echo "\"/></div>
            <div class=\"number grid_1\">3.</div>
            <div class=\"grid_3\"><h3>Keep your schedule up to date.</h3></div>
          </div>
          <div class=\"grid_3 push_2\"><p>Planning changes? Speaker late?<br/>
              Change your schedule easily with a user friendly interface.<br/>
              Plan a speaker to a different event, move an event to an another room…</p>
          </div>
        </div>
        <div id=\"overview04\" class=\"clearfix\">
          <div class=\"clearfix\">
            <div class=\"grid_1\"><img src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/reloaded.png"), "html", null, true);
        echo "\"/></div>
            <div class=\"number grid_1\">4.</div>
            <div class=\"grid_3\"><h3>Let the application broadcast the changes<br/>for you.</h3></div>
          </div>
          <div class=\"grid_3 push_2\">
            <p>Thanks to your web application, all your changes will be broadcasted to your attendees that can consult
              the planning, the authors list, and everything that composes your conference directly from their
              smartphones.</p>
          </div>
        </div>
      </div>
      <div class=\"grid_7\"><img src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/illustration/during.png"), "html", null, true);
        echo "\"/></div>
    </div>
  </div>

  <div id=\"after\">
    <div class=\"container_12\">
      <h1>After your conference</h1>

      <div class=\"grid_6\"><img src=\"";
        // line 171
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/illustration/after.png"), "html", null, true);
        echo "\"/></div>
      <div class=\"grid_6 overview_after\">
        <div id=\"overview05\" class=\"clearfix\">
          <div class=\"clearfix\">
            <div class=\"grid_1\"><img src=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/publish.png"), "html", null, true);
        echo "\"/></div>
            <div class=\"number grid_1\">5.</div>
            <div class=\"grid_4 omega\"><h3>Open your data to the Web 3.0 and increase your conference visibility.</h3>
            </div>
          </div>
          <div class=\"grid_4 push_2 omega\">
            <p>By allowing people to have a SPARQL access to your metadata, you participate to the development of the
              web and the open knowledge expansion. Expect your data to be reused in other system, spreading them all
              over the web.</p>
          </div>
        </div>
        <div id=\"overview06\" class=\"clearfix\">
          <div class=\"clearfix\">
            <div class=\"grid_1\"><img src=\"";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/like.png"), "html", null, true);
        echo "\"/></div>
            <div class=\"number grid_1\">6.</div>
            <div class=\"grid_4 omega\"><h3>Let people find what they liked using the app.</h3></div>
          </div>
          <div class=\"grid_4 push_2 omega\">
            <p>The application will remain available as long as you wish representing an amazing overview of what makes
              your conference a major actor of the domains it deals with.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id=\"app\">
    <div class=\"container_12\">
      <h1>The <span class=\"logoname\"><b>Live</b>con</span> App</h1>

      <div id=\"app01\" class=\"grid_5\">
        <iframe data-src=\"http://dataconf.liris.cnrs.fr/eswc2013/\" width=\"315\" height=\"560\"></iframe>
      </div>
      <div id=\"app02\" class=\"grid_5\">
        <iframe data-src=\"http://dataconf.liris.cnrs.fr/www2012/\" width=\"315\" height=\"560\"></iframe>
      </div>
    </div>
  </div>

  <div id=\"getstarted\">
    <div class=\"container_12\">
      <h1>Get Started</h1>

      <div class=\"grid_10 push_2 suffix_2\">
        <div class=\"grid_3 alpha\"><img src=\"";
        // line 220
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/illustration/getstarted.png"), "html", null, true);
        echo "\"/></div>
        <div class=\"grid_5 omega\">
          <p>To get started please create an account and start building your conference with your team!<br/><br/>During
            your organisation process, we will always be available to support you.
          </p></div>
      </div>
      <a href=\"";
        // line 226
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">
        <div class=\"btn grid_4 push_4 alpha omega\">Start the <span class=\"logoname\"><b>Live</b>con</span> solution</div>
      </a>
    </div>
  </div>

  <div id=\"contact\">
    <div class=\"container_12\">
      <h1>Contact us</h1>

      <div id=\"contactWrapper\">
        <form action=\"";
        // line 237
        echo $this->env->getExtension('routing')->getPath("homePage_index");
        echo "\" method=\"post\" id=\"contactform\">
          <input type=\"hidden\" name=\"POST\" value=\"\"/>

          <div class=\"grid_5\">
            <div class=\"stage\">
              <p>";
        // line 242
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "nom"), 'label');
        echo "</p>
              ";
        // line 243
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "nom"), 'widget');
        echo "
            </div>
            <div class=\"stage\">
              <p>";
        // line 246
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "prenom"), 'label');
        echo "</p>
              ";
        // line 247
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "prenom"), 'widget');
        echo "
            </div>

            <div class=\"stage\">
              <p>";
        // line 251
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "email"), 'label');
        echo "</p>
              ";
        // line 252
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "email"), 'widget');
        echo "
            </div>
          </div>
          <div class=\"grid_6 push_1\">
            <div class=\"stage\">
              <p>";
        // line 257
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "confname"), 'label');
        echo "</p>
              ";
        // line 258
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "confname"), 'widget');
        echo "
            </div>

            <div class=\"stage\">
              <p>";
        // line 262
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "message"), 'label');
        echo "</p>
              ";
        // line 263
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_contact"]) ? $context["form_contact"] : null), "message"), 'widget');
        echo "
            </div>

            <p class=\"requiredNote\"><em>*</em> Denotes a required field.</p>

            <input type=\"submit\" value=\"Send Message\" id=\"submitButton\" class=\"btn submit\"
                   title=\"Click here to submit your message!\"/>
            <!--<button type=\"submit\" value=\"Send Message\" id=\"submitButton\" class=\"btn submit\" title=\"Click here to submit your message!\"></button>-->
            <p class=\"disclaimer\"></p>

            <p id=\"callback\">callback</p>
          </div>
        </form>

      </div>
    </div>
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
        // line 300
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/backoffice.png"), "html", null, true);
        echo "\"/>
          <h4>Back Office Access</h4>
        </a>
      </div>
      <div class=\"grid_2\">
        <a href=\"https://github.com/E-Conference/\" title=\"GitHub Project\" target=\"_blank\">
          <img src=\"";
        // line 306
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/github.png"), "html", null, true);
        echo "\"/>
          <h4>GitHub Project</h4>
        </a>
      </div>
      <div class=\"grid_2\">
        <a href=\"http://twitter.com/Livecon\" title=\"Livecon on Twitter\" target=\"_blank\">
          <img src=\"";
        // line 312
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/picto/twitter.png"), "html", null, true);
        echo "\"/>
          <h4><span class=\"logoname\"><b>Live</b>con</span> on Twitter</h4>
        </a>
      </div>
      <div class=\"grid_6\" id=\"version\"><p>Live-con · v1.0 | licensed under</p></div>
    </div>
  </div>







";
    }

    // line 328
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 329
        echo "

    <script type=\"text/javascript\" src=\"";
        // line 331
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/jquery.easing.1.3.js"), "html", null, true);
        echo "\"></script>
    <script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 333
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/greensock/TweenMax.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 334
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/jquery.superscrollorama.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 335
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/js/jquery.plusanchor.js"), "html", null, true);
        echo "\"></script>

    <!--[if lt IE 9]>
    <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->
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

        //load apps on scroll        
        var appLoaded=false;
        var appsDiv = \$('#app');
        \$(document).scroll(function() {
            if (!appLoaded && appsDiv.offset().top <= \$(document).scrollTop()) {
              appLoaded=true;
              appsDiv.find(\"iframe\").each(function(){
                \$(this).attr(\"src\",\$(this).data(\"src\"))
              })
            }
        });

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
        return "fibeHomePageBundle:HomePage:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  502 => 335,  498 => 334,  494 => 333,  489 => 331,  485 => 329,  482 => 328,  463 => 312,  454 => 306,  445 => 300,  405 => 263,  401 => 262,  394 => 258,  390 => 257,  382 => 252,  378 => 251,  371 => 247,  367 => 246,  361 => 243,  357 => 242,  349 => 237,  335 => 226,  326 => 220,  291 => 188,  275 => 175,  268 => 171,  257 => 163,  243 => 152,  229 => 141,  212 => 127,  190 => 108,  171 => 92,  163 => 87,  146 => 73,  138 => 68,  121 => 54,  113 => 49,  81 => 19,  78 => 18,  75 => 17,  69 => 13,  64 => 11,  58 => 8,  52 => 6,  49 => 5,  43 => 4,  38 => 5,  35 => 4,  32 => 3,);
    }
}
