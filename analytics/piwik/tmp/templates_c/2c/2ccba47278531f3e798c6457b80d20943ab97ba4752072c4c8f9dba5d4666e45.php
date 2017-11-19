<?php

/* @Installation/layout.twig */
class __TwigTemplate_52cf9f46ba3d9242e65ee3a152e775648d9e5ac6b85c05589b4ee049fc78c81a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <title>Piwik ";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, ($context["piwikVersion"] ?? $this->getContext($context, "piwikVersion")), "html", null, true);
        echo " &rsaquo; ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Installation")), "html", null, true);
        echo "</title>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=Installation&action=getInstallationCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=Installation&action=getInstallationJs\"></script>

    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.png\"/>
</head>
<body ng-app=\"app\" id=\"installation\">

<div class=\"container\">

    <div class=\"header\">
        <div class=\"logo\">
            <img title=\"Piwik ";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, ($context["piwikVersion"] ?? $this->getContext($context, "piwikVersion")), "html", null, true);
        echo " - ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html_attr");
        echo "\" src=\"plugins/Morpheus/images/logo.png\"/>
            <p>";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "</p>
        </div>
        <div class=\"language-selector\">
            ";
        // line 23
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.topBar"));
        echo "
        </div>

        <div class=\"installation-progress\">
            <h4>
                ";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_InstallationStatus")), "html", null, true);
        echo "
                <small>";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, ($context["percentDone"] ?? $this->getContext($context, "percentDone")), "html", null, true);
        echo "%</small>
            </h4>
            <div class=\"progress\">
                <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, ($context["percentDone"] ?? $this->getContext($context, "percentDone")), "html", null, true);
        echo "%;\"></div>
            </div>
        </div>

        <div class=\"clearfix\"></div>
    </div>

    <div class=\"row\">
        <div class=\"col s3\">
            <ul class=\"list-group\">
                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allStepsTitle"] ?? $this->getContext($context, "allStepsTitle")));
        foreach ($context['_seq'] as $context["stepId"] => $context["stepName"]) {
            // line 43
            echo "                    ";
            if ((($context["currentStepId"] ?? $this->getContext($context, "currentStepId")) > $context["stepId"])) {
                // line 44
                echo "                        ";
                $context["stepClass"] = "disabled";
                // line 45
                echo "                    ";
            } elseif ((($context["currentStepId"] ?? $this->getContext($context, "currentStepId")) == $context["stepId"])) {
                // line 46
                echo "                        ";
                $context["stepClass"] = "active";
                // line 47
                echo "                    ";
            } else {
                // line 48
                echo "                        ";
                $context["stepClass"] = "";
                // line 49
                echo "                    ";
            }
            // line 50
            echo "                    <li class=\"list-group-item ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["stepClass"] ?? $this->getContext($context, "stepClass")), "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, ($context["stepId"] + 1), "html", null, true);
            echo ". ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["stepName"])), "html", null, true);
            echo "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['stepId'], $context['stepName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "            </ul>
        </div>
        <div class=\"col s9 content\">
            ";
        // line 55
        ob_start();
        // line 56
        echo "                <p class=\"next-step\">
                    <a class=\"btn\" href=\"";
        // line 57
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => ($context["nextModuleName"] ?? $this->getContext($context, "nextModuleName")), "token_auth" => null, "method" => null))), "html", null, true);
        echo "\">
                        ";
        // line 58
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "html", null, true);
        echo " &raquo;</a>
                </p>
            ";
        $context["nextButton"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 61
        echo "            ";
        if ((array_key_exists("showNextStepAtTop", $context) && ($context["showNextStepAtTop"] ?? $this->getContext($context, "showNextStepAtTop")))) {
            // line 62
            echo "                ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["nextButton"] ?? $this->getContext($context, "nextButton")), "html", null, true);
            echo "
            ";
        }
        // line 64
        echo "
            ";
        // line 65
        $this->displayBlock('content', $context, $blocks);
        // line 66
        echo "
            ";
        // line 67
        if (($context["showNextStep"] ?? $this->getContext($context, "showNextStep"))) {
            // line 68
            echo "                ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["nextButton"] ?? $this->getContext($context, "nextButton")), "html", null, true);
            echo "
            ";
        }
        // line 70
        echo "        </div>
    </div>

</div>

</body>
</html>
";
    }

    // line 65
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@Installation/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 65,  171 => 70,  165 => 68,  163 => 67,  160 => 66,  158 => 65,  155 => 64,  149 => 62,  146 => 61,  140 => 58,  136 => 57,  133 => 56,  131 => 55,  126 => 52,  113 => 50,  110 => 49,  107 => 48,  104 => 47,  101 => 46,  98 => 45,  95 => 44,  92 => 43,  88 => 42,  75 => 32,  69 => 29,  65 => 28,  57 => 23,  51 => 20,  45 => 19,  27 => 6,  20 => 1,);
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
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <title>Piwik {{ piwikVersion }} &rsaquo; {{ 'Installation_Installation'|translate }}</title>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=Installation&action=getInstallationCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=Installation&action=getInstallationJs\"></script>

    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.png\"/>
</head>
<body ng-app=\"app\" id=\"installation\">

<div class=\"container\">

    <div class=\"header\">
        <div class=\"logo\">
            <img title=\"Piwik {{ piwikVersion }} - {{ 'General_OpenSourceWebAnalytics'|translate|escape('html_attr') }}\" src=\"plugins/Morpheus/images/logo.png\"/>
            <p>{{ 'General_OpenSourceWebAnalytics'|translate }}</p>
        </div>
        <div class=\"language-selector\">
            {{ postEvent('Template.topBar')|raw }}
        </div>

        <div class=\"installation-progress\">
            <h4>
                {{ 'Installation_InstallationStatus'|translate }}
                <small>{{ percentDone }}%</small>
            </h4>
            <div class=\"progress\">
                <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{ percentDone }}%;\"></div>
            </div>
        </div>

        <div class=\"clearfix\"></div>
    </div>

    <div class=\"row\">
        <div class=\"col s3\">
            <ul class=\"list-group\">
                {% for stepId,stepName in allStepsTitle %}
                    {% if currentStepId > stepId %}
                        {% set stepClass = 'disabled' %}
                    {% elseif currentStepId == stepId %}
                        {% set stepClass = 'active' %}
                    {% else %}
                        {% set stepClass = '' %}
                    {% endif %}
                    <li class=\"list-group-item {{ stepClass }}\">{{ stepId + 1 }}. {{ stepName|translate }}</li>
                {% endfor %}
            </ul>
        </div>
        <div class=\"col s9 content\">
            {% set nextButton %}
                <p class=\"next-step\">
                    <a class=\"btn\" href=\"{{ linkTo({'action':nextModuleName, 'token_auth':null, 'method':null }) }}\">
                        {{ 'General_Next'|translate }} &raquo;</a>
                </p>
            {% endset %}
            {% if showNextStepAtTop is defined and showNextStepAtTop %}
                {{ nextButton }}
            {% endif %}

            {% block content %}{% endblock %}

            {% if showNextStep %}
                {{ nextButton }}
            {% endif %}
        </div>
    </div>

</div>

</body>
</html>
", "@Installation/layout.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Installation/templates/layout.twig");
    }
}
