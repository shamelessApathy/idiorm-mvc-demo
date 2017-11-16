<?php

/* @Morpheus/layout.twig */
class __TwigTemplate_2565eeaac742acec49cf058e5fc1b1b04653923ba466a9ad6f331fb969d8cbb9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'pageTitle' => array($this, 'block_pageTitle'),
            'pageDescription' => array($this, 'block_pageDescription'),
            'meta' => array($this, 'block_meta'),
            'body' => array($this, 'block_body'),
            'root' => array($this, 'block_root'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html id=\"ng-app\" ";
        // line 2
        if (array_key_exists("language", $context)) {
            echo "lang=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["language"] ?? $this->getContext($context, "language")), "html", null, true);
            echo "\"";
        }
        echo " ng-app=\"piwikApp\">
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 30
        echo "    </head>
    <body id=\"";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("bodyId", $context)) ? (_twig_default_filter(($context["bodyId"] ?? $this->getContext($context, "bodyId")), "")) : ("")), "html", null, true);
        echo "\" ng-app=\"app\" class=\"";
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("bodyClass", $context)) ? (_twig_default_filter(($context["bodyClass"] ?? $this->getContext($context, "bodyClass")), "")) : ("")), "html", null, true);
        echo "\">

    ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 46
        echo "
        ";
        // line 47
        $this->loadTemplate("@CoreHome/_adblockDetect.twig", "@Morpheus/layout.twig", 47)->display($context);
        // line 48
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <meta charset=\"utf-8\">
            <title>";
        // line 7
        $this->displayBlock('pageTitle', $context, $blocks);
        // line 12
        echo "</title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
            <meta name=\"viewport\" content=\"initial-scale=1.0\"/>
            <meta name=\"generator\" content=\"Piwik - free/libre analytics platform\"/>
            <meta name=\"description\" content=\"";
        // line 16
        $this->displayBlock('pageDescription', $context, $blocks);
        echo "\"/>
            <meta name=\"apple-itunes-app\" content=\"app-id=737216887\" />
            ";
        // line 18
        $this->displayBlock('meta', $context, $blocks);
        // line 21
        echo "
            ";
        // line 22
        $this->loadTemplate("@CoreHome/_favicon.twig", "@Morpheus/layout.twig", 22)->display($context);
        // line 23
        echo "            ";
        $this->loadTemplate("@CoreHome/_applePinnedTabIcon.twig", "@Morpheus/layout.twig", 23)->display($context);
        // line 24
        echo "            ";
        $this->loadTemplate("_jsGlobalVariables.twig", "@Morpheus/layout.twig", 24)->display($context);
        // line 25
        echo "            ";
        $this->loadTemplate("_jsCssIncludes.twig", "@Morpheus/layout.twig", 25)->display($context);
        // line 27
        if ( !($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo"))) {
            echo "<link rel=\"manifest\" href=\"plugins/CoreHome/javascripts/manifest.json\">";
        }
        // line 28
        echo "
        ";
    }

    // line 7
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 8
        if (array_key_exists("title", $context)) {
            echo \Piwik\piwik_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html", null, true);
            echo " - ";
        }
        // line 9
        if (array_key_exists("categoryTitle", $context)) {
            echo \Piwik\piwik_escape_filter($this->env, ($context["categoryTitle"] ?? $this->getContext($context, "categoryTitle")), "html", null, true);
            echo " - ";
        }
        // line 10
        echo "                    Piwik";
    }

    // line 16
    public function block_pageDescription($context, array $blocks = array())
    {
    }

    // line 18
    public function block_meta($context, array $blocks = array())
    {
        // line 19
        echo "                <meta name=\"robots\" content=\"noindex,nofollow\">
            ";
    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        // line 34
        echo "
        ";
        // line 35
        $this->loadTemplate("_iframeBuster.twig", "@Morpheus/layout.twig", 35)->display($context);
        // line 36
        echo "        ";
        $this->loadTemplate("@CoreHome/_javaScriptDisabled.twig", "@Morpheus/layout.twig", 36)->display($context);
        // line 37
        echo "
        <div id=\"root\">
            ";
        // line 39
        $this->displayBlock('root', $context, $blocks);
        // line 41
        echo "        </div>

        <div piwik-popover-handler></div>

    ";
    }

    // line 39
    public function block_root($context, array $blocks = array())
    {
        // line 40
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@Morpheus/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 40,  161 => 39,  153 => 41,  151 => 39,  147 => 37,  144 => 36,  142 => 35,  139 => 34,  136 => 33,  131 => 19,  128 => 18,  123 => 16,  119 => 10,  114 => 9,  109 => 8,  106 => 7,  101 => 28,  97 => 27,  94 => 25,  91 => 24,  88 => 23,  86 => 22,  83 => 21,  81 => 18,  76 => 16,  70 => 12,  68 => 7,  65 => 5,  62 => 4,  56 => 48,  54 => 47,  51 => 46,  49 => 33,  42 => 31,  39 => 30,  37 => 4,  28 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html id=\"ng-app\" {% if language is defined %}lang=\"{{ language }}\"{% endif %} ng-app=\"piwikApp\">
    <head>
        {% block head %}
            <meta charset=\"utf-8\">
            <title>
                {%- block pageTitle -%}
                    {%- if title is defined %}{{ title }} - {% endif %}
                    {%- if categoryTitle is defined %}{{ categoryTitle }} - {% endif %}
                    Piwik
                {%- endblock -%}
            </title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
            <meta name=\"viewport\" content=\"initial-scale=1.0\"/>
            <meta name=\"generator\" content=\"Piwik - free/libre analytics platform\"/>
            <meta name=\"description\" content=\"{% block pageDescription %}{% endblock %}\"/>
            <meta name=\"apple-itunes-app\" content=\"app-id=737216887\" />
            {% block meta %}
                <meta name=\"robots\" content=\"noindex,nofollow\">
            {% endblock %}

            {% include \"@CoreHome/_favicon.twig\" %}
            {% include \"@CoreHome/_applePinnedTabIcon.twig\" %}
            {% include \"_jsGlobalVariables.twig\" %}
            {% include \"_jsCssIncludes.twig\" %}

            {%- if not isCustomLogo %}<link rel=\"manifest\" href=\"plugins/CoreHome/javascripts/manifest.json\">{% endif %}

        {% endblock %}
    </head>
    <body id=\"{{ bodyId|default('') }}\" ng-app=\"app\" class=\"{{ bodyClass|default('') }}\">

    {% block body %}

        {% include \"_iframeBuster.twig\" %}
        {% include \"@CoreHome/_javaScriptDisabled.twig\" %}

        <div id=\"root\">
            {% block root %}
            {% endblock %}
        </div>

        <div piwik-popover-handler></div>

    {% endblock %}

        {% include \"@CoreHome/_adblockDetect.twig\" %}
    </body>
</html>
", "@Morpheus/layout.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Morpheus/templates/layout.twig");
    }
}
