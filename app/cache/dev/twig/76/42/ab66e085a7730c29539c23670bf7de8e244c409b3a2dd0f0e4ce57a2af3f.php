<?php

/* export.json.twig */
class __TwigTemplate_7642ab66e085a7730c29539c23670bf7de8e244c409b3a2dd0f0e4ce57a2af3f extends Twig_Template
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
        echo "{
    \"id\"               : \"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "\",
    \"name\"             : ";
        // line 3
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "summary") != null)) {
            echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "summary"));
        } else {
            echo "\"\"";
        }
        echo ",
    \"description\"      : ";
        // line 4
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "description") != null)) {
            echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "description"));
        } else {
            echo "\"\"";
        }
        echo ",
    \"created_at\"       : \"";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "createdAt"), "Y-m-d H:i"), "html", null, true);
        echo "\",
    \"end_at\"           : \"";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "endAt"), "Y-m-d H:i"), "html", null, true);
        echo "\",
    \"start_at\"         : \"";
        // line 7
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "startAt"), "Y-m-d H:i"), "html", null, true);
        echo "\",
    \"is_transparent\"   : \"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "isTransparent"), "html", null, true);
        echo "\",
    \"is_allday\"        : \"";
        // line 9
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "isAllDay") == true)) {
            echo "true";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "isAllDay") == false)) {
            echo "false";
        }
        echo "\",
    \"is_mainconfevent\" : \"";
        // line 10
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "isMainConfEvent") == true)) {
            echo "true";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "isMainConfEvent") == false)) {
            echo "false";
        }
        echo "\",
    \"resources\"        : ";
        // line 11
        echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "resources"));
        echo ",
    \"duration\"         : \"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "duration"), "html", null, true);
        echo "\",
    \"last_modified_at\" : \"";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "lastModifiedAt"), "Y-m-d H:i"), "html", null, true);
        echo "\",
    \"comment\"          : ";
        // line 14
        echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "comment"));
        echo ",
    \"url\"              : ";
        // line 15
        echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "url"));
        echo ",
    \"organizer\"        : ";
        // line 16
        echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "organizer"));
        echo ",
    \"revision_sequence\": \"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "revisionSequence"), "html", null, true);
        echo "\",
    \"attendees\"        : \"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "attendees"), "html", null, true);
        echo "\",
    \"contacts\"         : \"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "contacts"), "html", null, true);
        echo "\",
    \"excluded_dates\"   : \"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "excludedDates"), "html", null, true);
        echo "\",
    \"included_dates\"   : \"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "includedDates"), "html", null, true);
        echo "\",
    \"classification\"   : \"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "classification"), "html", null, true);
        echo "\",
    \"r_rule\"           : \"";
        // line 23
        echo $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "includedRule");
        echo "\",
    \"twitterWidgetToken\" : ";
        // line 24
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "attach") != null)) {
            echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "attach"));
        } else {
            echo "\"\"";
        }
        echo ",
    \"location\":
    {
        \"id\": \"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "id"), "html", null, true);
        echo "\",
        \"name\": ";
        // line 28
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "name") != null)) {
            echo twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "name"));
        } else {
            echo "\"\"";
        }
        echo ",
        ";
        // line 29
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "hasGeo", array(), "method")) {
            // line 30
            echo "        \"latitude\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "latitude"), "html", null, true);
            echo "\",
        \"latitude\": \"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "longitude"), "html", null, true);
            echo "\",
        ";
        }
        // line 33
        echo "        \"description\": ";
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "getDescription", array(), "method") != null)) {
            echo twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "getDescription", array(), "method"));
        } else {
            echo "\"\"";
        }
        // line 34
        echo "    },
    \"parent\"           :
    {
        \"id\"           : \"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "parent"), "id"), "html", null, true);
        echo "\",
        \"name\"         : ";
        // line 38
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "getDescription", array(), "method") != null)) {
            echo twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "parent"), "summary"));
        } else {
            echo "\"\"";
        }
        // line 39
        echo "    },
    ";
        // line 40
        ob_start();
        // line 41
        echo "    \"children\":
    [
    ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "children"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 44
            echo "        ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                echo " ";
            } else {
                echo ",";
            }
            // line 45
            echo "        { \"id\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "id"), "html", null, true);
            echo "\", \"name\": ";
            if (($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "getSummary", array(), "method") != null)) {
                echo twig_jsonencode_filter($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "getSummary", array(), "method"));
            } else {
                echo "\"\"";
            }
            echo " }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "    ],
    \"topics\":
    [
    ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "topics"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
            // line 51
            echo "        ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                echo " ";
            } else {
                echo ",";
            }
            // line 52
            echo "        { \"id\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true);
            echo "\", \"name\": ";
            if (($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "getname", array(), "method") != null)) {
                echo twig_jsonencode_filter($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "getname", array(), "method"));
            } else {
                echo "\"\"";
            }
            echo " }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    ],
    \"categories\":
    [
    ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "categories"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 58
            echo "        ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                echo " ";
            } else {
                echo ",";
            }
            // line 59
            echo "        { \"id\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true);
            echo "\", \"name\": ";
            if (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name") != null)) {
                echo twig_jsonencode_filter($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"));
            } else {
                echo "\"\"";
            }
            echo ", \"slug\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug"), "html", null, true);
            echo "\", \"color\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color"), "html", null, true);
            echo "\" }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "    ],
    \"roles\":
    [
    ";
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "roles"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 65
            echo "        ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                echo " ";
            } else {
                echo ",";
            }
            echo "{ 
            \"id\": \"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "id"), "html", null, true);
            echo "\", 
            \"type\": \"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type"), "name"), "html", null, true);
            echo "\", 
            \"person\": {
                \"id\"  : \"";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "id"), "html", null, true);
            echo "\",
                \"name\"  : \"";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "name"), "html", null, true);
            echo "\",
                \"slug\"  : \"";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "slug"), "html", null, true);
            echo "\"
            }
        }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "    ],
    \"xproperties\":
    [
    ";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "xProperties"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["xproperty"]) {
            // line 79
            echo "        ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                echo " ";
            } else {
                echo ",";
            }
            echo "{ \"id\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["xproperty"]) ? $context["xproperty"] : null), "id"), "html", null, true);
            echo "\",\"xNamespace\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["xproperty"]) ? $context["xproperty"] : null), "xNamespace"), "html", null, true);
            echo "\",\"xKey\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["xproperty"]) ? $context["xproperty"] : null), "xKey"), "html", null, true);
            echo "\",\"xValue\": \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["xproperty"]) ? $context["xproperty"] : null), "xValue"), "html", null, true);
            echo "\" }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xproperty'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "    ],

     \"papers\":
    [
    ";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "papers"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["paper"]) {
            // line 86
            echo "        ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                // line 87
                echo "        { \"id\": \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "id"), "html", null, true);
                echo "\",\"title\": ";
                echo twig_jsonencode_filter($this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "title"));
                echo "}
        ";
            } else {
                // line 89
                echo "        ,{ \"id\": \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "id"), "html", null, true);
                echo "\",\"title\": ";
                echo twig_jsonencode_filter($this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "title"));
                echo "}
        ";
            }
            // line 91
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paper'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "    ]
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 94
        echo " 
    
}
";
    }

    public function getTemplateName()
    {
        return "export.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  523 => 94,  519 => 92,  505 => 91,  497 => 89,  489 => 87,  486 => 86,  469 => 85,  463 => 81,  434 => 79,  417 => 78,  412 => 75,  394 => 71,  390 => 70,  386 => 69,  381 => 67,  377 => 66,  368 => 65,  351 => 64,  346 => 61,  319 => 59,  312 => 58,  295 => 57,  290 => 54,  267 => 52,  260 => 51,  243 => 50,  238 => 47,  215 => 45,  208 => 44,  191 => 43,  187 => 41,  185 => 40,  182 => 39,  176 => 38,  172 => 37,  167 => 34,  160 => 33,  155 => 31,  150 => 30,  148 => 29,  140 => 28,  136 => 27,  126 => 24,  122 => 23,  118 => 22,  114 => 21,  110 => 20,  106 => 19,  102 => 18,  98 => 17,  94 => 16,  90 => 15,  86 => 14,  82 => 13,  78 => 12,  74 => 11,  66 => 10,  58 => 9,  54 => 8,  50 => 7,  46 => 6,  42 => 5,  34 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
