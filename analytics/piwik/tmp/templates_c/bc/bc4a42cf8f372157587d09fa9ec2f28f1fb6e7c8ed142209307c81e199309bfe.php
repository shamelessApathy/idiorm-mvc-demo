<?php

/* @Live/_actionTooltip.twig */
class __TwigTemplate_dd63d0f8c020ff714df6025436862e5380db51faf9d50eaeff0183bc474a72a2 extends Twig_Template
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
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["action"] ?? $this->getContext($context, "action")), "serverTimePretty", array()), "html", null, true);
        if (($this->getAttribute(($context["action"] ?? null), "url", array(), "any", true, true) && twig_length_filter($this->env, twig_trim_filter($this->getAttribute(($context["action"] ?? $this->getContext($context, "action")), "url", array()))))) {
            // line 2
            echo "
";
            // line 3
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["action"] ?? $this->getContext($context, "action")), "url", array()), "html", null, true);
        }
        if ($this->getAttribute(($context["action"] ?? null), "generationTime", array(), "any", true, true)) {
            // line 4
            echo "
";
            // line 5
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnGenerationTime")), "html", null, true);
            echo ": ";
            echo $this->getAttribute(($context["action"] ?? $this->getContext($context, "action")), "generationTime", array());
        }
        // line 6
        if ($this->getAttribute(($context["action"] ?? null), "timeSpentPretty", array(), "any", true, true)) {
            // line 7
            echo "
";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
            echo ": ";
            echo $this->getAttribute(($context["action"] ?? $this->getContext($context, "action")), "timeSpentPretty", array());
        }
    }

    public function getTemplateName()
    {
        return "@Live/_actionTooltip.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  39 => 7,  37 => 6,  32 => 5,  29 => 4,  25 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ action.serverTimePretty }}{% if action.url is defined and action.url|trim|length %}

{{ action.url }}{% endif %}{%- if action.generationTime is defined %}

{{ 'General_ColumnGenerationTime'|translate }}: {{ action.generationTime|raw }}{% endif %}
{%- if action.timeSpentPretty is defined %}

{{ 'General_TimeOnPage'|translate }}: {{ action.timeSpentPretty|raw }}{% endif -%}", "@Live/_actionTooltip.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/_actionTooltip.twig");
    }
}
