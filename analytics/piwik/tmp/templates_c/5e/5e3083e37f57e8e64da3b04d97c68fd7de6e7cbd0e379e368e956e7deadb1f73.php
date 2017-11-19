<?php

/* @CoreHome/_logo.twig */
class __TwigTemplate_51d0484e3d10965c265e58911049b3074be4d35f8de1846abd4a9da9a26411ea extends Twig_Template
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
        echo "<span id=\"logo\" class=\"brand-logo\">
    <a href=\"index.php\" tabindex=\"-1\"
       title=\"";
        // line 3
        if (($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo"))) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik # ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "\"
    >
    ";
        // line 5
        if (($context["hasSVGLogo"] ?? $this->getContext($context, "hasSVGLogo"))) {
            // line 6
            echo "        <img src='";
            echo \Piwik\piwik_escape_filter($this->env, ($context["logoSVG"] ?? $this->getContext($context, "logoSVG")), "html", null, true);
            echo "' tabindex=\"3\"
             alt=\"";
            // line 7
            if (($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo"))) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
                echo " ";
            }
            echo "Piwik\"
             class=\"";
            // line 8
            if ( !($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo"))) {
                echo "default-piwik-logo";
            }
            echo "\" />
    ";
        } else {
            // line 10
            echo "        <img src='";
            echo \Piwik\piwik_escape_filter($this->env, ($context["logoHeader"] ?? $this->getContext($context, "logoHeader")), "html", null, true);
            echo "' alt=\"";
            if (($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo"))) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
                echo " ";
            }
            echo "Piwik\" />
    ";
        }
        // line 12
        echo "</a>
</span>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_logo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 12,  54 => 10,  47 => 8,  40 => 7,  35 => 6,  33 => 5,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<span id=\"logo\" class=\"brand-logo\">
    <a href=\"index.php\" tabindex=\"-1\"
       title=\"{% if isCustomLogo %}{{ 'General_PoweredBy'|translate }} {% endif %}Piwik # {{ 'General_OpenSourceWebAnalytics'|translate }}\"
    >
    {% if hasSVGLogo %}
        <img src='{{ logoSVG }}' tabindex=\"3\"
             alt=\"{% if isCustomLogo %}{{ 'General_PoweredBy'|translate }} {% endif %}Piwik\"
             class=\"{% if not isCustomLogo %}default-piwik-logo{% endif %}\" />
    {% else %}
        <img src='{{ logoHeader }}' alt=\"{% if isCustomLogo %}{{ 'General_PoweredBy'|translate }} {% endif %}Piwik\" />
    {% endif %}
</a>
</span>
", "@CoreHome/_logo.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/CoreHome/templates/_logo.twig");
    }
}
